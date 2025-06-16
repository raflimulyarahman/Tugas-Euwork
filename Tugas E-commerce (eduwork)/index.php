<?php
require_once 'config.php';

// Ambil data kategori
$categories = $pdo->query("SELECT * FROM categories ORDER BY name")->fetchAll();

// Ambil data produk dengan filter kategori jika ada
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$search_filter = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT p.*, c.name as category_name FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id WHERE 1=1";
$params = [];

if ($category_filter) {
    $sql .= " AND p.category_id = ?";
    $params[] = $category_filter;
}

if ($search_filter) {
    $sql .= " AND (p.name LIKE ? OR p.description LIKE ?)";
    $params[] = "%$search_filter%";
    $params[] = "%$search_filter%";
}

$sql .= " ORDER BY p.created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();

$cart_count = getCartCount($pdo, $_SESSION['cart_session']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoOnline - Belanja Mudah dan Nyaman</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --success-color: #27ae60;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .hero-section {
            background: linear-gradient(135deg, rgba(52, 152, 219, 0.9), rgba(46, 204, 113, 0.9)),
                        url('https://via.placeholder.com/1200x400?text=Hero+Background') center/cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .product-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .product-image {
            height: 250px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .price-tag {
            color: var(--accent-color);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .btn-add-cart {
            background: linear-gradient(135deg, var(--success-color), #2ecc71);
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .btn-add-cart:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
        }

        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .cart-badge {
            background-color: var(--accent-color);
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 0.8rem;
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 40px 0;
            margin-top: 50px;
        }

        .product-category {
            background: var(--secondary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 10px;
        }

        .stock-info {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .out-of-stock {
            color: var(--accent-color);
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-store"></i> TokoOnline
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">
                            <i class="fas fa-box"></i> Produk
                        </a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="cart.php">
                            <i class="fas fa-shopping-cart"></i> Keranjang
                            <?php if ($cart_count > 0): ?>
                                <span class="cart-badge"><?= $cart_count ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Selamat Datang di TokoOnline</h1>
            <p class="lead mb-4">Temukan produk terbaik dengan harga terjangkau</p>
            <a href="#products" class="btn btn-light btn-lg">
                <i class="fas fa-shopping-bag"></i> Mulai Belanja
            </a>
        </div>
    </section>

    <div class="container my-5">
        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Cari Produk</label>
                    <input type="text" class="form-control" name="search" 
                           value="<?= htmlspecialchars($search_filter) ?>" 
                           placeholder="Nama produk...">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" name="category">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>" 
                                    <?= $category_filter == $category['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($category['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    <a href="index.php" class="btn btn-outline-secondary">
                        <i class="fas fa-times"></i> Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Products Section -->
        <section id="products">
            <h2 class="mb-4">
                <i class="fas fa-box"></i> Produk Kami
                <small class="text-muted">(<?= count($products) ?> produk)</small>
            </h2>
            
            <?php if (empty($products)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-5x text-muted mb-3"></i>
                    <h4>Tidak ada produk ditemukan</h4>
                    <p class="text-muted">Coba ubah filter pencarian Anda</p>
                </div>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card product-card">
                                <img src="<?= htmlspecialchars($product['image_url']) ?>" 
                                     class="card-img-top product-image" 
                                     alt="<?= htmlspecialchars($product['name']) ?>">
                                
                                <div class="card-body d-flex flex-column">
                                    <span class="product-category">
                                        <?= htmlspecialchars($product['category_name']) ?>
                                    </span>
                                    
                                    <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                                    <p class="card-text text-muted flex-grow-1">
                                        <?= htmlspecialchars(substr($product['description'], 0, 100)) ?>...
                                    </p>
                                    
                                    <div class="mt-auto">
                                        <div class="price-tag mb-2"><?= formatRupiah($product['price']) ?></div>
                                        
                                        <div class="stock-info mb-3">
                                            <?php if ($product['stock'] > 0): ?>
                                                <i class="fas fa-check-circle text-success"></i> 
                                                Stok: <?= $product['stock'] ?>
                                            <?php else: ?>
                                                <i class="fas fa-times-circle text-danger"></i> 
                                                <span class="out-of-stock">Stok Habis</span>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <?php if ($product['stock'] > 0): ?>
                                            <form method="POST" action="cart_action.php" class="d-grid">
                                                <input type="hidden" name="action" value="add">
                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                <button type="submit" class="btn btn-success btn-add-cart">
                                                    <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <button class="btn btn-secondary" disabled>
                                                <i class="fas fa-times"></i> Stok Habis
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-store"></i> TokoOnline</h5>
                    <p>Platform e-commerce terpercaya untuk kebutuhan belanja online Anda.</p>
                </div>
                <div class="col-md-6">
                    <h5>Kontak</h5>
                    <p>
                        <i class="fas fa-envelope"></i> info@tokoonline.com<br>
                        <i class="fas fa-phone"></i> (021) 1234-5678
                    </p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; 2024 TokoOnline. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <!-- Show success message if product added to cart -->
    <?php if (isset($_SESSION['cart_message'])): ?>
        <script>
            alert('<?= $_SESSION['cart_message'] ?>');
        </script>
        <?php unset($_SESSION['cart_message']); ?>
    <?php endif; ?>
</body>
</html>
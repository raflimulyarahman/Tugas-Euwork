<?php
require_once 'config.php';

// Ambil data keranjang dengan detail produk
$stmt = $pdo->prepare("
    SELECT c.*, p.name, p.price, p.image_url, p.stock, (c.quantity * p.price) as subtotal
    FROM cart c 
    JOIN products p ON c.product_id = p.id 
    WHERE c.session_id = ?
    ORDER BY c.created_at DESC
");
$stmt->execute([$_SESSION['cart_session']]);
$cart_items = $stmt->fetchAll();

// Hitung total
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['subtotal'];
}

$cart_count = getCartCount($pdo, $_SESSION['cart_session']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - TokoOnline</title>
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

        .cart-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .cart-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            background: var(--secondary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }

        .summary-card {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 15px;
            padding: 25px;
        }

        .btn-checkout {
            background: var(--success-color);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-checkout:hover {
            background: #229954;
            transform: scale(1.05);
        }

        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
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

        .remove-btn {
            background: var(--accent-color);
            border: none;
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-item {
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .cart-item:last-child {
            border-bottom: none;
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
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="cart.php">
                            <i class="fas fa-shopping-cart"></i> Keranjang
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

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">
                    <i class="fas fa-shopping-cart"></i> Keranjang Belanja
                </h2>
                
                <?php if (isset($_SESSION['cart_message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= $_SESSION['cart_message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php unset($_SESSION['cart_message']); ?>
                <?php endif; ?>
            </div>
        </div>

        <?php if (empty($cart_items)): ?>
            <div class="empty-cart">
                <i class="fas fa-shopping-cart fa-5x mb-3"></i>
                <h4>Keranjang Belanja Kosong</h4>
                <p>Belum ada produk dalam keranjang belanja Anda</p>
                <a href="index.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-shopping-bag"></i> Mulai Belanja
                </a>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card cart-card">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Item dalam Keranjang (<?= count($cart_items) ?>)</h5>
                                <form method="POST" action="cart_action.php" class="d-inline">
                                    <input type="hidden" name="action" value="clear">
                                    <button type="submit" class="btn btn-outline-danger btn-sm" 
                                            onclick="return confirm('Yakin ingin mengosongkan keranjang?')">
                                        <i class="fas fa-trash"></i> Kosongkan Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card-body p-0">
                            <?php foreach ($cart_items as $item): ?>
                                <div class="cart-item">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="<?= htmlspecialchars($item['image_url']) ?>" 
                                                 class="cart-image" 
                                                 alt="<?= htmlspecialchars($item['name']) ?>">
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <h6 class="mb-1"><?= htmlspecialchars($item['name']) ?></h6>
                                            <p class="text-muted mb-0"><?= formatRupiah($item['price']) ?></p>
                                            <small class="text-muted">Stok: <?= $item['stock'] ?></small>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="quantity-control">
                                                <form method="POST" action="cart_action.php" class="d-inline">
                                                    <input type="hidden" name="action" value="update">
                                                    <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                                    <input type="hidden" name="quantity" value="<?= max(1, $item['quantity'] - 1) ?>">
                                                    <button type="submit" class="quantity-btn">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </form>
                                                
                                                <input type="number" class="quantity-input" 
                                                       value="<?= $item['quantity'] ?>" 
                                                       min="1" max="<?= $item['stock'] ?>"
                                                       onchange="updateQuantity(<?= $item['product_id'] ?>, this.value)">
                                                
                                                <form method="POST" action="cart_action.php" class="d-inline">
                                                    <input type="hidden" name="action" value="update">
                                                    <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                                    <input type="hidden" name="quantity" value="<?= min($item['stock'], $item['quantity'] + 1) ?>">
                                                    <button type="submit" class="quantity-btn" 
                                                            <?= $item['quantity'] >= $item['stock'] ? 'disabled' : '' ?>>
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="fw-bold text-primary">
                                                <?= formatRupiah($item['subtotal']) ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-1">
                                            <form method="POST" action="cart_action.php" class="d-inline">
                                                <input type="hidden" name="action" value="remove">
                                                <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                                <button type="submit" class="remove-btn" 
                                                        onclick="return confirm('Yakin ingin menghapus item ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="summary-card">
                        <h5 class="mb-4">
                            <i class="fas fa-receipt"></i> Ringkasan Pesanan
                        </h5>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal (<?= count($cart_items) ?> item)</span>
                            <span><?= formatRupiah($total) ?></span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span>Biaya Admin</span>
                            <span>Gratis</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span>Ongkos Kirim</span>
                            <span>Gratis</span>
                        </div>
                        
                        <hr class="my-3" style="border-color: rgba(255,255,255,0.3);">
                        
                        <div class="d-flex justify-content-between mb-4">
                            <strong>Total</strong>
                            <strong class="fs-4"><?= formatRupiah($total) ?></strong>
                        </div>
                        
                        <button class="btn btn-success btn-checkout w-100 mb-3" 
                                onclick="checkout()">
                            <i class="fas fa-credit-card"></i> Checkout Sekarang
                        </button>
                        
                        <a href="index.php" class="btn btn-outline-light w-100">
                            <i class="fas fa-arrow-left"></i> Lanjut Belanja
                        </a>
                        
                        <div class="mt-4 pt-3" style="border-top: 1px solid rgba(255,255,255,0.3);">
                            <small>
                                <i class="fas fa-shield-alt"></i> Transaksi aman dan terpercaya<br>
                                <i class="fas fa-truck"></i> Gratis ongkir untuk semua pembelian
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function updateQuantity(productId, quantity) {
            if (quantity < 1) return;
            
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'cart_action.php';
            
            const actionInput = document.createElement('input');
            actionInput.type = 'hidden';
            actionInput.name = 'action';
            actionInput.value = 'update';
            
            const productInput = document.createElement('input');
            productInput.type = 'hidden';
            productInput.name = 'product_id';
            productInput.value = productId;
            
            const quantityInput = document.createElement('input');
            quantityInput.type = 'hidden';
            quantityInput.name = 'quantity';
            quantityInput.value = quantity;
            
            form.appendChild(actionInput);
            form.appendChild(productInput);
            form.appendChild(quantityInput);
            
            document.body.appendChild(form);
            form.submit();
        }
        
        function checkout() {
            alert('Fitur checkout akan segera hadir!\n\nTotal pembelian: <?= formatRupiah($total) ?>');
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - ShopMart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .cart-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 0;
        }

        .cart-item {
            border: 1px solid #e9ecef;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .cart-item:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .product-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .quantity-btn {
            width: 35px;
            height: 35px;
            border: 2px solid #667eea;
            background: white;
            color: #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: #667eea;
            color: white;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }

        .price {
            color: #e74c3c;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .original-price {
            text-decoration: line-through;
            color: #95a5a6;
            font-size: 0.9rem;
        }

        .remove-btn {
            color: #e74c3c;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remove-btn:hover {
            color: #c0392b;
            transform: scale(1.1);
        }

        .cart-summary {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 25px;
            position: sticky;
            top: 100px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .coupon-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 2px dashed #ddd;
        }

        .btn-primary {
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-outline-danger {
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .empty-cart i {
            font-size: 5rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
        }

        .breadcrumb-item a {
            color: #667eea;
            text-decoration: none;
        }

        .recommended-products {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
        }

        .product-card-small {
            background: white;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .product-card-small:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .product-card-small img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .animate-in {
            animation: slideInUp 0.6s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-message {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: none;
        }

        .footer {
            background: #2c3e50;
            color: white;
            padding: 50px 0 20px;
            margin-top: 50px;
            
        }

        /* ... (letakkan di bawah style CSS yang sudah ada) ... */

        .cart-item {
            display: flex;
            /* Ini adalah kunci utamanya */
            justify-content: space-between;
            /* Memberi ruang antar kolom */
            align-items: center;
            /* Menjaga semua kolom tetap di tengah secara vertikal */
            gap: 20px;
            /* Memberi jarak antar kolom */
        }

        .product-image {
            width: 100px;
            /* Sedikit lebih kecil agar lebih rapi */
            height: 100px;
            flex-shrink: 0;
            /* Mencegah gambar menyusut */
        }

        .product-info {
            flex-grow: 1;
            /* Biarkan kolom ini mengambil ruang sisa di tengah */
            /* Hapus text-align agar tidak berantakan */
        }

        .cart-actions {
            display: flex;
            flex-direction: column;
            /* Susun elemen ke bawah */
            align-items: center;
            /* Tengahkan secara horizontal */
            flex-shrink: 0;
            /* Mencegah kolom ini menyusut */
        }

        .subtotal-price {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .remove-btn-icon {
            background: none;
            border: none;
            color: #e74c3c;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 5px;
        }

        .remove-btn-icon:hover {
            color: #c0392b;
        }

        /* Hapus beberapa style lama agar tidak bentrok */
        
            /* Anda bisa menghapus style untuk class ini jika tidak digunakan di tempat lain,
       atau biarkan jika masih diperlukan di bagian lain halaman. */
        
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand text-primary" href="index.html">
                <i class="fas fa-shopping-bag me-2"></i>ShopMart
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#categories">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                </ul>
                <div class="d-flex">
                    <div class="input-group me-3" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Cari produk...">
                        <button class="btn btn-outline-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <a href="#" class="btn btn-outline-primary me-2">
                        <i class="fas fa-user me-1"></i>Masuk
                    </a>
                    <a href="#" class="btn btn-primary position-relative">
                        <i class="fas fa-shopping-cart me-1"></i>Keranjang
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart-count">3</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Cart Header -->
    <section class="cart-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                            <!-- <li class="breadcrumb-item active" aria-current="page">Keranjang Belanja</li> -->
                        </ol>
                    </nav>
                    <h1 class="display-5 fw-bold mb-0">Keranjang Belanja</h1>
                    <p class="lead mb-0">Kelola produk yang ingin Anda beli</p>
                </div>
                <div class="col-md-4 text-end">
                    <i class="fas fa-shopping-cart fa-4x opacity-50"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="success-message" id="success-message">
            <i class="fas fa-check-circle me-2"></i>
            <span id="success-text">Produk berhasil diperbarui!</span>
        </div>

        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div id="cart-items">

                    <!-- Cart Item 1 -->
                    <div id="cart-items">
                        <div class="cart-item" data-product-id="1">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=120&h=120&fit=crop"
                                alt="Headphone" class="product-image">

                            <div class="product-info">
                                <h5 class="mb-1">Headphone Wireless Premium</h5>
                                <p class="text-muted mb-2">Warna: Hitam | Garansi: 1 Tahun</p>
                                <div class="mb-2">
                                    <span class="badge bg-success">Tersedia</span>
                                </div>
                                <div>
                                    <span class="price">Rp 899.000</span>
                                    <span class="original-price ms-2">Rp 1.125.000</span>
                                </div>
                            </div>

                            <div class="cart-actions">
                                <div class="quantity-controls mb-2">
                                    <button class="quantity-btn" onclick="decreaseQuantity(1)">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1" max="10" id="qty-1" onchange="updateQuantity(1)">
                                    <button class="quantity-btn" onclick="increaseQuantity(1)">+</button>
                                </div>
                                <div class="subtotal-price mb-2">
                                    <span id="subtotal-1">Rp 899.000</span>
                                </div>
                                <button class="remove-btn-icon" onclick="removeItem(1)" title="Hapus item">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="cart-item" data-product-id="2">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=120&h=120&fit=crop"
                                alt="Tas Ransel" class="product-image">

                            <div class="product-info">
                                <h5 class="mb-1">Tas Ransel Anti Air</h5>
                                <p class="text-muted mb-2">Warna: Navy | Ukuran: L</p>
                                <div class="mb-2">
                                    <span class="badge bg-success">Tersedia</span>
                                </div>
                                <div>
                                    <span class="price">Rp 425.000</span>
                                    <span class="original-price ms-2">Rp 500.000</span>
                                </div>
                            </div>

                            <div class="cart-actions">
                                <div class="quantity-controls mb-2">
                                    <button class="quantity-btn" onclick="decreaseQuantity(2)">-</button>
                                    <input type="number" class="quantity-input" value="2" min="1" max="10" id="qty-2" onchange="updateQuantity(2)">
                                    <button class="quantity-btn" onclick="increaseQuantity(2)">+</button>
                                </div>
                                <div class="subtotal-price mb-2">
                                    <span id="subtotal-2">Rp 850.000</span>
                                </div>
                                <button class="remove-btn-icon" onclick="removeItem(2)" title="Hapus item">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="cart-item" data-product-id="3">
                            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=120&h=120&fit=crop"
                                alt="Smartwatch" class="product-image">

                            <div class="product-info">
                                <h5 class="mb-1">Smartwatch Fitness</h5>
                                <p class="text-muted mb-2">Warna: Silver | Model: Pro</p>
                                <div class="mb-2">
                                    <span class="badge bg-warning">Stok Terbatas</span>
                                </div>
                                <div>
                                    <span class="price">Rp 1.125.000</span>
                                    <span class="original-price ms-2">Rp 1.500.000</span>
                                </div>
                            </div>

                            <div class="cart-actions">
                                <div class="quantity-controls mb-2">
                                    <button class="quantity-btn" onclick="decreaseQuantity(3)">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1" max="10" id="qty-3" onchange="updateQuantity(3)">
                                    <button class="quantity-btn" onclick="increaseQuantity(3)">+</button>
                                </div>
                                <div class="subtotal-price mb-2">
                                    <span id="subtotal-3">Rp 1.125.000</span>
                                </div>
                                <button class="remove-btn-icon" onclick="removeItem(3)" title="Hapus item">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="index.html" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i>Lanjut Belanja
                        </a>
                        <button class="btn btn-outline-danger" onclick="clearCart()">
                            <i class="fas fa-trash me-2"></i>Kosongkan Keranjang
                        </button>
                    </div>

                    <!-- Recommended Products -->
                    <div class="recommended-products">
                        <h5 class="mb-3"><i class="fas fa-heart me-2"></i>Produk yang Mungkin Anda Suka</h5>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="product-card-small">
                                    <img src="https://images.unsplash.com/photo-1434056886845-dac89ffe9b56?w=80&h=80&fit=crop" alt="Sepatu">
                                    <h6 class="mb-1">Sepatu Running</h6>
                                    <p class="price mb-2">Rp 750.000</p>
                                    <button class="btn btn-sm btn-primary" onclick="addToCart('Sepatu Running', 750000)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="product-card-small">
                                    <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=80&h=80&fit=crop" alt="Sunglasses">
                                    <h6 class="mb-1">Kacamata Hitam</h6>
                                    <p class="price mb-2">Rp 299.000</p>
                                    <button class="btn btn-sm btn-primary" onclick="addToCart('Kacamata Hitam', 299000)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="product-card-small">
                                    <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?w=80&h=80&fit=crop" alt="Earbuds">
                                    <h6 class="mb-1">Earbuds Wireless</h6>
                                    <p class="price mb-2">Rp 499.000</p>
                                    <button class="btn btn-sm btn-primary" onclick="addToCart('Earbuds Wireless', 499000)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="product-card-small">
                                    <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=80&h=80&fit=crop" alt="Wallet">
                                    <h6 class="mb-1">Dompet Kulit</h6>
                                    <p class="price mb-2">Rp 199.000</p>
                                    <button class="btn btn-sm btn-primary" onclick="addToCart('Dompet Kulit', 199000)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h4 class="mb-3"><i class="fas fa-receipt me-2"></i>Ringkasan Pesanan</h4>

                        <!-- Coupon Section -->
                        <div class="coupon-section">
                            <h6><i class="fas fa-ticket-alt me-2"></i>Kode Promo</h6>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" placeholder="Masukkan kode promo" id="coupon-code">
                                <button class="btn btn-outline-primary" onclick="applyCoupon()">
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                            <div id="coupon-success" class="text-success small" style="display: none;">
                                <i class="fas fa-check-circle me-1"></i>Kode promo berhasil diterapkan!
                            </div>
                        </div>

                        <div class="summary-details">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal (<span id="total-items">4</span> item)</span>
                                <span id="subtotal-amount">Rp 2.874.000</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Ongkos Kirim</span>
                                <span id="shipping-cost">Rp 15.000</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2 text-success">
                                <span>Diskon Promo</span>
                                <span id="discount-amount">- Rp 0</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Biaya Layanan</span>
                                <span>Rp 5.000</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <strong>Total</strong>
                                <strong class="price" id="total-amount">Rp 2.894.000</strong>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-truck me-2"></i>Pilih Pengiriman</label>
                            <select class="form-select" onchange="updateShipping()">
                                <option value="15000">Reguler (3-5 hari) - Rp 15.000</option>
                                <option value="25000">Express (1-2 hari) - Rp 25.000</option>
                                <option value="35000">Same Day (Hari ini) - Rp 35.000</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-credit-card me-2"></i>Metode Pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="transfer" checked>
                                <label class="form-check-label" for="transfer">
                                    Transfer Bank
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="ewallet">
                                <label class="form-check-label" for="ewallet">
                                    E-Wallet (OVO, DANA, GoPay)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="cod">
                                <label class="form-check-label" for="cod">
                                    Bayar di Tempat (COD)
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100 btn-lg mb-2" onclick="checkout()">
                            <i class="fas fa-credit-card me-2"></i>Checkout Sekarang
                        </button>

                        <div class="text-center small text-muted">
                            <i class="fas fa-shield-alt me-1"></i>
                            Transaksi aman dengan enkripsi SSL
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty Cart (Hidden by default) -->
        <div id="empty-cart" class="empty-cart" style="display: none;">
            <i class="fas fa-shopping-cart"></i>
            <h3>Keranjang Belanja Kosong</h3>
            <p>Belum ada produk yang ditambahkan ke keranjang</p>
            <a href="index.html" class="btn btn-primary">
                <i class="fas fa-shopping-bag me-2"></i>Mulai Belanja
            </a>
        </div>

        <!-- Footer -->
        <x-footer></x-footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script>
            // Cart data
            let cartData = {
                1: {
                    name: 'Headphone Wireless Premium',
                    price: 899000,
                    originalPrice: 1125000,
                    quantity: 1
                },
                2: {
                    name: 'Tas Ransel Anti Air',
                    price: 425000,
                    originalPrice: 500000,
                    quantity: 2
                },
                3: {
                    name: 'Smartwatch Fitness',
                    price: 1125000,
                    originalPrice: 1500000,
                    quantity: 1
                }
            };

            let shippingCost = 15000;
            let discountAmount = 0;

            // Update quantity functions
            function increaseQuantity(productId) {
                const qtyInput = document.getElementById(`qty-${productId}`);
                let currentQty = parseInt(qtyInput.value);
                if (currentQty < 10) {
                    qtyInput.value = currentQty + 1;
                    cartData[productId].quantity = currentQty + 1;
                    updateSubtotal(productId);
                    updateCartSummary();
                    showSuccessMessage('Jumlah produk berhasil diperbarui!');
                }
            }

            function decreaseQuantity(productId) {
                const qtyInput = document.getElementById(`qty-${productId}`);
                let currentQty = parseInt(qtyInput.value);
                if (currentQty > 1) {
                    qtyInput.value = currentQty - 1;
                    cartData[productId].quantity = currentQty - 1;
                    updateSubtotal(productId);
                    updateCartSummary();
                    showSuccessMessage('Jumlah produk berhasil diperbarui!');
                }
            }

            function updateQuantity(productId) {
                const qtyInput = document.getElementById(`qty-${productId}`);
                let newQty = parseInt(qtyInput.value);
                if (newQty >= 1 && newQty <= 10) {
                    cartData[productId].quantity = newQty;
                    updateSubtotal(productId);
                    updateCartSummary();
                    showSuccessMessage('Jumlah produk berhasil diperbarui!');
                } else {
                    qtyInput.value = cartData[productId].quantity;
                }
            }

            function updateSubtotal(productId) {
                const subtotalElement = document.getElementById(`subtotal-${productId}`);
                const subtotal = cartData[productId].price * cartData[productId].quantity;
                subtotalElement.textContent = formatCurrency(subtotal);
            }

            function updateCartSummary() {
                let totalItems = 0;
                let subtotalAmount = 0;

                for (let productId in cartData) {
                    totalItems += cartData[productId].quantity;
                    subtotalAmount += cartData[productId].price * cartData[productId].quantity;
                }

                document.getElementById('total-items').textContent = totalItems;
                document.getElementById('subtotal-amount').textContent = formatCurrency(subtotalAmount);
                document.getElementById('cart-count').textContent = totalItems;

                const totalAmount = subtotalAmount + shippingCost + 5000 - discountAmount;
                document.getElementById('total-amount').textContent = formatCurrency(totalAmount);
            }

            function removeItem(productId) {
                if (confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                    const cartItem = document.querySelector(`[data-product-id="${productId}"]`);
                    cartItem.style.transition = 'all 0.3s ease';
                    cartItem.style.transform = 'translateX(-100%)';
                    cartItem.style.opacity = '0';

                    setTimeout(() => {
                        cartItem.remove();
                        delete cartData[productId];
                        updateCartSummary();

                        if (Object.keys(cartData).length === 0) {
                            showEmptyCart();
                        }

                        showSuccessMessage('Produk berhasil dihapus dari keranjang!');
                    }, 300);
                }
            }

            function clearCart() {
                if (confirm('Apakah Anda yakin ingin mengosongkan seluruh keranjang?')) {
                    cartData = {};
                    document.getElementById('cart-items').innerHTML = '';
                    showEmptyCart();
                    showSuccessMessage('Keranjang berhasil dikosongkan!');
                }
            }

            function showEmptyCart() {
                document.getElementById('cart-items').style.display = 'none';
                document.querySelector('.cart-summary').style.display = 'none';
                document.querySelector('.recommended-products').style.display = 'none';
                document.getElementById('empty-cart').style.display = 'block';
                document.getElementById('cart-count').textContent = '0';
            }

            function applyCoupon() {
                const couponCode = document.getElementById('coupon-code').value.trim().toUpperCase();
                const couponSuccess = document.getElementById('coupon-success');

                if (couponCode === 'DISCOUNT10') {
                    discountAmount = 50000;
                    couponSuccess.style.display = 'block';
                    couponSuccess.innerHTML = '<i class="fas fa-check-circle me-1"></i>Kode promo berhasil diterapkan! Hemat Rp 50.000';
                    document.getElementById('discount-amount').textContent = '- ' + formatCurrency(discountAmount);
                    updateCartSummary();
                    showSuccessMessage('Kode promo berhasil diterapkan!');
                } else if (couponCode === 'FREESHIP') {
                    shippingCost = 0;
                    couponSuccess.style.display = 'block';
                    couponSuccess.innerHTML = '<i class="fas fa-check-circle me-1"></i>Kode promo berhasil diterapkan! Gratis ongkir';
                    document.getElementById('shipping-cost').textContent = 'GRATIS';
                    updateCartSummary();
                    showSuccessMessage('Kode promo berhasil diterapkan!');
                } else if (couponCode) {
                    couponSuccess.style.display = 'block';
                    couponSuccess.className = 'text-danger small';
                    couponSuccess.innerHTML = '<i class="fas fa-times-circle me-1"></i>Kode promo tidak valid';
                    setTimeout(() => {
                        couponSuccess.style.display = 'none';
                        couponSuccess.className = 'text-success small';
                    }, 3000);
                }
            }

            function updateShipping() {
                const shippingSelect = document.querySelector('select[onchange="updateShipping()"]');
                shippingCost = parseInt(shippingSelect.value);
                document.getElementById('shipping-cost').textContent = formatCurrency(shippingCost);
                updateCartSummary();
                showSuccessMessage('Metode pengiriman berhasil diperbarui!');
            }

            function checkout() {
                const selectedPayment = document.querySelector('input[name="payment"]:checked');
                if (!selectedPayment) {
                    alert('Silakan pilih metode pembayaran terlebih dahulu!');
                    return;
                }

                // Simulate checkout process
                const checkoutBtn = document.querySelector('.btn-primary.w-100');
                const originalText = checkoutBtn.innerHTML;

                checkoutBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
                checkoutBtn.disabled = true;

                setTimeout(() => {
                    alert('Checkout berhasil! Anda akan diarahkan ke halaman pembayaran.');
                    checkoutBtn.innerHTML = originalText;
                    checkoutBtn.disabled = false;
                }, 2000);
            }

            function addToCart(productName, price) {
                const newId = Date.now();
                cartData[newId] = {
                    name: productName,
                    price: price,
                    originalPrice: price,
                    quantity: 1
                };

                updateCartSummary();
                showSuccessMessage(`${productName} berhasil ditambahkan ke keranjang!`);
            }

            function formatCurrency(amount) {
                return 'Rp ' + amount.toLocaleString('id-ID');
            }

            function showSuccessMessage(message) {
                const successDiv = document.getElementById('success-message');
                document.getElementById('success-text').textContent = message;
                successDiv.style.display = 'block';

                setTimeout(() => {
                    successDiv.style.display = 'none';
                }, 3000);
            }

            // Initialize cart summary on page load
            document.addEventListener('DOMContentLoaded', function() {
                updateCartSummary();

                // Add enter key support for coupon input
                document.getElementById('coupon-code').addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        applyCoupon();
                    }
                });
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        </script>
</body>

</html>
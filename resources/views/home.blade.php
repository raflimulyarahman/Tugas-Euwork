@extends('layout')
@section('title', 'Shopmart - Belanja Online Terpercaya' )
@section('content')
    <!-- Navigation -->
   

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container text-center position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4 animate-on-scroll">Belanja Online Mudah & Terpercaya</h1>
                    <p class="lead mb-4 animate-on-scroll">Temukan ribuan produk berkualitas dengan harga terbaik. Pengiriman cepat ke seluruh Indonesia!</p>
                    <a href="#products" class="btn btn-light btn-lg me-3 animate-on-scroll">
                        <i class="fas fa-shopping-bag me-2"></i>Belanja Sekarang
                    </a>
                    <a href="#categories" class="btn btn-outline-light btn-lg animate-on-scroll">
                        <i class="fas fa-list me-2"></i>Lihat Kategori
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop" 
                         alt="Shopping" class="img-fluid rounded animate-on-scroll">
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-5">
        <div class="container">
            <h2 class="text-center section-title animate-on-scroll">Kategori Populer</h2>
            <div class="row g-4">
                <div class="col-md-3 animate-on-scroll">
                    <a href="#" class="category-card d-block">
                        <i class="fas fa-mobile-alt fa-3x mb-3"></i>
                        <h5>Elektronik</h5>
                    </a>
                </div>
                <div class="col-md-3 animate-on-scroll">
                    <a href="#" class="category-card d-block" style="background: linear-gradient(45deg, #a8edea 0%, #fed6e3 100%);">
                        <i class="fas fa-tshirt fa-3x mb-3"></i>
                        <h5>Fashion</h5>
                    </a>
                </div>
                <div class="col-md-3 animate-on-scroll">
                    <a href="#" class="category-card d-block" style="background: linear-gradient(45deg, #d299c2 0%, #fef9d7 100%);">
                        <i class="fas fa-home fa-3x mb-3"></i>
                        <h5>Rumah Tangga</h5>
                    </a>
                </div>
                <div class="col-md-3 animate-on-scroll">
                    <a href="#" class="category-card d-block" style="background: linear-gradient(45deg, #89f7fe 0%, #66a6ff 100%);">
                        <i class="fas fa-gamepad fa-3x mb-3"></i>
                        <h5>Gaming</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title animate-on-scroll">Produk Unggulan</h2>
            <div class="row g-4">

                <!-- Product 1 -->
                 @foreach($products as $product)
                <div class="col-lg-3 col-md-6 animate-on-scroll">
                    <div class="card product-card h-100">
                        <div class="position-relative">
                            <img src="{{$product->image}}" 
                                 class="card-img-top product-image" alt="Headphone Premium">
                            <span class="discount-badge">-20%</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text text-muted">{{$product->description}}</p>
                            <div class="rating mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-1">(127 ulasan)</span>
                            </div>
                            <div class="mt-auto">
                                <div class="mb-2">
                                    <span class="price">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                    <span class="original-price ms-2">{{ 'Rp ' . number_format($product->price * 1.15, 0, ',', '.') }}</span>
                                </div>
                                <button class="btn btn-primary w-100">
                                    <i class="fas fa-cart-plus me-2"></i>Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                

            <div class="text-center mt-5">
                <button class="btn btn-primary btn-lg">
                    <i class="fas fa-eye me-2"></i>Lihat Semua Produk
                </button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-3 animate-on-scroll">
                    <div class="p-4">
                        <i class="fas fa-shipping-fast fa-3x text-primary mb-3"></i>
                        <h5>Pengiriman Cepat</h5>
                        <p class="text-muted">Pengiriman dalam 24 jam ke seluruh Indonesia</p>
                    </div>
                </div>
                <div class="col-md-3 animate-on-scroll">
                    <div class="p-4">
                        <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h5>Garansi Resmi</h5>
                        <p class="text-muted">Semua produk bergaransi resmi dari distributor</p>
                    </div>
                </div>
                <div class="col-md-3 animate-on-scroll">
                    <div class="p-4">
                        <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                        <h5>Customer Service 24/7</h5>
                        <p class="text-muted">Tim support siap membantu Anda kapan saja</p>
                    </div>
                </div>
                <div class="col-md-3 animate-on-scroll">
                    <div class="p-4">
                        <i class="fas fa-credit-card fa-3x text-primary mb-3"></i>
                        <h5>Pembayaran Aman</h5>
                        <p class="text-muted">Berbagai metode pembayaran yang aman dan terpercaya</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row my-0 mx-5 pb-5 px-5">
        <div class="col-12">
    {{ $products->links() }}
    </div>
    </div>
@endsection


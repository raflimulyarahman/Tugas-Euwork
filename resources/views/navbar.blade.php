<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#home" style="color: #4f46e5 !important; font-size: 1.5rem;">
            <i class="fas fa-shopping-bag me-2" style="color: #4f46e5;"></i>ShopMart
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#products">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="#categories">Kategori</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            </ul>
            <div class="d-flex">
                <div class="input-group me-3" style="width: 300px;">
                    <input type="text" class="form-control" placeholder="Cari produk...">
                    <button class="btn btn-outline-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
                    <i class="fas fa-user me-1"></i>Masuk
                </a>
                <a href="{{ url('/cart') }}" class="btn btn-primary position-relative">
                    <i class="fas fa-shopping-cart me-1"></i>Keranjang
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                </a>
                </nav>  
                @if (Route::has('login'))
                @auth
                
                @else
                

                @if (Route::has('register'))
                
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
    <style>
    .navbar {
        border-bottom: 1px solid #e5e7eb;
    }

    .navbar .nav-link {
        color: #1f2937 !important;
        font-weight: 500;
    }

    .navbar .nav-link:hover {
        color: #4f46e5 !important;
    }

    .navbar .navbar-brand,
    .navbar .navbar-brand i {
        color: #4f46e5 !important;
        opacity: 1 !important;
    }

    .navbar .navbar-toggler {
        border-color: #4f46e5;
    }

    .navbar-toggler-icon {
        filter: none !important;
        opacity: 1 !important;
    }
</style>
</nav>
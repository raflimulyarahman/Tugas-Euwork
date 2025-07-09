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
                <a
                    href="{{ url('/dashboard') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Dashboard
                </a>
                @else
                

                @if (Route::has('register'))
                
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
</nav>
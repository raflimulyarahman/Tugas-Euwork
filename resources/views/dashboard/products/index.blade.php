<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-container {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            margin: 1rem auto;
            padding: 1rem;
        }
        
        @media (min-width: 768px) {
            .main-container {
                margin: 2rem auto;
                padding: 2rem;
            }
        }
        
        .page-header {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .page-header h1 {
            margin: 0;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            font-size: 1.5rem;
        }
        
        .page-header p {
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        
        @media (min-width: 768px) {
            .page-header {
                padding: 2rem;
                margin-bottom: 2rem;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
            
            .page-header p {
                font-size: 1rem;
            }
        }
        
        .btn-add {
            background: linear-gradient(135deg, #00b894, #00a085);
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 184, 148, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 184, 148, 0.4);
            color: white;
        }
        
        .table-container {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .table thead {
            background: linear-gradient(135deg, #2d3436, #636e72);
            color: white;
        }
        
        .table thead th {
            border: none;
            padding: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background: rgba(108, 92, 231, 0.05);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: rgba(0, 0, 0, 0.05);
        }
        
        .product-image {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        @media (min-width: 768px) {
            .product-image {
                width: 60px;
                height: 60px;
                border-radius: 10px;
            }
        }
        
        .product-name {
            font-weight: 600;
            color: #2d3436;
            font-size: 0.9rem;
            line-height: 1.2;
        }
        
        .product-description {
            color: #636e72;
            font-size: 0.8rem;
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        @media (min-width: 768px) {
            .product-name {
                font-size: 1rem;
            }
            
            .product-description {
                font-size: 0.9rem;
                max-width: 200px;
            }
        }
        
        .price {
            font-weight: 700;
            color: #00b894;
            font-size: 0.9rem;
        }
        
        @media (min-width: 768px) {
            .price {
                font-size: 1.1rem;
            }
        }
        
        .stock-badge {
            padding: 4px 8px;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-block;
        }
        
        @media (min-width: 768px) {
            .stock-badge {
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 0.8rem;
            }
        }
        
        .stock-high {
            background: #d4edda;
            color: #155724;
        }
        
        .stock-medium {
            background: #fff3cd;
            color: #856404;
        }
        
        .stock-low {
            background: #f8d7da;
            color: #721c24;
        }
        
        .btn-edit, .btn-delete {
            padding: 6px 10px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
            border: none;
            transition: all 0.3s ease;
            margin: 1px;
            display: block;
            width: 100%;
            margin-bottom: 4px;
        }
        
        @media (min-width: 768px) {
            .btn-edit, .btn-delete {
                padding: 8px 15px;
                border-radius: 20px;
                font-size: 0.9rem;
                margin: 0 2px;
                display: inline-block;
                width: auto;
                margin-bottom: 0;
            }
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #fdcb6e, #e17055);
            color: white;
        }
        
        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(253, 203, 110, 0.4);
        }
        
        .btn-delete {
            background: linear-gradient(135deg, #fd79a8, #e84393);
            color: white;
        }
        
        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(253, 121, 168, 0.4);
        }
        
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }
        
        .modal-header {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            border-radius: 15px 15px 0 0;
            border: none;
        }
        
        .modal-header h5 {
            font-weight: 600;
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid rgba(108, 92, 231, 0.1);
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #6c5ce7;
            box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
        }
        
        .badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .badge-primary {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
        }
        
        .search-box {
            position: relative;
            margin-bottom: 1rem;
        }
        
        .search-box input {
            padding-left: 45px;
            border-radius: 25px;
            border: 2px solid rgba(108, 92, 231, 0.2);
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c5ce7;
        }
        
        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #636e72;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }
        
        .image-preview {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
            margin-top: 10px;
            border: 2px solid #dee2e6;
        }
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .stats-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #6c5ce7;
        }
        
        .stats-label {
            color: #636e72;
            font-size: 0.8rem;
        }
        
        @media (min-width: 768px) {
            .stats-card {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            .stats-number {
                font-size: 2rem;
            }
            
            .stats-label {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

    <div class="container-fluid">
        <div class="main-container">
            <div class="page-header">
                <h1><i class="fas fa-cube me-3"></i>Manajemen Produk</h1>
                <p class="mb-0">Kelola inventori produk dengan mudah dan efisien</p>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <div class="stats-card text-center">
                        <div class="stats-number" id="totalProducts">0</div>
                        <div class="stats-label">Total Produk</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stats-card text-center">
                        <div class="stats-number" id="totalStock">0</div>
                        <div class="stats-label">Total Stok</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stats-card text-center">
                        <div class="stats-number" id="lowStockCount">0</div>
                        <div class="stats-label">Stok Rendah</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stats-card text-center">
                        <div class="stats-number" id="averagePrice">Rp 0</div>
                        <div class="stats-label">Harga Rata-rata</div>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <div class="row g-2">
                    <div class="col-12 col-md-6">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" class="form-control" id="searchInput" placeholder="Cari produk...">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <select class="form-select" id="stockFilter">
                            <option value="">Semua Stok</option>
                            <option value="high">Stok Tinggi (>50)</option>
                            <option value="medium">Stok Sedang (11-50)</option>
                            <option value="low">Stok Rendah (≤10)</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <button class="btn btn-add w-100" data-bs-toggle="modal" data-bs-target="#addProductModal">
                            <i class="fas fa-plus me-2"></i>Tambah Produk
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="productTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="d-none d-md-table-cell">Gambar</th>
                                <th>Produk</th>
                                <th class="d-none d-lg-table-cell">Deskripsi</th>
                                <th>Stok</th>
                                <th class="d-none d-md-table-cell">Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody">
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->price }}</td>
                                <td><img src="{{$product->image}}" width="50" height="50" alt="{{$product->name}}"></td>
                               

                            </tr>
                            @endforeach
                            <!-- Data akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>

                <div class="empty-state d-none" id="emptyState">
                    <i class="fas fa-cube"></i>
                    <h5>Tidak ada produk ditemukan</h5>
                    <p>Silakan tambah produk baru atau ubah filter pencarian</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit Produk -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        <input type="hidden" id="productId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" id="productName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="productDescription" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="productStock" class="form-label">Stok</label>
                                    <input type="number" class="form-control" id="productStock" min="0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Harga (Rp)</label>
                                    <input type="number" class="form-control" id="productPrice" min="0" step="1000" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productImage" class="form-label">URL Gambar</label>
                                    <input type="url" class="form-control" id="productImage" placeholder="https://example.com/image.jpg">
                                    <img id="imagePreview" class="image-preview d-none" alt="Preview">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="saveProduct">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus produk "<span id="deleteProductName"></span>"?</p>
                    <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Data produk (simulasi database)
        let products = [{
                id: 1,
                name: 'Laptop Gaming ASUS ROG',
                description: 'Laptop gaming dengan performa tinggi untuk gaming dan produktivitas',
                stock: 25,
                price: 15000000,
                image: 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=300&fit=crop'
            },
            {
                id: 2,
                name: 'Smartphone Samsung Galaxy S23',
                description: 'Smartphone flagship dengan kamera canggih dan performa optimal',
                stock: 45,
                price: 12000000,
                image: 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&h=300&fit=crop'
            },
            {
                id: 3,
                name: 'Headphone Sony WH-1000XM4',
                description: 'Headphone wireless dengan noise cancelling terbaik di kelasnya',
                stock: 8,
                price: 4500000,
                image: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=300&fit=crop'
            },
            {
                id: 4,
                name: 'Tablet iPad Pro 11 inch',
                description: 'Tablet premium untuk kreativitas dan produktivitas profesional',
                stock: 15,
                price: 13000000,
                image: 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=400&h=300&fit=crop'
            },
            {
                id: 5,
                name: 'Smartwatch Apple Watch Series 8',
                description: 'Smartwatch dengan fitur kesehatan dan fitness tracking lengkap',
                stock: 30,
                price: 6000000,
                image: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&h=300&fit=crop'
            },
            {
                id: 6,
                name: 'Kamera Mirrorless Canon EOS R5',
                description: 'Kamera professional untuk fotografi dan videografi berkualitas tinggi',
                stock: 5,
                price: 55000000,
                image: 'https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=400&h=300&fit=crop'
            }
        ];

        let editingId = null;
        let filteredProducts = [...products];

        // Fungsi untuk format rupiah
        function formatRupiah(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(amount);
        }

        // Fungsi untuk menentukan class badge stok
        function getStockBadgeClass(stock) {
            if (stock > 50) return 'stock-high';
            if (stock > 10) return 'stock-medium';
            return 'stock-low';
        }

        // Fungsi untuk menentukan label stok
        function getStockLabel(stock) {
            if (stock > 50) return 'Stok Tinggi';
            if (stock > 10) return 'Stok Sedang';
            return 'Stok Rendah';
        }

        // Update stats
        function updateStats() {
            const totalProducts = products.length;
            const totalStock = products.reduce((sum, product) => sum + product.stock, 0);
            const lowStockCount = products.filter(product => product.stock <= 10).length;
            const averagePrice = products.length > 0 ? products.reduce((sum, product) => sum + product.price, 0) / products.length : 0;

            document.getElementById('totalProducts').textContent = totalProducts;
            document.getElementById('totalStock').textContent = totalStock;
            document.getElementById('lowStockCount').textContent = lowStockCount;
            document.getElementById('averagePrice').textContent = formatRupiah(averagePrice);
        }

        // Render tabel
        function renderTable() {
            const tbody = document.getElementById('productTableBody');
            const emptyState = document.getElementById('emptyState');

            if (filteredProducts.length === 0) {
                tbody.innerHTML = '';
                emptyState.classList.remove('d-none');
                return;
            }

            emptyState.classList.add('d-none');

            tbody.innerHTML = filteredProducts.map(product => `
                <tr>
                    <td><span class="badge badge-primary">${product.id}</span></td>
                    <td class="d-none d-md-table-cell">
                        <img src="${product.image}" alt="${product.name}" class="product-image" 
                             onerror="this.src='https://via.placeholder.com/60x60?text=No+Image'">
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="${product.image}" alt="${product.name}" class="product-image d-md-none me-2" 
                                 onerror="this.src='https://via.placeholder.com/40x40?text=No+Image'">
                            <div>
                                <div class="product-name">${product.name}</div>
                                <div class="product-description d-md-none" title="${product.description}">${product.description}</div>
                                <div class="price d-md-none mt-1">${formatRupiah(product.price)}</div>
                            </div>
                        </div>
                    </td>
                    <td class="d-none d-lg-table-cell">
                        <div class="product-description" title="${product.description}">${product.description}</div>
                    </td>
                    <td>
                        <span class="stock-badge ${getStockBadgeClass(product.stock)}">${product.stock}</span>
                    </td>
                    <td class="d-none d-md-table-cell">
                        <div class="price">${formatRupiah(product.price)}</div>
                    </td>
                    <td>
                        <button class="btn btn-edit btn-sm" onclick="editProduct(${product.id})">
                            <i class="fas fa-edit me-1"></i><span class="d-none d-md-inline">Edit</span>
                        </button>
                        <button class="btn btn-delete btn-sm" onclick="deleteProduct(${product.id})">
                            <i class="fas fa-trash me-1"></i><span class="d-none d-md-inline">Hapus</span>
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Filter produk
        function filterProducts() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const stockFilter = document.getElementById('stockFilter').value;

            filteredProducts = products.filter(product => {
                const matchesSearch = product.name.toLowerCase().includes(searchTerm) ||
                    product.description.toLowerCase().includes(searchTerm);

                let matchesStock = true;
                if (stockFilter === 'high') matchesStock = product.stock > 50;
                if (stockFilter === 'medium') matchesStock = product.stock > 10 && product.stock <= 50;
                if (stockFilter === 'low') matchesStock = product.stock <= 10;

                return matchesSearch && matchesStock;
            });

            renderTable();
        }

        // Event listeners untuk filter
        document.getElementById('searchInput').addEventListener('input', filterProducts);
        document.getElementById('stockFilter').addEventListener('change', filterProducts);

        // Preview gambar
        document.getElementById('productImage').addEventListener('input', function(e) {
            const preview = document.getElementById('imagePreview');
            const url = e.target.value;

            if (url) {
                preview.src = url;
                preview.classList.remove('d-none');
                preview.onerror = function() {
                    this.src = 'https://via.placeholder.com/100x100?text=Invalid+URL';
                };
            } else {
                preview.classList.add('d-none');
            }
        });

        // Simpan produk
        document.getElementById('saveProduct').addEventListener('click', function() {
            const name = document.getElementById('productName').value;
            const description = document.getElementById('productDescription').value;
            const stock = parseInt(document.getElementById('productStock').value);
            const price = parseInt(document.getElementById('productPrice').value);
            const image = document.getElementById('productImage').value || 'https://via.placeholder.com/400x300?text=No+Image';

            if (!name || !description || stock < 0 || price < 0) {
                alert('Mohon isi semua field dengan benar!');
                return;
            }

            if (editingId) {
                // Update produk
                const index = products.findIndex(p => p.id === editingId);
                products[index] = {
                    id: editingId,
                    name,
                    description,
                    stock,
                    price,
                    image
                };
                editingId = null;
            } else {
                // Tambah produk baru
                const newId = Math.max(...products.map(p => p.id)) + 1;
                products.push({
                    id: newId,
                    name,
                    description,
                    stock,
                    price,
                    image
                });
            }

            // Reset form
            document.getElementById('productForm').reset();
            document.getElementById('productId').value = '';
            document.getElementById('modalTitle').textContent = 'Tambah Produk Baru';
            document.getElementById('imagePreview').classList.add('d-none');

            // Update display
            filterProducts();
            updateStats();

            // Tutup modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
            modal.hide();

            showToast('Produk berhasil disimpan!', 'success');
        });

        // Edit produk
        function editProduct(id) {
            const product = products.find(p => p.id === id);
            if (product) {
                editingId = id;
                document.getElementById('productId').value = id;
                document.getElementById('productName').value = product.name;
                document.getElementById('productDescription').value = product.description;
                document.getElementById('productStock').value = product.stock;
                document.getElementById('productPrice').value = product.price;
                document.getElementById('productImage').value = product.image;
                document.getElementById('modalTitle').textContent = 'Edit Produk';

                // Show image preview
                const preview = document.getElementById('imagePreview');
                preview.src = product.image;
                preview.classList.remove('d-none');

                const modal = new bootstrap.Modal(document.getElementById('addProductModal'));
                modal.show();
            }
        }

        // Hapus produk
        function deleteProduct(id) {
            const product = products.find(p => p.id === id);
            if (product) {
                document.getElementById('deleteProductName').textContent = product.name;
                document.getElementById('confirmDelete').onclick = function() {
                    products = products.filter(p => p.id !== id);
                    filterProducts();
                    updateStats();

                    const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                    modal.hide();

                    showToast('Produk berhasil dihapus!', 'success');
                };

                const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
                modal.show();
            }
        }

        // Toast notification
        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
            toast.style.zIndex = '9999';
            toast.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                ${message}
            `;

            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Reset form ketika modal ditutup
        document.getElementById('addProductModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('productForm').reset();
            document.getElementById('productId').value = '';
            document.getElementById('modalTitle').textContent = 'Tambah Produk Baru';
            document.getElementById('imagePreview').classList.add('d-none');
            editingId = null;
        });

        // Inisialisasi halaman
        renderTable();
        updateStats();
    </script>


</x-app-layout>
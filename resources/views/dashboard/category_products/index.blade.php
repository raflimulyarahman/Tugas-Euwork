<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori Produk') }}
        </h2>
    </x-slot>



    <div class="container">
        <div class="main-container">
            <div class="page-header">
                <h1><i class="fas fa-tags me-3"></i>Manajemen Kategori Produk</h1>
                <p class="mb-0">Kelola kategori produk dengan mudah dan efisien</p>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="search-box flex-grow-1 me-3">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" id="searchInput" placeholder="Cari kategori...">
                </div>
                <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="fas fa-plus me-2"></i>Tambah Kategori
                </button>
            </div>

            <div class="table-container">
                <table class="table table-hover mb-0" id="categoryTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Jumlah Produk</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTableBody">
                        <!-- Data akan diisi oleh JavaScript -->
                    </tbody>
                </table>

                <div class="empty-state d-none" id="emptyState">
                    <i class="fas fa-inbox"></i>
                    <h5>Tidak ada kategori ditemukan</h5>
                    <p>Silakan tambah kategori baru atau ubah kata kunci pencarian</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit Kategori -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        <input type="hidden" id="categoryId">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="categoryName" required>
                        </div>
                        <div class="mb-3">
                            <label for="productCount" class="form-label">Jumlah Produk</label>
                            <input type="number" class="form-control" id="productCount" min="0" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="saveCategory">Simpan</button>
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
                    <p>Apakah Anda yakin ingin menghapus kategori "<span id="deleteCategoryName"></span>"?</p>
                    <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        } */

        

        .main-container {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            margin: 2rem auto;
            padding: 2rem;
        }

        .page-header {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .page-header h1 {
            margin: 0;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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
            background: rgba(102, 126, 234, 0.05);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: rgba(0, 0, 0, 0.05);
        }

        .btn-edit,
        .btn-delete {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            border: none;
            transition: all 0.3s ease;
            margin: 0 2px;
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
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 15px 15px 0 0;
            border: none;
        }

        .modal-header h5 {
            font-weight: 600;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid rgba(102, 126, 234, 0.1);
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .badge-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .search-box {
            position: relative;
            margin-bottom: 1rem;
        }

        .search-box input {
            padding-left: 45px;
            border-radius: 25px;
            border: 2px solid rgba(102, 126, 234, 0.2);
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
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
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Data kategori (simulasi database)
        let categories = [{
                id: 1,
                name: 'Elektronik',
                productCount: 45
            },
            {
                id: 2,
                name: 'Pakaian',
                productCount: 28
            },
            {
                id: 3,
                name: 'Makanan & Minuman',
                productCount: 67
            },
            {
                id: 4,
                name: 'Olahraga',
                productCount: 23
            },
            {
                id: 5,
                name: 'Buku & Alat Tulis',
                productCount: 34
            }
        ];

        let editingId = null;
        let filteredCategories = [...categories];

        // Render tabel
        function renderTable() {
            const tbody = document.getElementById('categoryTableBody');
            const emptyState = document.getElementById('emptyState');

            if (filteredCategories.length === 0) {
                tbody.innerHTML = '';
                emptyState.classList.remove('d-none');
                return;
            }

            emptyState.classList.add('d-none');

            tbody.innerHTML = filteredCategories.map(category => `
                <tr>
                    <td><span class="badge badge-primary">${category.id}</span></td>
                    <td><strong>${category.name}</strong></td>
                    <td><span class="badge bg-info">${category.productCount} produk</span></td>
                    <td><span class="badge bg-success">Aktif</span></td>
                    <td>
                        <button class="btn btn-edit btn-sm" onclick="editCategory(${category.id})">
                            <i class="fas fa-edit me-1"></i>Edit
                        </button>
                        <button class="btn btn-delete btn-sm" onclick="deleteCategory(${category.id})">
                            <i class="fas fa-trash me-1"></i>Hapus
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Pencarian
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            filteredCategories = categories.filter(category =>
                category.name.toLowerCase().includes(searchTerm)
            );
            renderTable();
        });

        // Tambah kategori
        document.getElementById('saveCategory').addEventListener('click', function() {
            const name = document.getElementById('categoryName').value;
            const productCount = parseInt(document.getElementById('productCount').value);

            if (!name || productCount < 0) {
                alert('Mohon isi semua field dengan benar!');
                return;
            }

            if (editingId) {
                // Update kategori
                const index = categories.findIndex(c => c.id === editingId);
                categories[index] = {
                    id: editingId,
                    name,
                    productCount
                };
                editingId = null;
            } else {
                // Tambah kategori baru
                const newId = Math.max(...categories.map(c => c.id)) + 1;
                categories.push({
                    id: newId,
                    name,
                    productCount
                });
            }

            // Reset form
            document.getElementById('categoryForm').reset();
            document.getElementById('categoryId').value = '';
            document.getElementById('modalTitle').textContent = 'Tambah Kategori Baru';

            // Update filtered categories dan render ulang
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            filteredCategories = categories.filter(category =>
                category.name.toLowerCase().includes(searchTerm)
            );
            renderTable();

            // Tutup modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addCategoryModal'));
            modal.hide();

            // Show success message
            showToast('Kategori berhasil disimpan!', 'success');
        });

        // Edit kategori
        function editCategory(id) {
            const category = categories.find(c => c.id === id);
            if (category) {
                editingId = id;
                document.getElementById('categoryId').value = id;
                document.getElementById('categoryName').value = category.name;
                document.getElementById('productCount').value = category.productCount;
                document.getElementById('modalTitle').textContent = 'Edit Kategori';

                const modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
                modal.show();
            }
        }

        // Hapus kategori
        function deleteCategory(id) {
            const category = categories.find(c => c.id === id);
            if (category) {
                document.getElementById('deleteCategoryName').textContent = category.name;
                document.getElementById('confirmDelete').onclick = function() {
                    categories = categories.filter(c => c.id !== id);

                    // Update filtered categories
                    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
                    filteredCategories = categories.filter(category =>
                        category.name.toLowerCase().includes(searchTerm)
                    );
                    renderTable();

                    const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                    modal.hide();

                    showToast('Kategori berhasil dihapus!', 'success');
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
            toast.textContent = message;

            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Reset form ketika modal ditutup
        document.getElementById('addCategoryModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('categoryForm').reset();
            document.getElementById('categoryId').value = '';
            document.getElementById('modalTitle').textContent = 'Tambah Kategori Baru';
            editingId = null;
        });

        // Render tabel saat halaman dimuat
        renderTable();
    </script>

    </html>
</x-app-layout>

<!-- <!DOCTYPE html>
<html lang="id"> -->
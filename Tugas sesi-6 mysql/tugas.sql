-- TUGAS DATABASE E-COMMERCE
-- Nama: Rafli Mulyarahman
-- 

-- Bagian 1: Membuat Database dan Tabel
CREATE DATABASE toko;
USE toko;

CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(255) NOT NULL,
    harga DECIMAL(10, 2) NOT NULL,
    deskripsi TEXT,
    stok INT(11)
);

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE orders (
    order_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11),
    product_id INT(11),
    quantity INT(11) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Bagian 2: Query CRUD untuk Tabel Products

-- CREATE: Menambah data produk baru
INSERT INTO products (nama_produk, harga, deskripsi, stok) VALUES ('Laptop Pro', 12500000, 'Laptop untuk pekerjaan profesional.', 20);

-- READ: Membaca semua data produk
SELECT * FROM products;

-- UPDATE: Mengubah data produk dengan id = 1
UPDATE products SET stok = 18 WHERE id = 1;

-- DELETE: Menghapus data produk dengan id = 1
DELETE FROM products WHERE id = 1;
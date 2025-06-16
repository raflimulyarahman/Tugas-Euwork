-- Database Schema untuk E-commerce
CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;

-- Tabel kategori produk
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel produk
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    category_id INT,
    image_url VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Tabel keranjang belanja
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT DEFAULT 1,
    session_id VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Insert data sample
INSERT INTO categories (name, description) VALUES
('Elektronik', 'Perangkat elektronik dan gadget'),
('Fashion', 'Pakaian dan aksesoris'),
('Buku', 'Buku dan alat tulis'),
('Rumah Tangga', 'Peralatan rumah tangga');

INSERT INTO products (name, description, price, stock, category_id, image_url) VALUES
('Smartphone Android', 'Smartphone terbaru dengan fitur canggih', 2500000, 15, 1, 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c21hcnRwaG9uZXxlbnwwfHwwfHx8MA%3D%3D'),
('Laptop Gaming', 'Laptop untuk gaming dengan spesifikasi tinggi', 8500000, 8, 1, 'https://images.unsplash.com/photo-1611078489935-0cb964de46d6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Z2FtaW5nJTIwbGFwdG9wfGVufDB8fDB8fHww'),
('Kaos Polos', 'Kaos polos berkualitas tinggi', 75000, 50, 2, 'https://images.unsplash.com/photo-1726140872004-850c80900ae3?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8YmxhY2slMjB0JTIwc2hpcnR8ZW58MHx8MHx8fDA%3D'),
('Celana Jeans', 'Celana jeans premium', 250000, 25, 2, 'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8SmVhbnN8ZW58MHx8MHx8fDA%3D'),
('Novel Bestseller', 'Novel terbaru dari penulis terkenal', 85000, 30, 3, 'https://images.unsplash.com/photo-1614544048536-0d28caf77f41?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8bm92ZWx8ZW58MHx8MHx8fDA%3D'),
('Blender', 'Blender multifungsi untuk dapur', 350000, 12, 4, 'https://images.unsplash.com/photo-1570222094114-d054a817e56b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8YmxlbmRlcnxlbnwwfHwwfHx8MA%3D%3D'),
('Headphone Wireless', 'Headphone nirkabel dengan kualitas suara jernih', 450000, 20, 1, 'https://images.unsplash.com/photo-1641048930621-ab5d225ae5b0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8d2lyZWxlc3MlMjBoZWFkcGhvbmV8ZW58MHx8MHx8fDA%3D'),
('Dress Casual', 'Dress casual untuk sehari-hari', 180000, 18, 2, 'https://images.unsplash.com/photo-1656060937859-41d42cf527f9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fGNhc3VhbCUyMGRyZXNzfGVufDB8fDB8fHww');
<?php
// Konfigurasi database
$host = 'localhost';
$dbname = 'ecommerce_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Mulai session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Generate session ID jika belum ada
if (!isset($_SESSION['cart_session'])) {
    $_SESSION['cart_session'] = session_id();
}

// Fungsi untuk format rupiah
function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Fungsi untuk menghitung total item dalam keranjang
function getCartCount($pdo, $session_id) {
    $stmt = $pdo->prepare("SELECT SUM(quantity) as total FROM cart WHERE session_id = ?");
    $stmt->execute([$session_id]);
    $result = $stmt->fetch();
    return $result['total'] ?? 0;
}
?>
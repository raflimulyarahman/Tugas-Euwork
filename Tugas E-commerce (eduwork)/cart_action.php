<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $product_id = $_POST['product_id'] ?? 0;
    $quantity = $_POST['quantity'] ?? 1;
    $session_id = $_SESSION['cart_session'];

    switch ($action) {
        case 'add':
            // Cek apakah produk sudah ada di keranjang
            $stmt = $pdo->prepare("SELECT * FROM cart WHERE product_id = ? AND session_id = ?");
            $stmt->execute([$product_id, $session_id]);
            $existing = $stmt->fetch();

            if ($existing) {
                // Update quantity jika sudah ada
                $stmt = $pdo->prepare("UPDATE cart SET quantity = quantity + ? WHERE product_id = ? AND session_id = ?");
                $stmt->execute([$quantity, $product_id, $session_id]);
            } else {
                // Tambah produk baru ke keranjang
                $stmt = $pdo->prepare("INSERT INTO cart (product_id, quantity, session_id) VALUES (?, ?, ?)");
                $stmt->execute([$product_id, $quantity, $session_id]);
            }

            // Ambil nama produk untuk pesan
            $stmt = $pdo->prepare("SELECT name FROM products WHERE id = ?");
            $stmt->execute([$product_id]);
            $product = $stmt->fetch();
            
            $_SESSION['cart_message'] = "Produk '{$product['name']}' berhasil ditambahkan ke keranjang!";
            header('Location: index.php');
            break;

        case 'update':
            if ($quantity > 0) {
                $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE product_id = ? AND session_id = ?");
                $stmt->execute([$quantity, $product_id, $session_id]);
            } else {
                $stmt = $pdo->prepare("DELETE FROM cart WHERE product_id = ? AND session_id = ?");
                $stmt->execute([$product_id, $session_id]);
            }
            header('Location: cart.php');
            break;

        case 'remove':
            $stmt = $pdo->prepare("DELETE FROM cart WHERE product_id = ? AND session_id = ?");
            $stmt->execute([$product_id, $session_id]);
            $_SESSION['cart_message'] = "Produk berhasil dihapus dari keranjang!";
            header('Location: cart.php');
            break;

        case 'clear':
            $stmt = $pdo->prepare("DELETE FROM cart WHERE session_id = ?");
            $stmt->execute([$session_id]);
            $_SESSION['cart_message'] = "Keranjang berhasil dikosongkan!";
            header('Location: cart.php');
            break;

        default:
            header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
?>
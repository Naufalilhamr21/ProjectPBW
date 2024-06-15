<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_id"]) && is_numeric($_POST["product_id"])) {
        $productId = $_POST["product_id"];
        
        // Hapus produk dari sesi keranjang belanja
        if (($key = array_search($productId, $_SESSION['cart'])) !== false) {
            unset($_SESSION['cart'][$key]);
        }
    }
}

// Redirect kembali ke halaman keranjang belanja
header("Location: cart.php");
exit;


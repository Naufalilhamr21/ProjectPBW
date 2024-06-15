<?php
require "../login/session.php";
require "../conn.php";
require "navbar.php";

// Memeriksa apakah ada sesi keranjang belanja
if (!isset($_SESSION['cart'])) {
    // Jika tidak ada, inisialisasikan sesi keranjang belanja sebagai array kosong
    $_SESSION['cart'] = array();
}

// Memeriksa apakah ada parameter 'id' yang dikirimkan
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = $_GET['id'];

    // Memeriksa apakah produk sudah ada di keranjang belanja
    if (in_array($productId, $_SESSION['cart'])) {
        // Jika produk sudah ada, tambahkan satu lagi ke dalam keranjang belanja
        array_push($_SESSION['cart'], $productId);
    } else {
        // Jika produk belum ada, tambahkan produk ke dalam keranjang belanja dengan kuantitas 1
        $_SESSION['cart'][] = $productId;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Web Icon -->
    <link rel="icon" type="image" href="../image/iconFps.png">

    <!-- Title -->
    <title>Flagship Phone Store | Shopping cart</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Briem+Hand:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

    <!-- Main -->
    <div class="main" style="height: 100%">

        <!-- Banner -->
        <div class="container-fluid banner-product align-items-center">
            <div class="container">
                <a href="cart.php" style="text-decoration: none;">
                    <h3 class="text-white text-center py-4" style="font-weight: 600">SHOPPING CART</h3>
                </a>
            </div>
        </div>

        <!-- Shopping cart table -->
        <div class="container py-3 mt-3 text-center">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($_SESSION['cart'])) {
                        $cartProducts = array_count_values($_SESSION['cart']);
                        $queryProducts = "SELECT id, name, price, image FROM product WHERE id IN (" . implode(',', array_keys($cartProducts)) . ")";
                        $sqlProducts = mysqli_query($conn, $queryProducts);
                        $no = 1;

                        while ($data = mysqli_fetch_array($sqlProducts)) {
                            $productId = $data['id'];
                            $productName = $data['name'];
                            $productPrice = $data['price'];
                            $productImage = $data['image'];
                            $productQuantity = $cartProducts[$productId];
                            $totalPrice = $productPrice * $productQuantity;
                            ?>
                            <tr>
                                <td><?php echo $no++ ?>.</td>
                                <td><img src="../img/<?php echo $productImage?>" alt="" style="width: 70px"></td>
                                <td><?php echo $productName ?></td>
                                <td>Rp <?php echo number_format($productPrice); ?></td>
                                <td><?php echo $productQuantity; ?></td>
                                <td>Rp <?php echo number_format($totalPrice); ?></td>
                                <td>
                                    <form action="clearCart.php" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $productId ?>">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure to delete this product from cart?')"><i
                                                class="fa-solid fa-trash" style="color: #ffffff"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7" class="text-center">No products in shopping cart</td>
                        </tr>
                        <?php
                    }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Footer -->
        <div class="mt-4 pt-5 justify-content-center text-center">
            <a href="product.php" class="text-decoration-none px-3 py-2 text-white rounded-3"
                style="background-color: #212121;">Back shopping</a>
        </div>

        <div class="container-fluid mt-5">
            <hr>
            <h5 class="text-center mb-4 mt-4"><strong>FIND US</strong></h5>
            <div class="row justify-content-center">
                <div class="col-sm-1 d-flex justify-content-center mb-3">
                    <a href="http://facebook.com"><i class="fab fa-facebook fs-2" style="color: #212121"></i></a>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-3">
                    <a href="http://instagram.com"><i class="fab fa-instagram fs-2" style="color: #212121"></i></a>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-3">
                    <a href="http://twitter.com"><i class="fab fa-twitter fs-2" style="color: #212121"></i></a>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-3">
                    <a href="http://whatsapp.com"><i class="fab fa-whatsapp fs-2" style="color: #212121"></i></a>
                </div>
            </div>
        </div>

        <div class="container-fluid py-3 bg-dark text-light mt-3">
            <div class="container d-flex justify-content-between">
                <label>&copy;2024 Flagship Phone Store</label>
                <label>Created by Kelompok 3</label>
            </div>
        </div>
    </div>
</body>

</html>
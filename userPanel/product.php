<?php
require "../login/session.php"; 
require "../conn.php";
require "navbar.php";

$queryCategory = "SELECT * FROM category";
$sqlCategory = mysqli_query($conn, $queryCategory);

// Get product by keyword
if (isset($_GET['keyword'])) {
    $queryProduct = "SELECT * FROM product WHERE name LIKE '%$_GET[keyword]%'";
    $sqlProduct = mysqli_query($conn, $queryProduct);
}
// Get product by category
else if (isset($_GET['category'])) {
    $queryGetCategoryId = "SELECT id FROM category WHERE Brand = '$_GET[category]'";
    $sqlGetCategoryId = mysqli_query($conn, $queryGetCategoryId);
    $categoryId = mysqli_fetch_array($sqlGetCategoryId);

    $queryProduct = "SELECT * FROM product WHERE categoryId = '$categoryId[id]'";
    $sqlProduct = mysqli_query($conn, $queryProduct);
}
// Get product default
else {
    $queryProduct = "SELECT * FROM product";
    $sqlProduct = mysqli_query($conn, $queryProduct);
}

$countData = mysqli_num_rows($sqlProduct);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Icon -->
    <link rel="icon" type="image" href="../image/iconFps.png">

    <!-- Title -->
    <title>Flagship Phone Store | Product</title>

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
    <div class="main">

        <!-- Header -->
        <div class="container-fluid banner-product align-items-center">
            <div class="container">
                <a href="product.php" style="text-decoration: none;">
                    <h3 class="text-white text-center py-4"
                    style="font-weight: 600">PRODUCTS</h3>
                </a>
            </div>
        </div>

        <!-- Categories -->
        <div class="container py-3 mt-3">
            <ul class="list-group list-group-horizontal justify-content-center">
                <?php while ($category = mysqli_fetch_array($sqlCategory)) { ?>
                    <a href="product.php?category=<?php echo $category['Brand']; ?>">
                        <li class="list-group-item"><strong><?php echo $category['Brand']; ?></strong></li>
                    </a>
                <?php } ?>
            </ul>
        </div>

        <!-- All Products -->
        <div class="container-fluid py-4 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <?php
                    if ($countData < 1) {
                        ?>
                        <h5 class="text-center text-secondary">Product not available.</h5>
                        <?php
                    }
                    ?>
                    <?php while ($product = mysqli_fetch_array($sqlProduct)) { ?>
                        <div class="card mb-3 mx-2 text-end" style="max-width: 530px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../img/<?php echo $product['image']; ?>" class="img-fluid rounded-start my-2"
                                        alt="" style="width: 130px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mt-2"><?php echo $product['name']; ?></h5>
                                        <p class="card-text"><?php echo $product['description']; ?></p>
                                        <p class="card-text">Rp <?php echo number_format($product['price']); ?></p>
                                        <a href="#"
                                            class="text-decoration-none px-3 py-1 text-white rounded-4 stretched-link" data-bs-toggle="modal" data-bs-target="#productModal<?php echo $product['id']; ?>"
                                            style="background-color: #212121;">
                                            See product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- Modal -->
                <?php 
                $queryProduct = "SELECT a.*, b.Brand AS categoryName FROM product a JOIN category b ON a.categoryId = b.id ";
                $sqlProduct = mysqli_query($conn, $queryProduct);
                while ($data = mysqli_fetch_array($sqlProduct)) { 
                ?>
                <div class="modal" id="productModal<?php echo $data['id']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Product Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="../img/<?php echo $data['image']; ?>" alt="" style="width: 150px; margin: 0 100px">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Product</th>
                                                <td>: <?php echo $data['name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Category</th>
                                                <td>: <?php echo $data['categoryName']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>: <?php echo $data['description']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Price</th>
                                                <td>: Rp <?php echo number_format($data['price']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Availability</th>
                                                <td>: <?php echo $data['stock']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="cart.php?id=<?php echo $data['id']; ?>" class="btn text-white" style="background-color: #212121;" onclick="alert('Product successfully added to cart.')">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <!-- Footer -->
        <hr>
        <div class="container mt-4">
            <h5 class="text-center mb-4 mt-2"><strong>FIND US</strong></h5>
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
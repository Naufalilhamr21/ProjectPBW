<?php
require "../login/session.php";
require "../conn.php";
require "navbar.php";

$queryProduct = "SELECT id, name, price, image, description from product LIMIT 4";
$sqlProduct = mysqli_query($conn, $queryProduct);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Icon -->
    <link rel="icon" type="image" href="../image/iconFps.png">

    <!-- Title -->
    <title>Flagship Phone Store | Home</title>

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

        <!-- Banner -->
        <div class="container-fluid p-4">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner" style="border: solid 1px; border-radius: 20px">
                    <div class="carousel-item active">
                        <a href="product.php">
                            <img src="../image/fpsBg.png" class="d-block w-100" alt="...">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="product.php?category=Apple">
                            <img src="../image/bannerFps2.png" class="d-block w-100" alt="...">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="product.php?category=Samsung">
                            <img src="../image/bannerFps.png" class="d-block w-100" alt="...">
                        </a>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Categories -->
        <div class="container-fluid py-4 mt-3 mb-4">
            <div class="container text-center">
                <h3 class="categoriesTitle">SHOP BY CATEGORIES</h3>

                <div class="row mt-5 justify-content-center align-items-center">
                    <div class="col-md-2 mb-3 mx-3">
                        <div class="highlightedCategories">
                            <a href="product.php?category=Samsung"><img src="../image/samsung-8.png"
                                    style="width: 145px; margin-top: 54px" class="imageCategory" alt="Samsung"></a>
                        </div>
                    </div>

                    <div class="col-md-2 mb-3 mx-3">
                        <div class="highlightedCategories">
                            <a href="product.php?category=Apple"><img src="../image/apple-14.png"
                                    style="width: 55px; margin-top: 36px" class="imageCategory" alt="Apple"></a>
                        </div>
                    </div>

                    <div class="col-md-2 mb-3 mx-3">
                        <div class="highlightedCategories">
                            <a href="product.php?category=Asus"><img src="../image/asus-logo.png"
                                    style="width: 110px; margin-top: 60px" class="imageCategory" alt="Asus"></a>
                        </div>
                    </div>

                    <div class="col-md-2 mb-3 mx-3">
                        <div class="highlightedCategories">
                            <a href="product.php?category=Xiaomi"><img src="../image/xiaomi-4.png"
                                    style="width: 130px; margin-top: 54px" class="imageCategory" alt="Xiaomi"></a>
                        </div>
                    </div>

                    <div class="col-md-2 mb-3 mx-3">
                        <div class="highlightedCategories">
                            <a href="product.php?category=Google Pixel"><img src="../image/google-pixel-1.png"
                                    style="width: 60px; margin-top: 60px" class="imageCategory" alt="Google Pixel"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us -->
        <div class="container-fluid py-5 mb-3 aboutUs">
            <div class="container">
                <h3 class="text-white text-center aboutUsTitle">ABOUT US</h3>
                <p class="fs-6 mt-3 text-white text-center">Flagship Phone Store is a trusted flagship cellphone store
                    in Indonesia that offers a variety of the latest and most sophisticated smartphones from well-known
                    brands. We are committed to providing the best shopping experience for customers by providing high
                    quality products, competitive prices and excellent customer service We only sell original and
                    official flagship phone products from official distributors. All our products have gone through a
                    strict quality inspection process to ensure that you get the best products.</p>
            </div>
        </div>

        <!-- Best Product -->
        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <h3 class="text-center bestProductTitle">BEST PRODUCTS</h3>

                <div class="row mt-5 justify-content-center">
                    <?php while ($data = mysqli_fetch_array($sqlProduct)) { ?>
                        <div class="card mb-3 mx-2 text-end" style="max-width: 530px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../img/<?php echo $data['image']; ?>" class="img-fluid rounded-start my-2"
                                        alt="" style="width: 130px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mt-2"><?php echo $data['name']; ?></h5>
                                        <p class="card-text"><?php echo $data['description']; ?></p>
                                        <p class="card-text">Rp <?php echo number_format($data['price']); ?></p>
                                        <a href="#"
                                            class="text-decoration-none px-3 py-1 text-white rounded-4 stretched-link "
                                            style="background-color: #212121;" data-bs-toggle="modal" data-bs-target="#productModal<?php echo $data['id']; ?>">
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
                <div class="modal align-content-center" id="productModal<?php echo $data['id']; ?>" tabindex="-1">
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
                                        <img src="../img/<?php echo $data['image']; ?>" alt="" style="width: 150px; margin: 20px 100px">
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
                                <a href="cart.php?id=<?php echo $data['id']; ?>" class="btn text-white" style="background-color: #212121;" onclick="alert('Product successfully added to cart.')">Add to cart</a>
                                <a href="cart.php?id=<?php echo $data['id']; ?>" class="btn text-white" style="background-color: #212121;">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="mt-4 justify-content-center text-center">
                    <a href="product.php" class="text-decoration-none px-3 py-2 text-white rounded-5"
                        style="background-color: #212121;">See All Product</a>
                </div>
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
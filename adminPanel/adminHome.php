<?php
    require "../login/session.php";
    require "../conn.php";
    require "navbar.php";

    $queryCategory = mysqli_query($conn, "SELECT * FROM category");
    $totalCategory = mysqli_num_rows($queryCategory);

    $queryProduct = mysqli_query($conn, "SELECT * FROM product");
    $totalProduct = mysqli_num_rows($queryProduct);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Icon -->
    <link rel="icon" type="image" href="img/iconFps.png">

    <!-- Title -->
    <title>Home</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Briem+Hand:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .summary-category {
            background-color: #212121;
            border-radius: 20px;
        }

        .summary-product {
            background-color: #212121;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

    <!-- Main -->
    <div class="container mt-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="adminHome.php" class="text-muted" style="text-decoration: none"><i class="fa-solid fa-house"></i> Home</a>
                </li>
            </ol>
        </nav>

        <!-- Welcome Text -->
        <h2 class="text-capitalize">Welcome, <?php echo $_SESSION['username'] ?></h2>

        <!-- Box Category and Product -->
        <div class="container mt-4">
            <!-- Category -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-category p-4">
                        <div class="row">
                            <div class="col-5 d-flex">
                                <a href="category.php"><i class="fa-solid fa-2x fa-bars" style="color: #ffffff;"></i></a>
                            </div>
                            <div class="col-5 text-white">
                                <h3><a class="text-white" href="category.php" style="text-decoration: none">Category</a>
                                </h3>
                                <p style="color: #cccccc;"><?php echo $totalCategory; ?> Category</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product -->
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-product p-4">
                        <div class="row">
                            <div class="col-5 d-flex">
                                <a href="product.php"><i class="fa-solid fa-2x fa-mobile"
                                        style="color: #ffffff"></i></a>
                            </div>
                            <div class="col-5 text-white">
                                <h3><a class="text-white" href="product.php" style="text-decoration: none">Product</a>
                                </h3>
                                <p style="color: #CCCCCC;"><?php echo $totalProduct; ?> Product</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>

</html>
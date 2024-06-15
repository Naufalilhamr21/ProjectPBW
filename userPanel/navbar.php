<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Icon -->
    <link rel="icon" type="image" href="../image/iconFps.png">

    <!-- Title -->
    <title>Flagship Phone Store</title>

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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <div class="logo">
                    <a class="navbar-brand fs-5 me-4" href="userHome.php"><img src="../image/logoFps.png" alt="logo"
                            style="width: 60px;">Flagship Phone Store</a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="product.php">All Products</a>
                        </li>
                    </ul>

                    <form method="GET" action="product.php" class="d-flex mx-3 me-auto mb-4 mb-lg-0" id="searchBar"
                        role="search">
                        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keyword">
                        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"
                                style="color: #ffffff;"></i></button>
                    </form>

                    <div class="d-flex mx-3 me-auto mb-3 mb-lg-0 mb-mx-3">
                        <a href="cart.php"><i class="fa-solid fa-cart-shopping fs-5" style="color: #ffffff"></i></a>
                    </div>

                    <div class="d-flex me-auto mb-4 mb-lg-0">
                        <a href="/login/logout.php" class="text-decoration-none px-3 py-1 text-white rounded-4"
                            style="background-color: #B80000;" onclick="return confirm('Are you sure to log out?')">Log
                            Out</a>
                    </div>
                </div>
            </div>
        </nav>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Web Icon -->
    <link rel="icon" type="image" href="img/iconFps.png">

    <!-- Title -->
    <title>Flagship Phone Store</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Briem+Hand:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="vh-100 ">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <!-- logo -->
            <div class="logo">
                <a class="navbar-brand fs-4" href="index.php"><img src="img/logoFps.png" alt="logo" style="width: 60px;">Flagship Phone Store</a>
            </div>
            

            <!-- toggle button -->
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- sidebar -->
            <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">

                <!-- sidebar header -->
                <div class="sbheader">
                    <div class="offcanvas-header text-white border-bottom">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="img/logoFps.png" alt="logo" style="width: 60px">Flagship Phone Store</h5>
                        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                </div>
                

                <!-- sidebar body -->
                <div class="offcanvas-body d-flex flex-lg-row flex-column p-5 p-lg-2">
                    <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">

                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" aria-current="page" href="adminHome.php">Home</a>
                        </li>

                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="category.php">Category</a>
                        </li>

                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="product.php">Product</a>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <a href="/login/logout.php" class="text-decoration-none px-3 py-1 text-white rounded-4" style="background-color: #B80000" onclick="return confirm('Are you sure to log out?')">Log Out</a>
                    </div>
                </div>
            </div>  
        </div>
    </nav>
</body>

</html>
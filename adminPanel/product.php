<?php
require "../login/session.php";
require "../conn.php";
require "navbar.php";

$queryProduct = "SELECT a.*, b.Brand AS categoryName FROM product a JOIN category b ON a.categoryId = b.id ";
$sqlProduct = mysqli_query($conn, $queryProduct);

$totalProduct = mysqli_num_rows($sqlProduct);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Icon -->
    <link rel="website icon" type="png" href="../img/FPS.png">

    <!-- Title -->
    <title>Producr</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Briem+Hand:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="adminHome.php" class="text-muted" style="text-decoration: none"><i
                            class="fa-solid fa-house"></i> Home</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    <a href="product.php" class="text-muted" style="text-decoration: none"> Product</a>
                </li>
            </ol>
        </nav>

        <!-- List -->
        <div class="mt-3">
            <div class="d-flex justify-content-between">
                <h2>List Product</h2>

                <a href="addProduct.php"><button type="button" class="btn text-white" style="background-color: #212121;">Add New
                        Product</button></a>
            </div>

            <div class="table-responsive mt-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                            if ($totalProduct == 0) {
                        ?>  
                                <tr>
                                    <td colspan="7" class="text-center">No products</td>
                                </tr>
                        <?php 
                            } else {
                                $no = 1;
                                while ($result = mysqli_fetch_assoc($sqlProduct)) {
                        ?>
                                    <tr>
                                        <td><?php echo $no++; ?>.</td>
                                        <td><?php echo $result['name']; ?></td>
                                        <td><?php echo $result['categoryName']; ?></td>
                                        <td>Rp <?php echo number_format($result['price']); ?></td>
                                        <td><?php echo $result['stock']; ?></td>
                                        <td>
                                            <img src="../img/<?php echo $result['image']; ?>" style="width: 100px"></td>
                                        <td>
                                            <a href="editProduct.php?edit= <?php echo $result['id']; ?>" class="btn" style="background-color: #212121;">
                                                <i class="fa-solid fa-pen" style="color: #ffffff"></i></a>

                                            <a href="product.php?delete= <?php echo $result['id']; ?>" class="btn" style="background-color: #212121;"
                                                onclick="return confirm('Are you sure to delete the category?')">
                                                <i class="fa-solid fa-trash" style="color: #ffffff"></i></a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }

                            if (isset($_GET['delete'])) {
                                $id = $_GET['delete'];

                                $queryShow = "SELECT * FROM product WHERE id = '$id'; ";
                                $sqlShow = mysqli_query($conn, $queryShow);
                                $result = mysqli_fetch_assoc($sqlShow);

                                unlink("../img/" . $result['image']);
                                    
                                $queryDelete = "DELETE FROM product WHERE id = '$id'";
                                $sqlDelete = mysqli_query($conn, $queryDelete);
                            
                                if ($sqlDelete) {
                                    ?>
                                    <meta http-equiv="refresh" content="0; url=product.php">
                                    <?php
                                } else {
                                    echo mysqli_error($conn);
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>
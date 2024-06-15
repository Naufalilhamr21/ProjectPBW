<?php
    require "../login/session.php";
    require "../conn.php";

    $queryCategory = "SELECT * FROM category";
    $sqlCategory = mysqli_query($conn, $queryCategory);

    // Generate name file to random name
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Icon -->
    <link rel="icon" type="image" href="img/iconFps.png">

    <!-- Title -->
    <title>Add Products</title>

    <!-- Link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Script JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Main -->
    <div class="main d-flex flex-column justify-content-center align-items-center">

        <div class="container p-3 m-4" style="width: 600px; border-radius: 20px;">
            <div class="card shadow mb-3">
                <img src="img/fps-bg.png" class="card-img-top" alt="...">

                <div class="card-body">
                    <div class="p-3">
                        <h4 class="my-2 mb-4">Add New Products</h4>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $id;?>" name="id">

                            <!-- Input Product -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Product</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter product" autocomplete="off">
                            </div>

                            <!-- Select Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select id="category" name="category" class="form-control">
                                    <option value="">Choose category</option>
                                    <?php
                                    while ($data = mysqli_fetch_array($sqlCategory)) {
                                    ?>
                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['Brand']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Input Price -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
                            </div>

                            <!-- Input Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <!-- Input Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>

                            <!-- Select Availibility -->
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <select id="stock" name="stock" class="form-control">
                                    <option value="Available">Available</option>
                                    <option value="Non Available">Non Available</option>
                                </select>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success mt-2" name="add" value="add" onclick="return confirm('Are you sure to add this category?')">Add</button>

                                <a href="product.php" class="btn btn-danger mx-2 mt-2">Cancel</a>
                            </div>
                        </form>

                        <?php
                            if (isset($_POST['add'])){ 
                                $name = $_POST['name'];
                                $category = $_POST['category'];
                                $price = $_POST['price'];
                                $description = $_POST['description'];
                                $stock = $_POST['stock'];

                                $target_dir = "../img/";
                                $fileName = basename($_FILES["image"]["name"]);
                                $targetFile = $target_dir . $fileName;
                                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                                $image_size = $_FILES["image"]["size"];
                                $randomName = generateRandomString(20);
                                $newName = $randomName . "." . $imageFileType;

                                if ($name == '' || $category == '' || $price == '') {
                                    ?>
                                    <div class="alert alert-warning mt-3" role="alert">Please fill out the field</div>
                                    <?php
                                } else {
                                    if ($fileName != '') {
                                        if ($image_size > 3000000) {
                                            ?>
                                            <div class="alert alert-warning mt-3 mb-0" role="alert">File size is too large</div>
                                            <?php
                                        } else {
                                            if ($imageFileType != 'jpg' && $imageFileType != 'png') {
                                                ?>
                                                <div class="alert alert-warning mt-3 mb-0" role="alert">Wrong file format</div>
                                                <?php
                                            } else { 
                                                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $newName);
                                            }
                                        }
                                    }

                                    // Add Product
                                    $queryAdd = $queryAdd = "INSERT INTO product (categoryId, name, price, image, description, stock) VALUES ('$category', '$name', '$price', '$newName', '$description', '$stock')";
                                    $sqlAdd = mysqli_query($conn, $queryAdd);

                                    if ($sqlAdd) { 
                                        ?>
                                        <meta http-equiv="refresh" content="0; url=product.php">
                                        <?php
                                    } else {
                                        echo mysqli_error($conn);
                                    }
                                }
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
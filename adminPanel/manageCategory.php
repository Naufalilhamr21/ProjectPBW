<?php
    require "../login/session.php";
    require "../conn.php";

    $id = '';
    $Brand = '';
    
    if (isset($_GET['edit'])){
        $id = $_GET['edit'];

        $query = "SELECT * FROM category WHERE id = '$id'";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $Brand = $result['Brand'];
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
    <title>Manage Categories</title>

    <!-- Link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Script JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Main -->
    <div class="main d-flex flex-column justify-content-center align-items-center">

        <div class="container p-3 m-4" style="width: 650px; border-radius: 20px; box-sizing: border-box;">
            <div class="card shadow mb-3">
                <img src="img/fps-bg.png" class="card-img-top" alt="...">

                <div class="card-body">
                    <div class="p-3">
                        <h4 class="my-2 mb-4">Manage Categories</h4>

                        <form action="" method="POST">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <div class="mb-3">
                                <label for="Brand" class="form-label">Category</label>
                                <input type="text" class="form-control" name="Brand" id="Brand" placeholder="Enter brand" autocomplete="off" required value="<?php echo $Brand;?>">
                            </div>

                            <div>
                                <?php 
                                    if (isset($_GET['edit'])){
                                ?>
                                        <button type="submit" class="btn btn-success mt-2" name="act" value="edit" onclick="return confirm('Are you sure to change this category?')">Save changes</button>
                                <?php
                                    } else {
                                ?>
                                        <button type="submit" class="btn btn-success mt-2" name="act" value="add" onclick="return confirm('Are you sure to add this category?')">Add</button>
                                <?php
                                    }
                                ?>
                                <a href="category.php" class="btn btn-danger mx-2 mt-2">Cancel</a>
                            </div>
                        </form>

                        <?php
                            if (isset($_POST['act'])) {
                                if ($_POST['act'] == "add") {
                                    $Brand = $_POST['Brand'];

                                    $queryExist = "SELECT * FROM category where Brand = '$Brand'";
                                    $sqlExist = mysqli_query($conn, $queryExist);

                                    $total = mysqli_num_rows($sqlExist);

                                    if ($total > 0) {
                                        ?> 
                                            <div class="alert alert-warning mt-3 mb-0" role="alert">Category already exist</div>
                                        <?php
                                    } else {
                                        $query = "INSERT INTO category VALUES(null, '$Brand')";
                                        $sql = mysqli_query($conn, $query);

                                        if ($sql) {
                                            ?>
                                                <meta http-equiv="refresh" content="0; url=category.php">
                                            <?php
                                        } else {
                                            echo $query;
                                        }
                                    }

                                } else if ($_POST['act'] == "edit") {

                                        $id = $_POST['id'];
                                        $Brand = $_POST['Brand'];

                                        $queryExist = "SELECT * FROM category where Brand = '$Brand'";
                                        $sqlExist = mysqli_query($conn, $queryExist);

                                        $total = mysqli_num_rows($sqlExist);

                                        if ($total > 0) {
                                        ?> 
                                            <div class="alert alert-warning mt-3 mb-0" role="alert">Category already exist</div>
                                        <?php
                                        } else {
                                            $query = "UPDATE category SET Brand = '$Brand' WHERE id = '$id';";
                                            $sql = mysqli_query($conn, $query);
                                    
                                            if ($sql) {
                                            ?>
                                                <meta http-equiv="refresh" content="0; url=category.php">
                                            <?php
                                        } else {
                                            echo "Error: " . mysqli_error($conn);
                                        }
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
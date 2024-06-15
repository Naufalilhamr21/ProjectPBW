<?php
require "../conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Icon -->
    <link rel="icon" type="image" href="img/iconFps.png">

    <!-- Title -->
    <title>Register</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <!-- Main -->
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="container p-3 m-4">
            <div class="card shadow mb-3">
                <img src="img/fps-bg.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="p-3">
                        <h4 class="card-title mb-4">Register</h4>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>

                            <button type="submit" class="form-control btn text-white mt-2" name="register">REGISTER</button>

                            <p class="login">Already have an account? <a class="login" href="login.php"><b>Login</b></a></p>
                        </form>

                        <?php
                        if (isset($_POST['register'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                        
                            $ePassword = password_hash($password, PASSWORD_DEFAULT);
                        
                            $queryInsert = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$ePassword')");
                        
                            if ($queryInsert) {
                                header('location: login.php');
                            } else {
                        ?> 
                                <div class="alert alert-danger" role="alert">Registration Failed</div>
                        <?php
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
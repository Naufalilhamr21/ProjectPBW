<?php
session_start();
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
    <title>Login</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Script JS -->
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
                        <h4 class="card-title mb-4">Login</h4>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>

                            <button type="submit" class="form-control btn text-white mt-2" name="login">LOGIN</button>

                            <p class="signUp">Don't have an account? <a class="signUp" href="register.php"><b>Register</b></a></p>
                        </form>

                        <?php
                        if (isset($_POST['login'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                    
                            $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
                            $count = mysqli_num_rows($query);
                            $data = mysqli_fetch_array($query);
                    
                            if ($count > 0) {
                                if ($data && isset($data['password']) && password_verify($password, $data['password']) && ($data['usertype'] == "admin")) {
                                    $_SESSION["username"] = $data['username'];
                                    $_SESSION["login"] = true;
                                    header("location: ../adminPanel/adminHome.php");
                                } else if ($data && isset($data['password']) && password_verify($password, $data['password']) && ($data['usertype'] == "user")) {
                                    $_SESSION["username"] = $data['username'];
                                    $_SESSION["login"] = true;
                                    header("location: ../userPanel/userHome.php");
                                } else {
                                    // Incorrect Password
                        ?> 
                                <div class="alert alert-danger mt-3" role="alert" style="margin-bottom: -5px">Incorrect Password</div>
                        <?php
                                }
                            } else {
                        ?> 
                                <div class="alert alert-danger mt-3" role="alert" style="margin-bottom: -5px">Account not available</div>
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
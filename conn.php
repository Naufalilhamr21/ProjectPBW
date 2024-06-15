<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'fps';

    $conn = mysqli_connect($host, $user, $pass, $db);

    // Check Connection
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
      }
?>
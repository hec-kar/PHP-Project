<?php
    //ob_start();
    // connect DB
    $servername = "localhost";
    $username = "root";
    $password = "";
    $schema = "users_schema";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // select the right database
    mysqli_select_db($conn, $schema);

    echo "Connected successfully" . "<br>";
    
    include "layout.php";
    include "functions.php";

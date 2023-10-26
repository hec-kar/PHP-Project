<?php
    //ob_start();
    // connect DB
    $servername = "localhost";
    $username = "root"; // root
    $password = "";
    $schema = "users_schema"; //users_schema

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // select the right database
    mysqli_select_db($conn, $schema);
    // var_export($conn);
    // echo "Connected successfully" . "<br>";
    
    // include "layout.php";
    // include "functions.php";
   
?>
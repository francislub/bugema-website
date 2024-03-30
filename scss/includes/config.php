<?php
    // Assuming you have already established a MySQLi connection
    $servername = "localhost"; // Change this if your database is hosted on a different server
    $username = "bugerifg_adminapply";
    $password = "AdminApply@2023.";
    $dbname = "bugerifg_site";

    // Create a new MySQLi connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
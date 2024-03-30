<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $director = $_POST["director"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $location = $_POST["location"];

    // Process Campus Photo upload
    $campusPhotoPath = "";
    if ($_FILES["campusphoto"]["error"] == UPLOAD_ERR_OK) {
        $tempName = $_FILES["campusphoto"]["tmp_name"];
        $fileName = $_FILES["campusphoto"]["name"];
        $campusPhotoPath = "campus/" . $fileName;
        move_uploaded_file($tempName, $campusPhotoPath);
    }

    // Process Director's Photo upload
    $directorPhotoPath = "";
    if ($_FILES["directorphoto"]["error"] == UPLOAD_ERR_OK) {
        $tempName = $_FILES["directorphoto"]["tmp_name"];
        $fileName = $_FILES["directorphoto"]["name"];
        $directorPhotoPath = "campus/" . $fileName;
        move_uploaded_file($tempName, $directorPhotoPath);
    }
    $new = "includes/" . $campusPhotoPath;
    $newp = "includes/" . $directorPhotoPath;
    // Prepare the INSERT statement
    $sql = "INSERT INTO campus (name, director, number, email, location, campus_photo, director_photo) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $director, $number, $email, $location, $new, $newp);

    // Execute the INSERT statement
    if ($stmt->execute()) {
        // Record inserted successfully
        $successMessage = "Campus added successfully.";
        header("Location: ../campus.php?status=success&message=" . urlencode($successMessage));
        exit();
    } else {
        // Error inserting record
        $errorMessage = "Error adding the campus: " . $stmt->error;
        header("Location: ../campus.php?status=error&message=" . urlencode($errorMessage));
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<?php

require_once 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department = $_POST["department"];
    $school = $_POST["school"];
    $overview = $_POST["overview"];
    
    // Process the uploaded photo
    //$photoPath = null;
    $photo = $_FILES["photo"];
    $photoName = $photo["name"];
    $photoTmpName = $photo["tmp_name"];
    $photoError = $photo["error"];

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
        $photoName = $_FILES["photo"]["name"];
        $photoTmp = $_FILES["photo"]["tmp_name"];
        $photoPath = "department/" . $photoName;
        move_uploaded_file($photoTmp, $photoPath);
    }
    $newpath = "includes/" . $photoPath;
    // Prepare the INSERT statement
    $sql = "INSERT INTO department (department, school, overview, photo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $department, $school, $overview, $newpath);

    // Execute the INSERT statement
    if ($stmt->execute()) {
        // Record inserted successfully
        $successMessage = "Department added successfully.";
        header("Location: ../department.php?status=success&message=" . urlencode($successMessage));
        exit();
    } else {
        // Error inserting record
        $errorMessage = "Error adding the department: " . $stmt->error;
        header("Location: ../department.php?status=error&message=" . urlencode($errorMessage));
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

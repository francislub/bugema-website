<?php

require_once 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $preamble = $_POST["preamble"];
    $goal = $_POST["goal"];
    $dean = $_POST["dean"];
    $message = $_POST["message"];

    // Handle the photo file upload for school photo
    $photo = $_FILES["photo"];
    $photoName = $photo["name"];
    $photoTmpName = $photo["tmp_name"];
    $photoError = $photo["error"];

    // Handle the photo file upload for dean's column
    $deanPhoto = $_FILES["deanPhoto"];
    $deanPhotoName = $deanPhoto["name"];
    $deanPhotoTmpName = $deanPhoto["tmp_name"];
    $deanPhotoError = $deanPhoto["error"];

    // Check if files were uploaded without any error
    if ($photoError === UPLOAD_ERR_OK && $deanPhotoError === UPLOAD_ERR_OK) {
        // Specify the upload directory
        $uploadDir = "school/";

        // Generate unique file names to avoid collisions
        $photoFileName = uniqid() . '_' . $photoName;
        $deanPhotoFileName = uniqid() . '_' . $deanPhotoName;

        // Move the uploaded files to the desired locations
        $photoDestination = $uploadDir . $photoFileName;
        $deanPhotoDestination = $uploadDir . $deanPhotoFileName;

        if (move_uploaded_file($photoTmpName, $photoDestination) && move_uploaded_file($deanPhotoTmpName, $deanPhotoDestination)) {
            // File uploads successful
            $schoolPhotoPath = "includes/" . $photoDestination;
            $deanPhotoPath = "includes/" . $deanPhotoDestination;

            // Assuming you have established a database connection and stored it in the $conn variable

            // Prepare the INSERT statement
            $sql = "INSERT INTO school (name, preamble, goal, photo, dean, deans, message) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $name, $preamble, $goal, $schoolPhotoPath, $dean, $deanPhotoPath, $message);

            // Execute the INSERT statement
            if ($stmt->execute()) {
                // Record inserted successfully
                $successMessage = "Record inserted successfully.";
                // Redirect to the page displaying the table with the inserted record
                header("Location: ../school.php?status=success&message=" . urlencode($successMessage));
                exit();
            } else {
                // Error inserting record
                $errorMessage = "Error inserting record: " . $stmt->error;
                // Redirect back to the form page with an error message
                header("Location: ../school.php?status=error&message=" . urlencode($errorMessage));
                exit();
            }

            // Close the statement
            $stmt->close();
        } else {
            // Error moving uploaded files
            $errorMessage = "Error moving uploaded files.";
            // Redirect back to the form page with an error message
            header("Location: ../school.php?status=error&message=" . urlencode($errorMessage));
            exit();
        }
    } else {
        // Error uploading files
        $errorMessage = "Error uploading files.";
        // Redirect back to the form page with an error message
        header("Location: ../school.php?status=error&message=" . urlencode($errorMessage));
        exit();
    }
}

// Close the database connection
$conn->close();
?>

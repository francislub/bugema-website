<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have established a database connection and stored it in the $conn variable
    
    $photo = $_FILES['photo'];
    $title = $_POST['title'];
    $tagline = $_POST['tagline'];
    
    // Check if a file was uploaded
    if ($photo['error'] === UPLOAD_ERR_OK) {
        $photoName = $photo['name'];
        $photoTmpName = $photo['tmp_name'];
        
        // Move the uploaded file to a desired location
        $photoDestination = 'slides/' . $photoName;
        move_uploaded_file($photoTmpName, $photoDestination);
        $new_path = "includes/" . $photoDestination;

        // Insert the data into the database
        $sql = "INSERT INTO slides (photo, title, tagline) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $new_path, $title, $tagline);
        
        if ($stmt->execute()) {
            // Record inserted successfully
            $successMessage = "Record inserted successfully.";
            // Redirect to the page displaying the table with the inserted record
            header("Location: ../slide.php?status=success&message=" . urlencode($successMessage));
        } else {
            // Error inserting data
            echo "Error inserting data: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        // Error uploading file
        echo "Error uploading file: " . $photo['error'];
    }
    
    $conn->close();
}
?>

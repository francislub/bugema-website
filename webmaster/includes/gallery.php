<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once 'config.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'config.php';
    
    // Get the form data
    $name = $_POST["name"];
    $category = $_POST["category"];
    $tag = $_POST["tag"];
    
    // Handle the photo file upload
    $photo = $_FILES["photo"];
    $photoName = $photo["name"];
    $photoTmpName = $photo["tmp_name"];
    $photoError = $photo["error"];

    // Check if a file was uploaded without any error
    if ($photoError === UPLOAD_ERR_OK) {
        // Specify the upload directory
        $uploadDir = "gallery/";

        // Generate a unique file name to avoid collisions
        $photoFileName = uniqid() . '_' . $photoName;

        // Move the uploaded file to the desired location
        $photoDestination = $uploadDir . $photoFileName;
        if (move_uploaded_file($photoTmpName, $photoDestination)) {
            // File upload successful
            $new_path = "includes/" . $photoDestination;

            // Assuming you have established a database connection and stored it in the $conn variable

            // Prepare the INSERT statement
            $sql = "INSERT INTO gallery (name, category, tag, photo) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $category, $tag, $new_path);

            // Execute the INSERT statement
            if ($stmt->execute()) {
                // Record inserted successfully
                $successMessage = "Record inserted successfully.";
                // Redirect to the page displaying the table with the inserted record
                header("Location: ../gallery.php?status=success&message=" . urlencode($successMessage));
                exit();
            } else {
                // Error inserting record
                $errorMessage = "Error inserting record: " . $stmt->error;
                // Redirect back to the form page with an error message
                header("Location: ../gallery.php?status=error&message=" . urlencode($errorMessage));
                exit();
            }

            // Close the statement
            $stmt->close();
        } else {
            // Error moving uploaded file
            $errorMessage = "Error moving uploaded file.";
            // Redirect back to the form page with an error message
            header("Location: ../gallery.php?status=error&message=" . urlencode($errorMessage));
            exit();
        }
    } else {
        // Error uploading file
        $errorMessage = "Error uploading file: " . $photoError;
        // Redirect back to the form page with an error message
        header("Location: ../gallery.php?status=error&message=" . urlencode($errorMessage));
        exit();
    }
}

// Close the database connection
$conn->close();
?>

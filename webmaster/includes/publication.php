<?php
// Assuming you have a database connection established
require_once 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the input data
    $name = $_POST['name'] ?? '';
    $title = $_POST['title'] ?? '';

    // Upload photo
    $photoFileName = '';
    if ($_FILES['photo']['size'] > 0) {
        $photoFileName = 'publication_' . time() . '_' . $_FILES['photo']['name'];
        $photoFilePath = 'publication/' . $photoFileName;
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoFilePath);
    }

    // Upload document
    $documentFileName = '';
    if ($_FILES['document']['size'] > 0) {
        $documentFileName = 'publication_' . time() . '_' . $_FILES['document']['name'];
        $documentFilePath = 'publication/' . $documentFileName;
        move_uploaded_file($_FILES['document']['tmp_name'], $documentFilePath);
    }
    $new_path = "includes/" . $documentFilePath;
    $new = "includes/" . $photoFilePath;
    // Prepare and execute the SQL statement to insert the publication
    $sql = 'INSERT INTO publications (name, title, photo, document) VALUES (?, ?, ?, ?)';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $title, $new, $new_path);
    mysqli_stmt_execute($stmt);

    // Check if the publication is inserted successfully
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Record inserted successfully
        $successMessage = "Record inserted successfully.";
        // Redirect to the page displaying the table with the inserted record
        header("Location: ../publication.php?status=success&message=" . urlencode($successMessage));
        exit();
    } else {
        // Error inserting record
        $errorMessage = "Error inserting record: " . $stmt->error;
        // Redirect back to the form page with an error message
        header("Location: ../publication.php?status=error&message=" . urlencode($errorMessage));
        exit();
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

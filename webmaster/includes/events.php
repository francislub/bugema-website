<?php
    require_once 'config.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST["title"];
    $description = $_POST["description"];
    $date = $_POST["date"];

    // Prepare the INSERT statement
    $sql = "INSERT INTO event (name, description, date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $description, $date);

    // Execute the INSERT statement
    if ($stmt->execute()) {
        // Record inserted successfully
        $successMessage = "Event added successfully.";
        header("Location: ../event.php?status=success&message=" . urlencode($successMessage));
        exit();
    } else {
        // Error inserting record
        $errorMessage = "Error in adding the event: " . $stmt->error;
        header("Location: event.php?status=error&message=" . urlencode($errorMessage));
        exit();
    }
    

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
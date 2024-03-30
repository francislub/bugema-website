<?php
require_once 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["record_id"])) {
    $record_id = $_POST["record_id"];

    // Prepare the DELETE statement
    $sql = "DELETE FROM event WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $record_id);

    // Execute the DELETE statement
    if ($stmt->execute()) {
        // Record deleted successfully
        $successMessage = "Event deleted successfully.";
        header("Location: event.php?status=success&message=" . urlencode($successMessage));
        exit();
    } else {
        // Error deleting record
        $errorMessage = "Error deleting the event: " . $stmt->error;
        header("Location: event.php?status=error&message=" . urlencode($errorMessage));
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

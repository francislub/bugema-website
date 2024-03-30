<?php
require_once 'config.php';

// Assuming you have established a database connection and stored it in the $conn variable

  // Get the course id from the URL
  $id = $_GET['id'];
   // Delete the course from the database
   $sql = "DELETE FROM event WHERE id = $id";

   if ($conn->query($sql) === TRUE) {
     // Redirect back to the course.php page
     header("Location: ../event.php");
     exit;
   } else {
     echo "Error deleting record: " . $conn->error;
   }

// Close the database connection
$conn->close();
?>

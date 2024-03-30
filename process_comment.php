<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate and sanitize the input data
  $author = $_POST['author'] ?? '';
  $email = $_POST['email'] ?? '';
  $comment = $_POST['comment'] ?? '';
  $post_id = $_POST['post_id'] ?? '';

  // Validate the required fields
  if (empty($author) || empty($email) || empty($comment) || empty($post_id)) {
    // Handle the validation error
    echo 'Please fill in all the required fields.';
    exit;
  }

  // Database connection
  require_once 'includes/config.php';

  // Prepare and execute the SQL statement to insert the comment
  $sql = 'INSERT INTO comments (post_id, name, email, comment) VALUES (?, ?, ?, ?)';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('isss', $post_id, $author, $email, $comment);
  $stmt->execute();

  // Check if the comment is inserted successfully
  if ($stmt->affected_rows > 0) {
    // Redirect to the news.php page with the appropriate id parameter
    header("Location: news.php?id=$post_id");
    exit;
  } else {
    echo 'Error occurred while posting the comment.';
  }

  // Close the statement and database connection
  $stmt->close();
  $conn->close();
} else {
  // Handle the case when the form is not submitted
  echo 'Invalid request.';
}
?>

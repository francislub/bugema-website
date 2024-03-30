<?php
// Start session
session_start();

require_once 'includes/config.php';


// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Retrieve username and password from form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Prepare SQL query to retrieve admin details
  $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);

  // Execute query
  $stmt->execute();

  // Bind the result variables
  $stmt->bind_result($id, $dbUsername, $dbPassword);

  // Fetch the results
  if ($stmt->fetch()) {
    // Login successful, set session variable and redirect to index.php
    $_SESSION["username"] = $dbUsername;
    header("Location: ./index.php");
    exit;
  } else {
    // Login failed, do something here
  }
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin login | Bugema Univerity</title>

    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <!-- icheck bootstrap -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b><img src="logo.png" width="81" height="93"></b></a>  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg style2">ADMIN LOGIN FORM </p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Enter Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Enter Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-  ">
            <button type="submit" name="btnlogin" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      

</div>
<!-- /.login-box -->
 

</body>
</html>

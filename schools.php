<?php
require_once 'header.php';
require_once 'navbar.php';

?>
<br><br><br><br><br>

<?php
// Assuming you have a database connection established using PDO
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Fetch all information from the "school" table based on the ID
  $query = "SELECT * FROM school WHERE id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row) {
    $deanName = $row['dean'];
    $deanPhoto = $row['deans'];
    $deanMessage = $row['message'];
    $preamble = $row['preamble'];
    $goal = $row['goal'];
    $school = $row['name'];
    // Retrieve other columns as needed
  }

} else {
  // Handle the case where no ID is provided
  // You can redirect the user or display an error message
}
?>

<div class="container-fluid bg-primary" style="background: url(webmaster/<?php echo $row['photo']; ?>); background-position: center center; background-repeat: no-repeat; background-size: cover; height: 500px; width: 100%;">
  <div class="container">
  </div>
</div>

<section id="mu-about-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-about-us-area">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="mu-abou-us-left">
                <!-- Start Title -->
                <div class="mu-title">
                  <h2>Dean</h2>
                </div>
                <p><?php echo $deanName; ?></p>
                <!-- End Title -->
                <img src="webmaster/<?php echo $deanPhoto; ?>" alt="Dean Photo" width="300px" height="300">
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="mu-about-us-right">
                <div class="mu-title">
                  <h2>Message</h2>
                </div>
                <p><?php echo $deanMessage; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="mu-about-us-area">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="mu-abou-us-left">
                <!-- Start Title -->
                <div class="mu-title">
                  <h2>Preamble</h2>
                </div>
                <!-- End Title -->
                <p><?php echo $preamble; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="mu-about-us-area">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="mu-abou-us-left">
                <!-- Start Title -->
                <div class="mu-title">
                  <h2>Goal</h2>
                </div>
                <!-- End Title -->
                <p><?php echo $goal; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="mu-about-us-area">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="mu-abou-us-left">
                <!-- Start Title -->
                <div class="mu-title">
                  <h2>Departments</h2>
                </div>
                <!-- End Title -->
                <p>
                  <div id="navbar" class="navbar-collapse">
                    <ul id="top-menu" class="nav navbar-nav navbar-left main-nav">
                      <?php
                      // Assuming you have a database connection established using PDO
                      $query = "SELECT id, department FROM department WHERE school = ?";
                      $stmt = $pdo->prepare($query);
                      $stmt->execute([$id]);
                      $departmentResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      foreach ($departmentResult as $departmentRow) {
                        $departmentId = $departmentRow['id'];
                        $departmentName = $departmentRow['department'];
                        echo '<li><a href="department.php?id=' . $departmentId . '" class="apply-button text-center">' . $departmentName . '</a></li><br><br><br>';
                      }
                      ?>
                    </ul>
                  </div>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once 'footer.php';
?>


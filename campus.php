<?php
require_once 'header.php';
require_once 'navbar.php';
?>
<br><br><br><br><br>
<?php
// Assuming you have a database connection established using PDO
// Get the ID from the URL
$id = $_GET['id'];

// Query the campus table to retrieve information based on the ID
$query = "SELECT * FROM campus WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch the campus information
if ($row) {
    $name = $row['name'];
    $director = $row['director'];
    $number = $row['number'];
    $email = $row['email'];
    $location = $row['location'];
    $campus_photo = $row['campus_photo'];
    $director_photo = $row['director_photo'];

    // Display the retrieved information in the HTML template
    echo '<div class="container-fluid bg-primary" style="background: url(webmaster/' . $row['campus_photo'] . '); background-position: center center; background-repeat: no-repeat; background-size: cover; height: 500px;">

            <div class="container">
            </div>
          </div>
          <section id="mu-about-us">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="mu-about-us-area">
                    <div class="mu-title">
                      <h2>' . $name . '</h2>              
                    </div><br><br>    
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="mu-abou-us-left">
                          <!-- Start Title -->
                          <div class="mu-title">
                            <h2>Director</h2>              
                          </div>
                          <!-- End Title -->
                          <p>' . $director . '</p>
                          <img src="webmaster/' . $director_photo . '" alt="Director Photo" width="300px" height="300">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="mu-about-us-right">                            
                          <div class="mu-title">
                            <h2>Contacts</h2>              
                          </div>
                          <p>Phone: ' . $number . '</p>
                          <p>Email: ' . $email . '</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div><br><br>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="mu-about-us-area">           
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="mu-abou-us-left">
                          <!-- Start Title -->
                          <div class="mu-title">
                            <h2>Location</h2>              
                          </div>
                          <!-- End Title -->
                          <iframe src="' . $location . '" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>';
}
?>
<?php
require_once 'footer.php';
?>

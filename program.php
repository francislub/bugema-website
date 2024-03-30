<?php
require_once 'header.php';
require_once 'navbar.php';
?>
<br><br><br><br><br>
<?php
// Assuming you have a database connection established using PDO
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the information of the given ID from the "program" table
    $query = "SELECT * FROM programs WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $overview = $row['overview'];
        $duration = $row['duration'];
        $entryRequirements = $row['requirements'];
        // Retrieve other columns as needed
    }
} else {
    // Handle the case where no ID is provided
    // You can redirect the user or display an error message
}
?>

<div class="container-fluid bg-primary" style="background: url(webmaster/<?php echo $row['photo']; ?>); background-position: center center; background-repeat: no-repeat; background-size: cover; height: 500px;">
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
                                    <h2>Overview</h2>              
                                </div>
                                <!-- End Title -->
                                <p><?php echo $overview; ?></p>
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
                                    <h2>Duration</h2>              
                                </div>
                                <!-- End Title -->
                                <p><?php echo $duration; ?></p>
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
                                    <h2>Entry Requirements</h2>              
                                </div>
                                <!-- End Title -->
                                <p><?php echo $entryRequirements; ?></p>
                                <br>
                                <p>
                                    <div id="navbar" class="navbar-collapse">
                                        <ul id="top-menu" class="nav navbar-nav navbar-left main-nav">
                                            <li><a href="https://apply.bugemauniv.ac.ug/" target="_blank" class="apply-button text-center">Apply Now</a></li>
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

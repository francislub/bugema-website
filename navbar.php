<!-- Start header  -->
<header id="mu-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>info@bugemauniv.ac.ug</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>+256 - 312 351 400</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="https://www.facebook.com/bugemauniv.ac.ug" target="_blank"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="https://twitter.com/UnivBugema" target="_blank"><span class="fa fa-twitter"></span></a></li>
                      <li><a href=https://api.whatsapp.com/send?phone=256773408090&text=Hello" target="_blank"><span class="fa fa-whatsapp"></span></a></li>
                      <li><a href="https://www.linkedin.com/school/bugema-university/" target="_blank"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="https://www.youtube.com/channel/UCS_rf3JZ95_0sTI42N2xP9Q" target="_blank"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container-fluid">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand" href="index.php"><img src="assets/img/logo_result.webp" alt="logo"><span>Bugema University</span></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo_result.webp" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
  <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
    <li <?php echo ($_SERVER['PHP_SELF'] == '/index.php') ? 'class="active"' : ''; ?>><a href="index.php">HOME</a></li>   
    <li <?php echo ($_SERVER['PHP_SELF'] == '/about.php') ? 'class="active"' : ''; ?>><a href="about.php">ABOUT US</a></li>
    <li <?php echo ($_SERVER['PHP_SELF'] == '/gallery.php') ? 'class="active"' : ''; ?>><a href="gallery.php">Gallery</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">CAMPUSES<span class="fa fa-angle-down"></span></a>
      <ul class="dropdown-menu" role="menu">
        <?php
        // Assuming you have a database connection established
        $query = "SELECT id, name FROM campus";
        $result = mysqli_query($conn, $query);

        // Loop through the query results and generate the list items
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $name = $row['name'];
          $url = "campus.php?id=" . $id; // Assuming you want to pass the ID as a query parameter

          echo '<li><a href="' . $url . '" ' . ($_SERVER['PHP_SELF'] == '/campus.php?id=' . $id ? 'class="active"' : '') . '>' . $name . '</a></li>';
        }

        // Free the result set
        mysqli_free_result($result);
        ?>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">ACADEMICS<span class="fa fa-angle-down"></span></a>
      <ul class="dropdown-menu" role="menu">
        <?php
        // Assuming you have a database connection established
        $query = "SELECT id, name FROM school";
        $result = mysqli_query($conn, $query);

        // Loop through the query results and generate the list items
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $name = $row['name'];
          $url = "schools.php?id=" . $id; // Assuming you want to pass the ID as a query parameter

          echo '<li><a href="' . $url . '" ' . ($_SERVER['PHP_SELF'] == '/schools.php?id=' . $id ? 'class="active"' : '') . '>' . $name . '</a></li>';
        }

        // Free the result set
        mysqli_free_result($result);
        ?>
      </ul>
    </li>
    <li <?php echo ($_SERVER['PHP_SELF'] == '/publication.php') ? 'class="active"' : ''; ?>><a href="publication.php">Publication</a></li>
    <li <?php echo ($_SERVER['PHP_SELF'] == '/contact.php') ? 'class="active"' : ''; ?>><a href="contact.php">Contact</a></li>
    <li><a href="https://apply.bugemauniv.ac.ug/" target="_blank" class="apply-button">APPLY TODAY</a></li>               
    <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
  </ul>                     
</div><!--/.nav-collapse -->
      
      </div>     
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->

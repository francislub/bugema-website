<?php
    require_once 'header.php';
    require_once 'navbar.php';
?>
     <!-- Start gallery  -->
 <section id="mu-gallery">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-gallery-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>Campus Life</h2>
          </div>
          <!-- end title -->
          <!-- start gallery content -->
          <div class="mu-gallery-content">
            <!-- Start gallery menu -->
            <div class="mu-gallery-top">              
                <ul>
                <li class="filter active" data-filter="all">All</li>
                <?php
                // Retrieve unique categories from the gallery table
                $sql = "SELECT DISTINCT category FROM gallery";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    $category = $row['category'];
                    echo '<li class="filter" data-filter=".' . $category . '">' . $category . '</li>';
                    }
                }
                ?>
                </ul>
            </div>
            <!-- End gallery menu -->
            <div class="mu-gallery-body">
                <ul id="mixit-container" class="row">
                <?php
                // Retrieve gallery images from the database
                $sql = "SELECT * FROM gallery";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    $title = $row['name'];
                    $category = $row['category'];
                    $tag = $row['tag'];
                    $imagePath = $row['photo'];
                    echo '<li class="col-md-4 col-sm-6 col-xs-12 mix ' . $category . '">';
                    echo '<div class="mu-single-gallery">';
                    echo '<div class="mu-single-gallery-item">';
                    echo '<div class="mu-single-gallery-img">';
                    echo '<a href="#"><img alt="img" src="webmaster/' . $imagePath . '"></a>';
                    echo '</div>';
                    echo '<div class="mu-single-gallery-info">';
                    echo '<div class="mu-single-gallery-info-inner">';
                    echo '<h4>' . $title . '</h4>';
                    echo '<p>' . $tag . '</p>';
                    echo '<a href="webmaster/' . $imagePath . '" data-fancybox-group="gallery" class="fancybox"><span class="fa fa-eye"></span></a>';
                    echo '<a href="#" class="aa-link"><span class="fa fa-link"></span></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</li>';
                    }
                }
                ?>
                </ul>            
            </div>
            </div>

          <!-- end gallery content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End gallery  -->

<?php
    require_once 'footer.php';
?>
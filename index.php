<?php
    require_once 'header.php';
    require_once 'navbar.php';
?>

      <!-- Start Slider -->
  <section id="mu-slider">
  <?php
    // Assuming you have established a database connection and stored it in the $conn variable
    
    // Retrieve data from the database
    $sql = "SELECT * FROM slides";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $photo = $row['photo'];
            $title = $row['title'];
            $content = $row['tagline'];
            
            echo '<div class="mu-slider-single">';
            echo '<div class="mu-slider-img">';
            echo '<figure>';
            echo '<img src="webmaster/' . $photo . '" alt="img">';
            echo '</figure>';
            echo '</div>';
            echo '<div class="mu-slider-content">';
            echo '<h2>' . $title . '</h2>';
            echo '<p>' . $content . '</p>';
            echo '<a href="https://apply.bugemauniv.ac.ug/" target="_blank" class="mu-read-more-btn">APPLY NOW</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="mu-slider-single">';
        echo '<div class="mu-slider-img">';
        echo '<figure>';
        echo '<img src="assets/img/elearning2.jpg" alt="img">';
        echo '</figure>';
        echo '</div>';
        echo '<div class="mu-slider-content">';
        echo '<h2>Want to join University?</h2>';
        echo '<p></p>';
        echo '<a href="https://apply.bugemauniv.ac.ug/" target="_blank" class="mu-read-more-btn">APPLY NOW</a>';
        echo '</div>';
        echo '</div>';
    }
    
    ?>
  </section>
  <!-- End Slider -->
  <!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-book"></span>
              <h3>Blended Learning</h3>
              <p>Blended learning is an innovative approach to education that combines traditional face-to-face instruction with online learning components. </p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-users"></span>
              <h3>Mission</h3>
              <p>Offering an excellent and distinctive wholistic christian education designed to prepare our students through training for productive lives of useful service to God.</p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-table"></span>
              <h3>Philosophy</h3>
              <p>The belief that true education fosters the restoration of the lost image of God in human beings through the harmonious development of the dimensions of life.</p>
            </div>
            <!-- Start single service -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>About Us</h2>              
                  </div>
                  <!-- End Title -->
                  <p>At Bugema University, we understand the importance of quality assurance. We have developed comprehensive self-regulating and self-maintaining procedures to ensure the highest standards of excellence in academic delivery and performance.
                  </p>
                  <p>Join us at Bugema University, where education is embraced as a catalyst for empowerment and change. Experience an inclusive and enriching learning environment where equal opportunities, academic excellence, and a commitment to students' success define our core values. Together, we can shape a brighter future through education.</p>
                  <div class="mu-blog-description">
                    <a style="border-color: #555; color: #555; font-size: 14px; margin-top: 15px;" href="about.php" class="mu-read-more-btn">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-right">                            
                  <a id="mu-abtus-video" href="https://www.youtube.com/watch?v=uadddadon-M" target="mutube-video">
                    <iframe width="100%" height="370" src="https://www.youtube.com/embed/uadddadon-M" frameborder="0" allowfullscreen></iframe>
                  </a>                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->

  <!-- Start about us counter -->
  <section id="mu-abtus-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-abtus-counter-area">
            <div class="row">
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-book"></span>
                  <h4 class="counter">73</h4>
                  <p>Accredited Courses</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-users"></span>
                  <h4 class="counter">2000</h4>
                  <p>Students</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-university"></span>
                  <h4 class="counter">5</h4>
                  <p>Campuses</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single no-border">
                  <span class="fa fa-user-secret"></span>
                  <h4 class="counter">100</h4>
                  <p>Lecturers</p>
                </div>
              </div>
              <!-- End counter item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us counter -->

  <!-- Start features section -->
  <section id="mu-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-features-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Why Bugema University?</h2>
              <hr class="thick-hr">
            </div>
            <!-- End Title -->
            <!-- Start features content -->
            <div class="mu-features-content">
              <div class="row">
                <div class="col-lg-4 col-md-4  col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-book"></span>
                    <h4>Professional Courses</h4>
                    <p>We Offer a number of proffesional courses across our faculties. The Department of Computing and Technology offers certifications from CISCO like CCNA, CCNP, and from Microsoft, the department provides MCSE, MCSA. The School of Business prepares students for CPA and other accounting proffesional courses. Our Nursing students are assessed by the Uganda Nurses And Midwifery Examination Board (UNMEB)  </p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-users"></span>
                    <h4>Expert Lecturers</h4>
                    <p>The university treasures the quality of it's products, and for that reason, we hire the quality and experienced lecturers to train and produce the quality for our students. Our lecuturers are associated with industry enterprises which helps them get the market experience that they instil in our students. Research is a core role for our lectucturers to keep producing relevant knowledge for the market.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-laptop"></span>
                    <h4>Blended Learning</h4>
                    <p>Our blended learning programs combine traditional classroom instruction with interactive online components, empowering students to engage with course materials, collaborate with peers. Our E-Learning system is available all the time to cater for those that may be in different time zones. Our support team will take you step by step on how to get the best from the platform. Pay a visit to our <a href="https://elearning.bugemauniv.ac.ug/" style="color: blue; font-size: 20px; font-style:solid; border: none">E-Learning </a> Platform</a></p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-users"></span>
                    <h4>Faculty-Student Interaction</h4>
                    <p>We believe in creating relationships that last with our clients. The institution has accademic families where each student is assigned to a mentor. This increases the bond between our students and lecturers. Since students are let free to ineteract with the lecturers, this gives them a chance to be well prepared for the market challenges ahead of them. This enriches their (Students) career readiness as well.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-praying"></span>
                    <h4>Worship</h4>
                    <p>We understand the importance of holistic development and the role of spirituality in our students' lives. We provide a nurturing environment that fosters personal growth and offers opportunities for spiritual enrichment. Our university offers worship services and spaces that cater to diverse religious and spiritual needs. Students can engage in prayer, meditation, and other spiritual activities to promote a sense of community, mindfulness, and well-being.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-certificate"></span>
                    <h4>Professional Certificate</h4>
                    <p>We believe in equipping our students with the necessary skills and credentials to excel in their chosen professions. As part of our commitment to professional development, we offer a range of professional certification programs. These certifications are designed to enhance students' expertise, improve their marketability, and demonstrate their proficiency in specific areas of study. </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- End features content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End features section -->

  <!-- Start latest course section -->
  <section id="mu-latest-courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-latest-courses-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>FACULTIES</h2>
            </div>
            <!-- End Title -->
            <!-- Start latest course content -->
            <div id="mu-latest-course-slide" class="mu-latest-courses-content">
            <?php
// Assuming you have a database connection established

// Fetch data from the "school" table
$query = "SELECT * FROM school";
$result = mysqli_query($conn, $query);

// Check if any schools exist
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $schoolId = $row['id'];
        $schoolName = $row['name'];
        $schoolImage = $row['photo'];

        // Display the school information in the HTML code
        echo '<div class="col-lg-4 col-md-4 col-xs-12">';
        echo '  <div class="mu-latest-course-single">';
        echo '    <figure class="mu-latest-course-img">';
        echo '      <a href="#"><img src="webmaster/' . $schoolImage . '" alt="img"></a>';
        echo '      <figcaption class="mu-latest-course-imgcaption">';
        echo '        <a href="schools.php?id=' . $schoolId . '">' . $schoolName . '</a>';
        echo '      </figcaption>';
        echo '    </figure>';
        echo '  </div>';
        echo '</div>';
    }
} else {
    echo 'No schools found.';
}
?>

            </div>
            <!-- End latest course content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End latest course section -->

  <!-- Start our teacher -->
  <section id="mu-our-teacher">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2>Campuses & Centers</h2>
              <hr class="thick-hr">
            </div>
            <!-- end title -->
            <!-- begain our teacher content -->
            <div class="mu-our-teacher-content">
              
              <div class="row">
              <?php
// Assuming you have a database connection established

// Fetch data from the "campus" table
$query = "SELECT * FROM campus";
$result = mysqli_query($conn, $query);

// Check if any campuses exist
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $campusId = $row['id'];
        $campusName = $row['name'];
        $campusImage = $row['campus_photo'];

        // Display the campus information in the HTML code
        echo '<div class="col-lg-3 col-md-3 col-sm-6">';
        echo '  <div class="mu-our-teacher-single">';
        echo '    <figure class="mu-our-teacher-img">';
        echo '      <img src="webmaster/' . $campusImage . '" alt="teacher img">';
        echo '    </figure>';
        echo '    <div class="mu-ourteacher-single-content">';
        echo '      <figcaption class="mu-latest-course-imgcaption">';
        echo '        <a href="campus.php?id=' . $campusId . '">' . $campusName . '</a>';
        echo '      </figcaption>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }
} else {
    echo 'No campuses found.';
}
?>

                
                
              </div>
            </div> 
            <!-- End our teacher content -->           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End our teacher -->

  <!-- Start testimonial -->
  <section id="mu-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div class="mu-title">
              <h2>UPCOMING EVENTS</h2>
            </div>
            <div id="mu-testimonial-slide" class="mu-testimonial-content">
              <!-- start testimonial single item -->
              <?php
                // Assuming you have already connected to the database and stored the connection in $conn
                // Retrieve data from the "event" table
                $sql2 = "SELECT * FROM event";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $eventTitle = $row2['name'];
                        $descr = $row2['description'];
                        $eventDate = $row2['date'];

                        echo '<div class="mu-testimonial-item">';
                        echo '<div class="mu-testimonial-quote">';
                        echo '<blockquote>';
                        echo '<p>' . $descr . '</p>';
                        echo '</blockquote>';
                        echo '</div>';
                        echo '<div class="mu-testimonial-info">';
                        echo '<h4>' . $eventTitle . '</h4>';
                        echo '<span>' . $eventDate . '</span>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No upcoming events found.</p>';
                }

                ?>
              <!-- end testimonial single item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End testimonial -->

  <!-- Start from blog -->

  <!-- section -->
  <section id="mu-from-blog">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <div class="mu-from-blog-area">
            <!-- start title -->
            <div class="mu-title" style="color: #fff;">
              <h2>NEWS AND ANNOUNCEMENTS</h2>
              <hr>
            </div>
            <!-- end title -->  
            <!-- start from blog content   -->
            <div class="mu-from-blog-content">
              
              <div class="row">
                <div class="col-lg-12">
                  <div class="mu-related-item">
                    <div class="mu-related-item-area">
                      <div id="mu-related-item-slide">
                      <?php
          $sql3 = "SELECT * FROM news";
          $result3 = $conn->query($sql3);
          
          // Generate HTML markup for each news item
          if ($result3->num_rows > 0) {
            while ($row3 = $result3->fetch_assoc()) {
              $newsId = $row3['id'];
              $photo = $row3['photo'];
              $title = $row3['title'];
              $date = $row3['date'];
              $description = $row3['content'];
              ?>
              <div class="col-lg-3 col-md- col-sm-">
                <article class="mu-blog-single-item" style="height: 100; width: 300px;">
                  <figure class="mu-blog-single-img">
                    <a href="#"><img alt="img" src="webmaster/<?php echo $photo; ?>"></a>
                    <figcaption class="mu-blog-caption">
                      <h3><a href="#"><?php echo $title; ?></a></h3>
                    </figcaption>                      
                  </figure>
                  <div class="mu-blog-meta">
                    <a href="#"><?php echo $date; ?></a>
                    <span><i class="fa fa-comments-o"></i>0</span>
                  </div>
                  <div class="mu-blog-description">
                    <p><?php echo $description; ?></p>
                    <a href="news.php?id=<?php echo $newsId; ?>" class="mu-read-more-btn">Read More</a>
                  </div>
                </article>
              </div>
              <?php
            }
          } else {
            echo "No news found.";
          }
          
          $conn->close();
          ?>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </div>     
            <!-- end from blog content   -->   
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End from blog -->

<?php
    require_once 'footer.php';
?>

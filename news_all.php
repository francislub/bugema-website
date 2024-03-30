<?php
    require_once 'header.php';
    require_once 'navbar.php';
?>

<section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <?php
                // Assuming you have a database connection established

                // Determine the current page number for pagination
                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Set the number of items per page
                $itemsPerPage = 5;

                // Calculate the offset for the database query
                $offset = ($page - 1) * $itemsPerPage;

                // Fetch news data from the "news" table
                $query = "SELECT * FROM news LIMIT $offset, $itemsPerPage";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $newsId = $row['id'];
                        $title = $row['title'];
                        $image = $row['photo'];
                        $author = 'Admin';
                        $date = $row['date'];
                        $description = $row['content'];
                ?>
                <div class="mu-course-container mu-blog-archive">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <article class="mu-blog-single-item">
                                <figure class="mu-blog-single-img">
                                    <a href="#"><img src="webmaster/<?php echo $image; ?>" alt="img"></a>
                                    <figcaption class="mu-blog-caption">
                                        <h3><a href="#"><?php echo $title; ?></a></h3>
                                    </figcaption>
                                </figure>
                                <div class="mu-blog-meta">
                                    <a href="#"><?php echo $author; ?></a>
                                    <a href="#"><?php echo $date; ?></a>
                                    <span><i class="fa fa-comments-o"></i>0</span>
                                </div>
                                <div class="mu-blog-description">
                                    <p><?php echo $description; ?></p>
                                    <a class="mu-read-more-btn" href="news.php?id=<?php echo $newsId; ?>">Read More</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "No news found.";
                }

                // Count the total number of news for pagination
                $countQuery = "SELECT COUNT(*) as count FROM news";
                $countResult = mysqli_query($conn, $countQuery);
                $totalItems = mysqli_fetch_assoc($countResult)['count'];

                // Calculate the total number of pages
                $totalPages = ceil($totalItems / $itemsPerPage);

                // Generate the pagination links
                $pagination = "";
                if ($totalPages > 1) {
                    $pagination .= '<div class="mu-pagination text-center"><ul class="pagination">';
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i == $page) {
                            $pagination .= '<li class="active"><a href="#">' . $i . '</a></li>';
                        } else {
                            $pagination .= '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                    }
                    $pagination .= '</ul></div>';
                }

                echo $pagination;
                ?>

                <!-- end course content container -->
                <!-- start course pagination -->
                <div class="mu-pagination">
                  <nav>
                    <ul class="pagination">
                      <li>
                        <a href="#" aria-label="Previous">
                          <span class="fa fa-angle-left"></span> Prev 
                        </a>
                      </li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li>
                        <a href="#" aria-label="Next">
                         Next <span class="fa fa-angle-right"></span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <!-- end course pagination -->
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Upcoming Events</h3>
                    <?php
                        // Assuming you have a database connection established

                        // Fetch the event data from the "event" table
                        $query6 = "SELECT * FROM event";
                        $result6 = mysqli_query($conn, $query6);

                        if (mysqli_num_rows($result6) > 0) {
                            while ($row6 = mysqli_fetch_assoc($result6)) {
                                $eventName = $row6['name'];
                                $eventPrice = $row6['date'];
                        ?>

                        <div class="mu-sidebar-popular-courses">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#"><?php echo $eventName; ?></a></h4>
                                    <span class="popular-course-price"><?php echo $eventPrice; ?></span>
                                </div>
                            </div>
                        </div><hr><br>

                        <?php
                            }
                        } else {
                            echo "No events available.";
                        }
                        ?>

                  </div>
                  <!-- end single sidebar -->
                </aside>
                <!-- / end sidebar -->
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
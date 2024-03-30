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
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                    <?php
                        // Assuming you have a database connection established

                        if (isset($_GET['id'])) {
                            $newsId = $_GET['id'];

                            // Fetch the news data for the given ID from the "news" table
                            $query = "SELECT * FROM news WHERE id = $newsId";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $title = $row['title'];
                                $image = $row['photo'];
                                $author = 'Admin';
                                $date = $row['date'];
                                $description = $row['content'];
                        ?>

                        <article class="mu-blog-single-item">
                            <figure class="mu-blog-single-img">
                                <a href="#"><img alt="img" src="webmaster/<?php echo $image; ?>"></a>
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
                                <blockquote>
                                    <p>Quotes</p>
                                </blockquote>
                            </div>
                            <!-- start blog social share -->
                            <div class="mu-blog-social">
                                <ul class="mu-news-social-nav">
                                    <li>SOCIAL SHARE :</li>
                                    <li><a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode('news.php?id=' . $newsId); ?>"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('news.php?id=' . $newsId); ?>"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode('news.php?id=' . $newsId); ?>"><span class="fa fa-linkedin"></span></a></li>
                                    <li><a href="https://api.whatsapp.com/send?text=<?php echo urlencode('Check out this news: news.php?id=' . $newsId); ?>"><span class="fa fa-whatsapp"></span></a></li>
                                </ul>
                            </div>
                            <!-- End blog social share -->
                        </article>

                        <?php
                                // Fetch the previous and next news IDs
                                $previousQuery = "SELECT id FROM news WHERE id < $newsId ORDER BY id DESC LIMIT 1";
                                $nextQuery = "SELECT id FROM news WHERE id > $newsId ORDER BY id ASC LIMIT 1";

                                $previousResult = mysqli_query($conn, $previousQuery);
                                $nextResult = mysqli_query($conn, $nextQuery);

                                $previousId = mysqli_fetch_assoc($previousResult)['id'] ?? null;
                                $nextId = mysqli_fetch_assoc($nextResult)['id'] ?? null;
                        ?>

                        </div>
                        </div>
                        </div>
                        <!-- end course content container -->
                        <!-- start blog navigation -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mu-blog-single-navigation">
                                    <?php if ($previousId) { ?>
                                        <a class="mu-blog-prev" href="news.php?id=<?php echo $previousId; ?>"><span class="fa fa-angle-left"></span>Prev</a>
                                    <?php } ?>
                                    <?php if ($nextId) { ?>
                                        <a class="mu-blog-next" href="news.php?id=<?php echo $nextId; ?>">Next<span class="fa fa-angle-right"></span></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <?php
                            } else {
                                echo "News not found.";
                            }
                        } else {
                            echo "No news ID specified.";
                        }
                        ?>

                <!-- end blog navigation -->
                <!-- start blog comment -->
                <?php
// Assuming you have established a database connection

// Fetch comments for a given ID
$id = $_GET['id']; // Assuming the ID is passed as a query parameter

$sql = "SELECT * FROM comments WHERE post_id = $id";
$result = mysqli_query($conn, $sql);

// Check if any comments exist
if (mysqli_num_rows($result) > 0) {
    echo '<div class="row">';
    echo '  <div class="col-md-12">';
    echo '    <div class="mu-comments-area">';
    echo '      <h3>Comments</h3>';
    echo '      <div class="comments">';
    echo '        <ul class="commentlist">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        $author = $row['name'];
        $postedDate = date('dS F, Y', strtotime($row['posted_on']));
        $comment = $row['comment'];

        // Display each comment
        echo '          <li>';
        echo '            <div class="media">';
        echo '              <div class="media-left">';    
        echo '                <img alt="img" src="assets/img/testimonial-2.png" class="media-object news-img">';
        echo '              </div>';
        echo '              <div class="media-body">';
        echo '                <h4 class="author-name">' . $author . '</h4>';
        echo '                <span class="comments-date">Posted on ' . $postedDate . '</span>';
        echo '                <p>' . $comment . '</p>';
        // echo '                <a class="reply-btn" href="#">Reply <span class="fa fa-long-arrow-right"></span></a>';
        echo '              </div>';
        echo '            </div>';
        echo '          </li>';
    }
    
    echo '        </ul>';
    echo '      </div>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';
} else {
    echo '<p>No comments found.</p>';
}
?>


                <!-- end blog comment -->
                <!-- start respond form -->
                <div class="row">
                    <div class="col-md-12">
                        <div id="respond">
                        <h3 class="reply-title">Leave a Comment</h3>
                        <form id="commentform" method="POST" action="process_comment.php">
                            <p class="comment-notes">
                            Your email address will not be published. Required fields are marked <span class="required">*</span>
                            </p>
                            <p class="comment-form-author">
                            <label for="author">Name <span class="required">*</span></label>
                            <input type="text" required="required" size="30" value="" name="author">
                            </p>
                            <p class="comment-form-email">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" required="required" aria-required="true" value="" name="email">
                            </p>
                            <p class="comment-form-comment">
                            <label for="comment">Comment</label>
                            <textarea required="required" aria-required="true" rows="8" cols="45" name="comment"></textarea>
                            </p>
                            <p class="comment-form-post-id" style="display: none;">
                            <label for="post_id">Post ID <span class="required">*</span></label>
                            <input type="text" required="required" size="30" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" name="post_id">
                            </p>

                            <p class="form-submit">
                            <input type="submit" value="Post Comment" class="mu-post-btn" name="submit">
                            </p>        
                        </form>
                        </div>
                    </div>
                    </div>

                <!-- end respond form -->
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- end single sidebar -->
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
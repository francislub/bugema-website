<?php
    require_once 'header.php';
    require_once 'navbar.php';
?>

<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form input values
    $name = $_POST['author'];
    $email = $_POST['email'];
    $phone = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['comment'];

    // Create a new PHPMailer instance
    $mailer = new PHPMailer();

    try {
        // Server settings
        $mailer->SMTPDebug = SMTP::DEBUG_OFF; // Set SMTP debugging: 0 = off (for production use), 2 = verbose debug output
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mailer->SMTPAuth = true; // Enable SMTP authentication
        $mailer->Username = 'admin@bugemauniv.ac.ug'; // SMTP username
        $mailer->Password = 'biezynfelxwdbblg'; // SMTP password
        $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
        $mailer->Port = 587; // TCP port to connect to

        // Sender and recipient settings
        $mailer->setFrom('info@bugemauniv.ac.ug', 'Bugema University Inquiry'); // Set the sender's email address and name
        $mailer->addAddress('info@bugemauniv.ac.ug'); // Add a recipient's email address
        $mailer->addAddress('marketing@bugemauniv.ac.ug');
        $mailer->addAddress('admissions@bugemauniv.ac.ug');
        $mailer->addAddress('itsupport@bugemauniv.ac.ug');
        $mailer->addAddress('lmusonda@bugemauniv.ac.ug');
        $mailer->addReplyTo($email, $name); // Set the reply-to email address and name

        // Email content
        $mailer->isHTML(false); // Set email format to plain text
        $mailer->Subject = $subject; // Set the email subject
        $mailer->Body = $message; // Set the email body content

        // Send the email
        if ($mailer->send()) {
            echo '<script>alert("Email sent successfully.");</script>';
        } else {
            echo '<script>alert("Failed to send email.");</script>';
        }
    } catch (Exception $e) {
        echo '<script>alert("Error occurred while sending email: ' . $mailer->ErrorInfo . '");</script>';
    }
}
?>

  <!-- Start contact  -->
 <section id="mu-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>Get in Touch</h2>
          </div>
          <!-- end title -->
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row">
              <div class="col-md-6">
                <div class="mu-contact-left">
                <form class="contactform" method="POST">
                  <p class="comment-form-author">
                    <label for="author">Name <span class="required">*</span></label>
                    <input type="text" required="required" size="30" value="" name="author">
                  </p>
                  <p class="comment-form-email">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" required="required" aria-required="true" value="" name="email">
                  </p>
                  <p class="comment-form-email">
                    <label for="number">Phone Number <span class="required">*</span></label>
                    <input type="text" required="required" aria-required="true" value="" name="number">
                  </p>
                  <p class="comment-form-url">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject">  
                  </p>
                  <p class="comment-form-comment">
                    <label for="comment">Message</label>
                    <textarea required="required" aria-required="true" rows="8" cols="45" name="comment"></textarea>
                  </p>                
                  <p class="form-submit">
                    <input type="submit" value="Send Message" class="mu-post-btn" name="submit">
                  </p>        
                </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mu-contact-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6206770744056!2d32.64117747514126!3d0.5703006635851848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177c4be209db538d%3A0xe4ac675b7d218fc9!2sBugema%20University!5e0!3m2!1sen!2sug!4v1688551060261!5m2!1sen!2sug" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End contact  -->
<?php
    require_once 'footer.php';
?>

<?php
    class auth extends controller
    {
        public function index()
        {
            $this->login();
        }
        public function login()
        {
            if(isset($_POST['login']))
            {

                $authModel = $this->loadModel("authModel");

                $result = $authModel->doLogin($_POST["username"], $_POST["password"]);
                if($result)
                {

                    $doLoginFeedback = "<div class='alert alert-block alert-success'>
                    <i class='fa fa-spinner fa-spin'></i> Credentials accepted, signing you in ..............
                    <script type='text/javascript'>setTimeout(function() { window.location.href = '".URL."admin';}, 3000);</script>
                    </div>";
                }
                else
                {
                    $doLoginFeedback = "<div class='alert alert-block alert-danger'><strong>Login Failed : </strong> Invalid username or password</div>";
                }
            }
            $pageTitle =  "Login";
            require_once APP_DIR."views/auth/login.php";
        }
        public function logout()
        {
            session_start();
            session_destroy();
            $this->redirect('login');
        }
        public function verify_account()
        {

        }
        public function lost_password()
        {
            if(isset($_POST['send']))
            {
                $token = bin2hex(openssl_random_pseudo_bytes(16));
                $authModel = $this->loadModel("authModel");
                $result = $authModel->verify_and_pass_link($_POST["email"],$token);
                if($result)
                {
                    $email = $_POST['email'];

                    $messageSubject = "Pasword reset token";
                    $messageOnSuccess = "<div class='alert alert-block alert-success'><span class='glyphicon glyphicon-ok-sign'></span><strong> SUCCESS : </strong> User <strong>{$email}</strong> Successfully Added !</div>";
                    $messageOnfail = "";

                    $messageBody = "
                    <p>&nbsp;</p>
                    <p>Dear {$email},</p>
                    <p>This email was sent automatically by the UHRC Magic Document Management System (DMS) in response to your request to reset your password.</p>
                    <p>This is done for your own protection. only you the recipient of this email can take the next step in the password reset process</p>
                    <p>To reset your password, either click  or copy and paste the next link into the address bar of web browser.</p>
                    <p><a href='".URL."auth/reset-password/{$token}'>".URL."auth/reset-password/{$token}</a></p>
                    <p>If you didn't initiate this password reset request, please ingore this email. Your password won't be changed.</p>
                    <p>&nbsp;</p>";
                    $mail = $this->loadHelper('email');
                    $mail->sendMessage($email,$messageSubject,'',$messageBody,$messageOnSuccess,$messageOnfail);

                    $doResetFeedback = "<div class='alert alert-block alert-success'><span class='glyphicon glyphicon-ok-sign'></span> Password reset token sent to your e-mail</div>";
                }
                else
                {
                    $doResetFeedback = "<div class='alert alert-block alert-danger'><span class='fa fa-times-circle'></span> No user associated with that email address</div>";
                }
            }
            $pageTitle =  "Reset your password";

            require_once APP_DIR."views/auth/lost_password.php";

        }
        public function reset_password($token)
        {
            $pageTitle =  "Reset your password";
            $authModel = $this->loadModel("authModel");
            $result = $authModel->verify_token($token);


            if($result)
            {
                if(isset($_POST['reset']))
                {
                    $newPass1 = $_POST['newPass1'];
                    $newPass2 = $_POST['newPass2'];

                    if($newPass1 == $newPass2)
                    {
                        $result2 = $authModel->resetPassword($token,$newPass1);
                        if($result2)
                        {
                            $doFeedback = "<div class='alert alert-block alert-success'><strong><i class='fa fa-spinner fa-spin'></i> Password reset successfully... </strong>
                    <script type='text/javascript'>setTimeout(function() { window.location.href = '".URL."';}, 3000);</script></div>";
                        }
                        else
                        {
                            $doFeedback = "<div class='alert alert-block alert-danger'><strong>ERROR : </strong> Passwords don't Match !</div>";
                        }
                    }
                    else
                    {
                        $doFeedback = "<div class='alert alert-block alert-danger'><strong>ERROR : </strong> Passwords don't Match !</div>";
                    }
                }
                require_once APP_DIR."views/auth/reset.php";
            }
            else
            {
                echo "<div class='login_wrapper'><div class='alert alert-block alert-danger'><center><i class='fa fa-times-circle-o'></i> Sorry, this password reset token is invalid</center></div></div>";
            }

        }

        public function change_password()
        {
            
        }
    }
?>
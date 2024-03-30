<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Bugema University :: E-LIBRARY </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL;?>static/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL;?>static/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>static/plugins/trumbowyg/ui/trumbowyg.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->


    <!-- Custom styles for this template -->
    <link href="<?php echo URL;?>static/css/home.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        html,body
        {
            background: #E3D9DA none repeat scroll 0% 0%;
        }
    </style>
</head>

<body>
<?php //echo password_hash("nu_Admin2017",PASSWORD_DEFAULT);?>
<div class="login-form">
    <div class="ce-loginbox">
        <div class="text-center">
            <img src="<?php echo URL;?>static/images/logo.png" height="80">
            <h6 class="text-danger">E-Library - Administration</h6>
        </div>
        <hr>
        <div><?php if(isset($doLoginFeedback)){echo "<p>{$doLoginFeedback}</p>";}?></div>
        <div class="registeredlogin">
            <form method="post" name="login" action="<?php echo URL;?>auth/login">
                <div class="form-group">
                    <input type="text" name='username' class="form-control" autocomplete="off" required placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name='password' class="form-control" required placeholder="Password">
                </div>
                <hr>
                <button type="submit" name='login' class="btn btn-block btn-primary">Login</button>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </form>

            <!--<div class="newaccounturl"><a>Don't have an account?  Register now</a></div>-->
        </div>
    </div>
    <span class="text-right"><a href="http://137.63.146.2/"><i class="fa fa-arrow-left"></i> Back to OPAC</a></span>
</div>
</body>
</html>
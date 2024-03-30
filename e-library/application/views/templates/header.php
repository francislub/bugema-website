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

    <title>Bugema University E-Library</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL;?>static/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL;?>static/css/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo URL;?>static/css/chosen.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo URL; ?>static/plugins/trumbowyg/ui/trumbowyg.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->


    <!-- Custom styles for this template -->
    <link href="<?php echo URL;?>static/css/custom.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo URL;?>admin">Bugema University E-Library Administration</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo URL;?>admin/new-resource"><i class="fa fa-plus-circle"></i> Add New Resouce</a></li>
              <li><a href="<?php echo URL;?>admin/categories"><i class="fa fa-plus-circle"></i> Categories</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-user-circle'></i> <?php if(isset($user_info['names'])){echo $user_info['names']; }?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Other</li>
                  <li><a href="<?php echo URL;?>auth/logout"><i class="fa fa-unlock-alt"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php
error_reporting(0);
ob_start();
session_start();
include_once("../../function/dbconfig.php");
include_once("data-file.php");





if(!isset($_SESSION["admin_id"]))
{
    header("Location: ".$base_url."/login");
}



$sqlst = "SELECT * FROM session_table ORDER BY ID DESC LIMIT 1";
    $qsqlst = mysqli_query($con,$sqlst);
    $rsst = mysqli_fetch_array($qsqlst);
    $session = $rsst['Session'];

?>



<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Assanusiyyah College of Education (ASSCOED), Odeomu Osun State, Nigeria.">
  <meta name="keywords" content="admission nce, college school education, private college, jamb low jamb score,">
  <meta name="author" content="Webtech">
  <title>Assanusiyyah College of Education (ASSCOED), Odeomu Osun State, Nigeria</title>
  <link rel="apple-touch-icon" href="<?php echo"$base_url";?>/images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo"$base_url";?>/images/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/vendors.css">
   
 <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/pickers/pickadate/pickadate.css">
   <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/file-uploaders/dropzone.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/core/menu/menu-types/vertical-content-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/plugins/file-uploaders/dropzone.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/pages/dashboard-ecommerce.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/assets/css/style.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-hide-on-scroll navbar-border navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="<?php echo"$base_url";?>">
             <center><img class="brand-logo" style="width: 60%;" src="<?php echo"$base_url";?>/images/logo.png"></center>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
           
            
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">Asccoed Admin</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="<?php echo"$base_url";?>/images/asslogo.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                 <a class="dropdown-item" href="<?php echo"$base_url";?>/home"><i class="ft-message-square"></i> Change Session</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo"$base_url";?>/logout"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
           
           
          </ul>
        </div>
      </div>
    </div>
  </nav>
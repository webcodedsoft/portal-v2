<?php
error_reporting(0);
ob_start();
session_start();
include_once("../function/dbconfig.php");

if(!isset($_SESSION["admin_id"]))
{
    header("Location: login");
}

$sql = "SELECT * FROM site_settings where ID='1'";
    $qsql = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($qsql);
    $base_url = $rs['Base_url'];
    $admission = $rs['Admission'];

$sqlst = "SELECT * FROM session_table ORDER BY ID DESC LIMIT 1";
    $qsqlst = mysqli_query($con,$sqlst);
    $rsst = mysqli_fetch_array($qsqlst);
    $session = $rsst['Session'];
unset($_SESSION["admin_app_id"]);
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
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/core/menu/menu-types/vertical-content-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/pages/search.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/assets/css/style.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-content-menu 1-column   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="1-column">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-hide-on-scroll navbar-border navbar-shadow navbar-brand-center">
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
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="<?php echo"$base_url";?>/logout"><i class="ficon ft-arrow-left"></i></a></li>
           
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <div class="row full-height-vh-with-nav">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-10">
              
            <form method="post" action="session-verify">
                 <label class="card-title" for="xLargeSelect"><b>Select Session</b></label>
               <fieldset class="form-group position-relative">
                      <select class="form-control input-xl" required="" name="session" id="xLargeSelect">
                        <option value="" selected disabled> Select Session</option>
                        <?php
                        $sql = "SELECT Session FROM session_table ORDER BY ID DESC";
                        $qsql = mysqli_query($con,$sql);
                        while($rs = mysqli_fetch_array($qsql))
                        {
                            echo "<option value='$rs[Session]'>$rs[Session]</option>";
                        }
                        ?>
                      </select>
              </fieldset>

           
              <div class="row py-2">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary btn-md" name="sessionbtn"><i class="ft-search"></i> Proceed</button>
                  
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-dark navbar-border">
     <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; <?php echo date("Y");?> <a class="text-bold-800 grey darken-2" href="https://webtechfit.com"
        target="_blank">WEBTECH </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"> Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/ui/headroom.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
</body>
</html>
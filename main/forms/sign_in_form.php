<?php 

//error_reporting(0); 
ob_start();
session_start();

include_once("../../function/dbconfig.php");

$sql = "SELECT * FROM site_settings where ID='1'";
    $qsql = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($qsql);
    $base_url = $rs['Base_url'];


if (isset($_POST['loginbtn'])){

$error =array();

$matno_or_app_id = strtoupper(mysqli_real_escape_string($con, $_POST['matno_or_app_id']));
$password = mysqli_real_escape_string($con, $_POST['password']);





    $sqlemail="SELECT * FROM logindetails where ( Username = '$matno_or_app_id' OR Application_id = '$matno_or_app_id')";
    $qsqlemail = mysqli_query($con,$sqlemail);

    if(mysqli_num_rows($qsqlemail)<1){

      
         $_SESSION['sign_up_sign_in_error'] = "No such student with that credential!, Please Try Again";
         echo "<script>window.location.assign('login');</script>";

      
        $error[]='No such user with that credential!';
     }

     if(mysqli_num_rows($qsqlemail)>0){
      
        $qsqlemail2=mysqli_fetch_array($qsqlemail);
        $student_app_id = $qsqlemail2['Application_id'];
        $login_type = $qsqlemail2['Login_Type'];

        if($qsqlemail2['Password']!= $password){

           $_SESSION['sign_up_sign_in_error'] = "Password entered was wrong!, Please Try Again";
          echo "<script>window.location.assign('login');</script>";

        
         $error[]='Password entered was wrong!, Please Try Again';
        }

        

          if (empty($error) && $login_type == 'Student' && $qsqlemail2['Status'] == 'Active') {
              
              
                $_SESSION['student_app_id']=$student_app_id;
                 $_SESSION['last_login_timestamp'] = time();
                 header('Location: '.$base_url.'/student_dashboard');
           
            }
            elseif (empty($error) && $login_type == 'Admin' && $qsqlemail2['Status'] == 'Active') {
              
                $_SESSION['admin_id']=$student_app_id;
                 $_SESSION['last_login_timestamp'] = time();
                 header('Location: '.$base_url.'/home');
               }

               elseif (empty($error) && $login_type == 'Registrar' && $qsqlemail2['Status'] == 'Active') {
              
                $_SESSION['reg_id']=$student_app_id;
                 $_SESSION['last_login_timestamp'] = time();
                 header('Location: '.$base_url.'/registrar-home');
               }

            }
        }
       /* else
        {
          $_SESSION['sign_up_sign_in_error'] = "Please login first, Please Try Again";
          echo "<script>window.location.assign('login');</script>";
        }*/

        

  
if(isset($_POST['pass-recover'])  ){       
        

$matno_or_app_id = strtoupper(mysqli_real_escape_string($con, $_POST['matno_or_app_id']));
$sponsor_num = mysqli_real_escape_string($con, $_POST['sponsor_num']);

$sqls = "SELECT * FROM biodata where  sponsorphone = '$sponsor_num'";
    $qsqls = mysqli_query($con,$sqls);
    $rss = mysqli_fetch_array($qsqls);

    if (mysqli_num_rows($qsqls) > 0) {
      

      $sqll = "SELECT * FROM logindetails where ( Username = '$matno_or_app_id' OR Application_id = '$matno_or_app_id')";
    $qsqll = mysqli_query($con,$sqll);
    $rsl = mysqli_fetch_array($qsqll);

    if (mysqli_num_rows($qsqll) > 0) {
    $_SESSION["output"] = $rsl["Password"];

    echo "<script>window.location.assign('forget-password');</script>";
    }
    else
    {
        $_SESSION["outputerr"] = "Matric Number or Application ID Not Match!, Please Try Again";
         echo "<script>window.location.assign('forget-password');</script>";
    }

    }
    else
    {
         $_SESSION["outputerr"] = "Sponsor Phone Number Not Match!, Please Try Again";
          echo "<script>window.location.assign('forget-password');</script>";
    }
 

   }
?>
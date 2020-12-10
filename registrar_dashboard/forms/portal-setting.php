<?php
ob_start();
error_reporting(0);
session_start();

include_once("../../function/dbconfig.php");




if(!isset($_SESSION["reg_id"]))
{
    header("Location: login");
}



if (isset($_POST['sessionbtn'])) {
    
$sessionsettings = mysqli_real_escape_string($con, $_POST['sessionsettings']);

 $sql="INSERT INTO session_table (Session) VALUES ('$sessionsettings')";
        if(!$qsql=mysqli_query($con,$sql))
        {
            echo mysqli_error($con);
        }

    $_SESSION['sessioncrt'] = "Session Sucessfully Created...";
    echo "<script>window.location.assign('reg-menu-page');</script>";
}






if (isset($_POST['regsettingbtn'])) {

$first100 = mysqli_real_escape_string($con, $_POST['first100']);
$first200 = mysqli_real_escape_string($con, $_POST['first200']);
$first300 = mysqli_real_escape_string($con, $_POST['first300']);
$obtainform = mysqli_real_escape_string($con, $_POST['obtainform']);
$timer = mysqli_real_escape_string($con, $_POST['timer']);
$semester = mysqli_real_escape_string($con, $_POST['semester']);



 $sql="UPDATE adminsettings SET Course100='$first100', Course200='$first200', Course300='$first300', ObtainForm='$obtainform', Semester='$semester', CourseTimer='$timer' WHERE ID=1";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    $_SESSION['regsettingmsg'] = "Settings Sucessfully Change...";
    echo "<script>window.location.assign('reg-menu-page');</script>";
}







?>



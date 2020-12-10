<?php

include_once("function/dbconfig.php");


if (isset($_SESSION['app_id'])) {

$sqla = "SELECT * FROM  applicationform WHERE Application_id='$_SESSION[app_id]'";
if(!$qsqla=mysqli_query($con,$sqla))
{
    echo mysqli_error($con);
}
$rsprint = mysqli_fetch_array($qsqla);

$sqlcourse_id ="SELECT * FROM course where course_id='$rsprint[Department]'";
                        $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
                        $rscourse_id = mysqli_fetch_array($qsqlcourse_id);

$sqlschool ="SELECT * FROM school where school_id='$rsprint[School]'";
                        $qsqlschool = mysqli_query($con,$sqlschool);
                        $rsschool = mysqli_fetch_array($qsqlschool);

}

 $sqlss = "SELECT * FROM session_table ORDER BY ID DESC LIMIT 1";
    $qsqlss = mysqli_query($con,$sqlss);
    $rss = mysqli_fetch_array($qsqlss);
    
        $school_session = $rss["Session"];
    
if(isset($_POST['validateadmission']))
{
session_start();
  $phone = mysqli_real_escape_string($con, $_POST['phone']);

$sqlch = "SELECT * FROM  applicationform WHERE PhoneNumber='$phone' ";
$qsqlch=mysqli_query($con,$sqlch);
$rsch = mysqli_fetch_array($qsqlch);
 
$phonenumber = $rsch["PhoneNumber"];

if(mysqli_num_rows($qsqlch) > 0){

     echo "<script>window.location.assign('admission-status?source=".$phonenumber."');</script>";
 
}

else{

$_SESSION['invalidphone'] = "Invalid Phone Number Entered";
	 echo "<script>window.location.assign('admission-checker-auth');</script>";

}

}




if(isset($_GET['source']))
{

  $source = $_GET['source'];

$sqlch = "SELECT * FROM  applicationform WHERE PhoneNumber='$source'";
$qsqlch=mysqli_query($con,$sqlch);
$rsch = mysqli_fetch_array($qsqlch);
 
$sqlcourse_id ="SELECT * FROM course where course_id='$rsch[Department]'";
                        $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
                        $rscourse_id = mysqli_fetch_array($qsqlcourse_id);

$sqlschool ="SELECT * FROM school where school_id='$rsch[School]'";
                        $qsqlschool = mysqli_query($con,$sqlschool);
                        $rsschool = mysqli_fetch_array($qsqlschool);


}











/*Validate Admission for Bio Data*/
if(isset($_POST['validatebtn']))
{
session_start();
  $appid = mysqli_real_escape_string($con, $_POST['appid']);
  $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
  $session = mysqli_real_escape_string($con, $_POST['session']);


$sqlch = "SELECT * FROM  applicationform WHERE PhoneNumber='$phonenumber' AND Application_id='$appid' AND Session='$session' AND Admission='Admitted'";
$qsqlch=mysqli_query($con,$sqlch);
$rsch = mysqli_fetch_array($qsqlch);
 
$phonenumber = $rsch["PhoneNumber"];
$id = $rsch["Application_id"];


if(mysqli_num_rows($qsqlch) > 0){


$sqlb = "SELECT * FROM  biodata WHERE application_id='$appid' AND session='$session'";
$qsqlb=mysqli_query($con,$sqlb);

if(mysqli_num_rows($qsqlb) > 0){

     $_SESSION["validaterr"] = 'Sorry you already complete your registration...';
    echo "<script>window.location.assign('validate-admission');</script>";
 }
 else
 {
  echo "<script>window.location.assign('bio-data-form?source=".$phonenumber."&app_id=".$id."&session=".$session."');</script>";
 }

}

else{

$_SESSION['validaterr'] = "Invalid Phone Number and Application ID Entered";
   echo "<script>window.location.assign('validate-admission');</script>";

}

}











/*Bio data print out result*/
if (isset($_SESSION['biodatasession'])) {

$sqlbi = "SELECT * FROM  biodata WHERE ID='$_SESSION[biodatasession]'";
if(!$qsqlbi=mysqli_query($con,$sqlbi))
{
    echo mysqli_error($con);
}
$rsbi = mysqli_fetch_array($qsqlbi);

$sqlcourse_idbi ="SELECT * FROM course where course_id='$rsbi[department]'";
                        $qsqlcourse_idbi = mysqli_query($con,$sqlcourse_idbi);
                        $rscourse_idbi = mysqli_fetch_array($qsqlcourse_idbi);

$sqlschoolbi ="SELECT * FROM school where school_id='$rsbi[school]'";
                        $qsqlschoolbi = mysqli_query($con,$sqlschoolbi);
                        $rsschoolbi = mysqli_fetch_array($qsqlschoolbi);

}









/*Course Registration data print out result*/
if (isset($_SESSION['coursedata'])) {

$sqlcf = "SELECT * FROM  course_registration WHERE ID='$_SESSION[coursedata]'";
if(!$qsqlcf=mysqli_query($con,$sqlcf))
{
    echo mysqli_error($con);
}
$rscf = mysqli_fetch_array($qsqlcf);
$matno = $rscf["Matric"];


$sqlcfd = "SELECT * FROM  biodata WHERE Matric='$matno'";
if(!$qsqlcfd=mysqli_query($con,$sqlcfd))
{
    echo mysqli_error($con);
}
$rscfd = mysqli_fetch_array($qsqlcfd);


$sqlcourse_idcf ="SELECT * FROM course where course_id='$rscfd[department]'";
                        $qsqlcourse_idcf = mysqli_query($con,$sqlcourse_idcf);
                        $rscourse_idcf = mysqli_fetch_array($qsqlcourse_idcf);

$sqlschoolcf ="SELECT * FROM school where school_id='$rscfd[school]'";
                        $qsqlschoolcf = mysqli_query($con,$sqlschoolcf);
                        $rsschoolcf = mysqli_fetch_array($qsqlschoolcf);

}





/*Course form registration print out*/
if (isset($_SESSION['course_id'])) {

$sqlcf = "SELECT * FROM  course_registration_form WHERE ID='$_SESSION[course_id]'";
if(!$qsqlcf=mysqli_query($con,$sqlcf))
{
    echo mysqli_error($con);
}
$rscf = mysqli_fetch_array($qsqlcf);
$matno = $rscf["Matric"];
$courses_id = $rscf['Courses'];
$unit = $rscf['Total_Unit'];



$sqlcfd = "SELECT * FROM  biodata WHERE Matric='$matno'";
if(!$qsqlcfd=mysqli_query($con,$sqlcfd))
{
    echo mysqli_error($con);
}
$rscfd = mysqli_fetch_array($qsqlcfd);


$sqlcourse_idcf ="SELECT * FROM course where course_id='$rscfd[department]'";
                        $qsqlcourse_idcf = mysqli_query($con,$sqlcourse_idcf);
                        $rscourse_idcf = mysqli_fetch_array($qsqlcourse_idcf);

$sqlschoolcf ="SELECT * FROM school where school_id='$rscfd[school]'";
                        $qsqlschoolcf = mysqli_query($con,$sqlschoolcf);
                        $rsschoolcf = mysqli_fetch_array($qsqlschoolcf);

}



$sqlset = "SELECT * FROM adminsettings where ID=1";
$qsqlset = mysqli_query($con,$sqlset);
$rsset = mysqli_fetch_array($qsqlset);
$first100 = $rsset['Course100'];
$first200 = $rsset['Course200'];
$first300 = $rsset['Course300'];
$semesterad = $rsset['Semester'];
$obtainform = $rsset['ObtainForm'];
$coursecloseingdate = $rsset['CourseTimer'];
?>
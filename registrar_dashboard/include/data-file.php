<?php
include_once("../../function/dbconfig.php");
error_reporting(0);
session_start();



$sql = "SELECT * FROM site_settings where ID='1'";
    $qsql = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($qsql);
    $base_url = $rs['Base_url'];
    $admission = $rs['Admission'];

    
if(!isset($_SESSION["reg_id"]))
{
    header("Location: ".$base_url."/login");
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






















$session_txt_r = $_SESSION["reg_session"];

$sql ="SELECT * FROM  course_registration where Session='$session_txt_r' AND Level ='100'";
$qsql = mysqli_query($con,$sql);
$std100 = mysqli_num_rows($qsql);

$sql2 ="SELECT * FROM  course_registration where Session='$session_txt_r' AND Level ='200'";
$qsql2 = mysqli_query($con,$sql2);
$std200 = mysqli_num_rows($qsql2);


$sql3 ="SELECT * FROM  course_registration where Session='$session_txt_r' AND Level ='300'";
$qsql3 = mysqli_query($con,$sql3);
$std300 = mysqli_num_rows($qsql3);


$sqli ="SELECT * FROM  applicationform where Session='$session_txt_r'";
$qsqli = mysqli_query($con,$sqli);
$incoming = mysqli_num_rows($qsqli);





/*Student BIO Data Editing GET APP ID*/
if (isset($_GET['app_id'])) {

$sqlrsch = "SELECT * FROM  biodata WHERE application_id='$_GET[app_id]'";
if(!$qsqlrsch=mysqli_query($con,$sqlrsch))
{
    echo mysqli_error($con);
}
$rsch = mysqli_fetch_array($qsqlrsch);

$sqlcourse_id ="SELECT * FROM course where course_id='$rsch[department]'";
                        $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
                        $rscourse_id = mysqli_fetch_array($qsqlcourse_id);

$sqlschool ="SELECT * FROM school where school_id='$rsch[school]'";
                        $qsqlschool = mysqli_query($con,$sqlschool);
                        $rsschool = mysqli_fetch_array($qsqlschool);

}







/*Course Registration data print out result*/
if (isset($_GET['id'])) {

$sqlcf = "SELECT * FROM  course_registration_form WHERE ID='$_GET[id]'";
if(!$qsqlcf=mysqli_query($con,$sqlcf))
{
    echo mysqli_error($con);
}
$rscf = mysqli_fetch_array($qsqlcf);
$matno = $rscf["Matric"];
$registred_courses = $rscf["Courses"];

$sqlcfd = "SELECT * FROM  biodata WHERE matric='$matno'";
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










?>









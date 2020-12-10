<?php

include_once("../../function/dbconfig.php");


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
if (isset($_SESSION['biodatasession']) || $_GET["biodata_id"]) {

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
$course_semester = $rscf["Semester"];


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











/*Login Students Data*/
if (isset($_SESSION['student_app_id'])) {

$sqllg = "SELECT * FROM  logindetails WHERE Application_id='$_SESSION[student_app_id]'";
if(!$qsqllg=mysqli_query($con,$sqllg))
{
    echo mysqli_error($con);
}
$rslg = mysqli_fetch_array($qsqllg);
$matno = $rslg["Username"];
$app_id = $rslg['Application_id'];



$sqlblg = "SELECT * FROM  biodata WHERE Matric='$matno'";
if(!$qsqlblg=mysqli_query($con,$sqlblg))
{
    echo mysqli_error($con);
}
$rsblg= mysqli_fetch_array($qsqlblg);
$image = $rsblg['image'];



$sqlcfl = "SELECT * FROM  course_registration WHERE Matric='$matno' ORDER BY ID DESC LIMIT 1";
if(!$qsqlcfl=mysqli_query($con,$sqlcfl))
{
    echo mysqli_error($con);
}
$rscfl = mysqli_fetch_array($qsqlcfl);
$student_level = $rscfl["Level"];


$matno = $rscf["Matric"];



$sqlcourse_idlg ="SELECT * FROM course where course_id='$rsblg[department]'";
                        $qsqlcourse_idlg = mysqli_query($con,$sqlcourse_idlg);
                        $rscourse_idlg = mysqli_fetch_array($qsqlcourse_idlg);

$sqlschoollg ="SELECT * FROM school where school_id='$rsblg[school]'";
                        $qsqlschoollg = mysqli_query($con,$sqlschoollg);
                        $rsschoollg = mysqli_fetch_array($qsqlschoollg);


}













if (isset($_POST["course_form_search"])) {

  $level = mysqli_real_escape_string($con, $_POST['level']);
  $semester = mysqli_real_escape_string($con, $_POST['semester']);

session_start();

$sqllg = "SELECT * FROM  logindetails WHERE Application_id='$_SESSION[student_app_id]'";
if(!$qsqllg=mysqli_query($con,$sqllg))
{
    echo mysqli_error($con);
}
$rslg = mysqli_fetch_array($qsqllg);
$matno = $rslg["Username"];
$app_id = $rslg['Application_id'];


  $sqlch = "SELECT * FROM  course_registration_form WHERE Matric='$matno' AND Level='$level' AND Semester='$semester'";
$qsqlch=mysqli_query($con,$sqlch);
$rsch = mysqli_fetch_array($qsqlch);
 
$id = $rsch["ID"];
$course_semester = $rsch["Semester"];


if(mysqli_num_rows($qsqlch) > 0){

$_SESSION["course_id"] = $id;

    echo "<script>window.location.assign('re-print-course-form');</script>";
 
}


}










/*Result search validation*/
if (isset($_POST["result_search"])) {

  $rlevel = mysqli_real_escape_string($con, $_POST['rlevel']);
  $rsemester = mysqli_real_escape_string($con, $_POST['rsemester']);

session_start();

$sqlr = "SELECT * FROM  logindetails WHERE Application_id='$_SESSION[student_app_id]'";
if(!$qsqlr=mysqli_query($con,$sqlr))
{
    echo mysqli_error($con);
}
$rsr = mysqli_fetch_array($qsqlr);
$matno = $rsr["Username"];
$app_id = $rsr['Application_id'];



$sqlcr = "SELECT * FROM  course_registration_form WHERE Matric='$matno' AND Level='$rlevel' AND Semester='$rsemester' AND Result !=''";
$qsqlcr=mysqli_query($con,$sqlcr);
$rscr = mysqli_fetch_array($qsqlcr);
$id = $rscr["ID"];

if(mysqli_num_rows($qsqlcr) > 0){

$_SESSION["course_result_id"] = $id;

 echo "<script>window.location.assign('sessional-result');</script>";
 
}


}







/*Fecting Result*/
if (isset($_SESSION["course_result_id"])) {
  


$course_result_id = $_SESSION["course_result_id"];



$sqlcr = "SELECT * FROM  course_registration_form WHERE ID='$course_result_id' ";
$qsqlcr=mysqli_query($con,$sqlcr);
$rscr = mysqli_fetch_array($qsqlcr);
 
$id = $rscr["ID"];
$result_semester = $rscr["Semester"];
$matno = $rscr["Matric"];
$sessiono = $rscr["Session"];


if ($result_semester == 'Second') {
  
  $sqlcrs = "SELECT * FROM  course_registration_form WHERE ID='$course_result_id' AND Semester ='Second'";
$qsqlcrs=mysqli_query($con,$sqlcrs);
$rscrs = mysqli_fetch_array($qsqlcrs);
$ids = $rscr["ID"];
$result_semesters = $rscrs["Semester"];
$course_scores = $rscrs["Result"];
$result_coursess = $rscrs["Courses"];
$total_units = $rscrs["Total_Unit"];
$levels = $rscrs["Level"];



}


  $sqlcrf = "SELECT * FROM  course_registration_form WHERE Matric='$matno' AND Semester ='First' AND Session='$sessiono'";
$qsqlcrf=mysqli_query($con,$sqlcrf);
$rscrf = mysqli_fetch_array($qsqlcrf);
$idf = $rscrf["ID"];
$result_semesterf = $rscrf["Semester"];
$course_scoref = $rscrf["Result"];
$result_coursesf = $rscrf["Courses"];
$total_unitf = $rscrf["Total_Unit"];
$levelf = $rscrf["Level"];





$sqlr = "SELECT * FROM  biodata WHERE Matric='$matno'";
if(!$qsqlr=mysqli_query($con,$sqlr))
{
    echo mysqli_error($con);
}
$rsr= mysqli_fetch_array($qsqlr);
$image = $rsr['image'];

$sqlcourse_idr ="SELECT * FROM course where course_id='$rsr[department]'";
                        $qsqlcourse_idr = mysqli_query($con,$sqlcourse_idr);
                        $rscourse_idr = mysqli_fetch_array($qsqlcourse_idr);

$sqlschoolr ="SELECT * FROM school where school_id='$rsr[school]'";
                        $qsqlschoolr = mysqli_query($con,$sqlschoolr);
                        $rsschoolr = mysqli_fetch_array($qsqlschoolr);
}











/*New Details*/
if (isset($_GET['slug']) ) {
 
  //unset($_SESSION["news_ss"]);


$sqlnw = "SELECT * FROM  post WHERE Heading_Slug='$_GET[slug]'";
if(!$qsqlnw=mysqli_query($con,$sqlnw))
{
    echo mysqli_error($con);
}
$rsnw = mysqli_fetch_array($qsqlnw);
$content = $rsnw["Description"];
$date = $rsnw["Dates"];
$slug = $rsnw["Heading_Slug"];
$heading = $rsnw["Heading"];


unset($_SESSION["news_ss"]);
}








/*News Search*/
if (isset($_POST["news_search"])) {

session_start();
 $_SESSION["news_ss"] = $_POST["news_search"];
 echo "<script>window.location.assign('../news-search');</script>";
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
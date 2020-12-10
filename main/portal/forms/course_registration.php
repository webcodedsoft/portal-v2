<?php
ob_start();
error_reporting(0);
session_start();

include_once("../../../function/dbconfig.php");

   $student_id = $_SESSION["coursedata"];
   $serial =  $_SESSION["courseserial"];


$sqlcf = "SELECT * FROM  course_registration WHERE ID='$student_id'";
if(!$qsqlcf=mysqli_query($con,$sqlcf))
{
    echo mysqli_error($con);
}
$rscf = mysqli_fetch_array($qsqlcf);
$matno = $rscf["Matric"];
$session = $rscf["Session"];
$level = $rscf["Level"];


$sql = "SELECT * FROM  biodata WHERE matric='$matno'";
if(!$qsql=mysqli_query($con,$sql))
{
    echo mysqli_error($con);
}
$rsprint = mysqli_fetch_array($qsql);


$sqlset = "SELECT * FROM adminsettings where ID=1";
$qsqlset = mysqli_query($con,$sqlset);
$rsset = mysqli_fetch_array($qsqlset);
$semesterad = $rsset['Semester'];












if (isset($_POST['courseregbtn'])){

$courseoffer = 0;
$education = 0;
$db_unit = 0;


    if(!isset($_POST['selector'])){
        
       $_SESSION["coursereg"] = 'Please Select atleast one Course(s) to Register';
       echo "<script>window.location.assign('course-registration');</script>";
}else{



     $selectorcheck=  implode(",",$_POST['selector']);
  $selectors=  explode(",", $selectorcheck);
  //print_r($selectorcheck);
foreach ($selectors as $selectorans) {
  
     $sqlcourse_id1 ="SELECT SUM(Course_Unit) AS department_unit FROM courseoffer where ID='$selectorans'";
    $qsqlcourse_id1 = mysqli_query($con,$sqlcourse_id1);
    $rscourse_id1 = mysqli_fetch_assoc($qsqlcourse_id1);
    $courseoffer +=$rscourse_id1['department_unit'];

    
   $sqlcourse_id ="SELECT SUM(Course_Unit) education_unit FROM education where ID='$selectorans'";
    $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
    $rscourse_id = mysqli_fetch_assoc($qsqlcourse_id);
     $education +=$rscourse_id['education_unit'];


}


 $sqlch = "SELECT * FROM course_registration_form where Matric='$matno'  AND Semester = '$semesterad' AND Level='$level' AND Session='$session'";
            $qsqlch = mysqli_query($con,$sqlch);
            $rsch = mysqli_fetch_array($qsqlch);
            $existing_course = $rsch["Courses"];
            $db_unit = $rsch["Total_Unit"];


 $answer=$courseoffer+$education;
 $answer = $db_unit + $answer;

//echo"$answer";

if($answer > 28){


$sql="DELETE FROM course_registration_form WHERE Matric='$matno'  AND Semester = '$semesterad' AND Level='$level' AND Session='$session'";
       $qsql = mysqli_query($con,$sql);   

  $_SESSION["coursereg"] = 'Your Total course unit must not greater than 28 Units... And your existing registered courses as been deleted also';
  header("Location: course-registration");
  echo "<script>window.location.assign('course-registration');</script>";

}
else
{






if (mysqli_num_rows($qsqlch) > 0) {

 $existing_courses=  explode(",", $existing_course);

$results  = array_diff($selectors, $existing_courses);

 $resultss=  implode(",",$results);
$selectorcheck = $existing_course.','.$resultss;


$sqlss="UPDATE course_registration_form SET  Courses='$selectorcheck', Total_Unit='$answer' WHERE Matric='$matno' AND Level='$level' AND Session='$session' AND Semester='$semesterad'";
    if(!$qsqlss=mysqli_query($con,$sqlss))
    {
        echo mysqli_error($con);
    }
$_SESSION["course_id"] = $rsch["ID"];

 $sqlp="UPDATE cardpin SET STATUS='$matno' WHERE SERIALS = '$serial' ";//
            if(!$qsqlp=mysqli_query($con,$sqlp))
            {
              echo mysqli_error($con);
            }
    unset($_SESSION["courseserial"]);

    
  $_SESSION["courseregsucc"] = 'Your Selected Course(s) Successfully Submitted';
  header("Location: course-registration");
  echo "<script>window.location.assign('course-registration');</script>";

}
else
{


	$result ="INSERT INTO course_registration_form (Matric,Courses, Total_Unit, Session,Semester,Level) VALUES('$matno','$selectorcheck', '$answer', '$session','$semesterad', '$level')";
 if(!$qsql=mysqli_query($con,$result))
    {
        //echo mysqli_error($con);
    } 
   $insid = mysqli_insert_id($con);
   $_SESSION["course_id"] = $insid;

 $sqlp="UPDATE cardpin SET STATUS='$matno' WHERE SERIALS = '$serial' ";//
            if(!$qsqlp=mysqli_query($con,$sqlp))
            {
              echo mysqli_error($con);
            }
    unset($_SESSION["courseserial"]);


  $_SESSION["courseregsucc"] = 'Your Selected Course(s) Successfully Submitted';
  header("Location: course-registration");
  echo "<script>window.location.assign('course-registration');</script>";


}

	 

}



}

}
else
{
$_SESSION["serialerror"] = 'Please kindly validate yourself to complete your registration...';
echo "<script>window.location.assign('course-form-validation');</script>";
}


?> 
<?php

include_once("../../function/dbconfig.php");
session_start();
//$connect = mysqli_connect("localhost", "root", "", "new_college_db");




$sqllg = "SELECT * FROM  logindetails WHERE Application_id='$_SESSION[student_app_id]'";
if(!$qsqllg=mysqli_query($con,$sqllg))
{
    echo mysqli_error($con);
}
$rslg = mysqli_fetch_array($qsqllg);
$matno = $rslg["Username"];



$output ="";
$sql = "Select * from course_registration_form where Matric='".$matno."' AND Level='".$_POST["schoolId"]."' AND Result !=''";
$result = mysqli_query($con, $sql);
$result_output = mysqli_num_rows($result);
while($row = mysqli_fetch_array($result))
{
	 echo'<option value="'.$row["Semester"].'">'.$row["Semester"].' Semester</option>';
}

if ($result_output < 1) {
  echo "<option selected disabled>No Result Avaliable For You At The Moment</option>";
}
echo $output;
?>

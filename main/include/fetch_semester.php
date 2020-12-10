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
$sql = "Select * from course_registration where Matric='".$matno."' AND Level='".$_POST["schoolId"]."'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
{
	 echo'<option value="'.$row["First_Semester"].'">'.$row["First_Semester"].' Semester</option>';
	 if (!empty($row[Second_Semester])) {
     echo'<option value="'.$row["Second_Semester"].'">'.$row["Second_Semester"].' Semester</option>';
 	 }
}
echo $output;
?>

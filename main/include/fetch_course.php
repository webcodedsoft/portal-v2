<?php
//$connect = mysqli_connect("localhost", "root", "", "new_college_db");

include_once("../../function/dbconfig.php");
$output ="";
$sql = "Select * from course where school_id='".$_POST["schoolId"]."'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
{
     echo'<option value="'.$row["course_id"].'">'.$row["coursetype"].'</option>';

}
echo $output;
?>

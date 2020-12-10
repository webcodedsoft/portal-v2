<?php
ob_start();
//error_reporting(0);
session_start();

include_once("../../../function/dbconfig.php");


$sql = "SELECT * FROM site_settings where ID='1'";
    $qsql = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($qsql);
    $base_url = $rs['Base_url'];
    $admission = $rs['Admission'];

    
if(!isset($_SESSION["admin_id"]))
{
    header("Location: ".$base_url."/login");
}



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
$course_id_reg = mysqli_real_escape_string($con, $_POST['course_id']);



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




 $answer=$courseoffer+$education;

//echo"$answer";

if($answer > 28){

  $_SESSION["coursereg"] = 'Your Total course unit must not greater than 28 Units... And your existing registered courses as been deleted also';
  header("Location: edit-student-courses/".$course_id_reg."");
  echo "<script>window.location.assign('edit-student-courses/".$course_id_reg."');</script>";

}
else
{



$sqlss="UPDATE course_registration_form SET  Courses='$selectorcheck', Total_Unit='$answer' WHERE ID='$course_id_reg'";
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

    
  $_SESSION["adcourseregsucc"] = 'Your Selected Course(s) Successfully Submitted';
  header("Location: edit-student-courses/".$course_id_reg."");
  echo "<script>window.location.assign('edit-student-courses/".$course_id_reg."');</script>";



	

}



}

}









if (isset($_POST["upload_result"])) {
 
       
        $fileName = $_FILES['result_file']['name'];
    $fileTmpName = $_FILES['result_file']['tmp_name'];

    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);//Let find the extension of file

    
    $allowedType = array('csv'); //define your allowed type extention
    if(!in_array($fileExtension, $allowedType)){

     //echo "<script>alert('Oops Error Occur, Please Check The File You Are Trying to Upload..');</script>";
     $_SESSION["resulterr"] = 'Oops Error Occur, Please Check The File You Are Trying to Upload.., Please Try Again';
     header("Location: course-result-uploader");
      echo "<script>window.location.assign('course-result-uploader');</script>";

    }else{



           $handle = fopen($fileTmpName, 'r');

           while(($myData = fgetcsv($handle, 1000, ',')) !== FALSE){

            //file column name
            $matric = $myData[0]; //indexing the excel column
            $session = $myData[1];
            $semester = $myData[2];
            $level = $myData[3];
            $score = $myData[4];


            //var_dump($myData);
          $sql="UPDATE course_registration_form SET  Result='$score' WHERE Matric='$matric' AND Session='$session' AND Semester='$semester' AND Level='$level'";
              if(!$qsql=mysqli_query($con,$sql))
              {
                  echo mysqli_error($con);
              }
             $_SESSION["resultsucc"] = 'Result Successfully Upload';
             header("Location: course-result-uploader");
             echo "<script>window.location.assign('course-result-uploader');</script>";
       
        }

      }

    }




    /*Upload Compute Result*/
    if (isset($_POST["upload_compute_result"])) {
      
      /*First List the result*/
    $key_no = 0;
    $matrics_array = $_POST["matrics_array"];
    $session = $_POST["sel_session"];
    $level = $_POST["sel_level"];
    $semester = $_POST["sel_semester"];
    $sel_pn = $_POST["sel_pn"];

    /*
    echo "$session<br/>";
    echo "$level<br/>";
    echo "$semester<br/>";
    */
    foreach($_POST["matrics"] AS $key => $matric)
    {

        $key_no +=1;
        $score = mysqli_real_escape_string($con, $_POST['score'.$key_no]);

        $score = empty($score) ? '0' : $score;
        /*Insert the listed result into temp table*/
        $result ="INSERT INTO course_result_temp_table (Matric, Session, Level, Semester, Result) VALUES('$matric','$session', '$level','$semester', '$score')";
         if(!$qsql=mysqli_query($con,$result))
         {
                echo mysqli_error($con);
         }
    }


$matrics_array = explode(",", $matrics_array);
$existing_result = '';


/*Now Use each matric to call all the temp table data*/
    foreach ($matrics_array as $key => $matric_no_value) {

        $existing_results = array();

        $sqlch = "SELECT * FROM course_result_temp_table where Matric='$matric_no_value'  AND Semester = '$semester' AND Level='$level' AND Session='$session'";
                $qsqlch = mysqli_query($con,$sqlch);
                while ($rsch = mysqli_fetch_array($qsqlch)) {
                  
                  $existing_result = $rsch["Result"];
                  $existing_results[] =  $existing_result;
                          
                }
                  
       /*Now convert the result call into comma seperate and Finally update the students result column*/
        $existing_result =  implode(',', $existing_results);

        $sql="UPDATE course_registration_form SET  Result='$existing_result' WHERE Matric='$matric_no_value' AND Session='$session' AND Semester='$semester' AND Level='$level'";
                  if(!$qsql=mysqli_query($con,$sql))
                  {
                      echo mysqli_error($con);
                  }

        $sql="DELETE FROM course_result_temp_table WHERE Matric='$matric_no_value'  AND Semester = '$semester' AND Level='$level' AND Session='$session'";
           $qsql = mysqli_query($con,$sql);   
                
    }


           
  header("Location: course-result-compute?sel_session=".$session."&sel_level=".$level."&sel_semester=".$semester."&pn=".$sel_pn." ");
  echo "<script>window.location.assign('course-result-compute?sel_session=".$session."&sel_level=".$level."&sel_semester=".$semester."&pn=".$sel_pn."');</script>";


    }



?> 
<?php
ob_start();
//error_reporting(0);
session_start();

include_once("../../../function/dbconfig.php");








if (isset($_POST['validatebtn'])) {

$matno = strtoupper(mysqli_real_escape_string($con, $_POST['matno']));
$serial = strtoupper(mysqli_real_escape_string($con, $_POST['serial']));
$session = ucfirst(mysqli_real_escape_string($con, $_POST['session']));
$level = ucfirst(mysqli_real_escape_string($con, $_POST['level']));
$semester = ucfirst(mysqli_real_escape_string($con, $_POST['semester']));
$password = mysqli_real_escape_string($con, $_POST['password']);
$dt= date("Y-m-d");
//$password = md5($password);

    $sql = "SELECT * FROM biodata where matric= '$matno' ";
    $qsql = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($qsql);
    $app_id = $rs["application_id"];

if (mysqli_num_rows($qsql) < 1) {

$_SESSION["serialerror"] = 'Sorry please complete your biodata registration first';
echo "<script>window.location.assign('course-form-validation');</script>";


  }else{


   




    /*First Semester*/
   	if ($semester == 'First') {
   		

 

 		$sqlp = "SELECT * FROM cardpin WHERE SERIALS='$serial' AND STATUS='ACTIVE'";
    $qsqlp = mysqli_query($con,$sqlp);

   	if (mysqli_num_rows($qsqlp) > 0) {
 	

 	  		/*Only 100 Level First Semester*/
   	if ($semester == 'First' && $level == '100') {
    	

   	$sqlr = "SELECT * FROM course_registration WHERE Matric= '$matno' AND Level='100' AND First_Semester ='First' AND Session='$session'";
    $qsqlr = mysqli_query($con,$sqlr);
    $rsr = mysqli_fetch_array($qsqlr);
    
    
  	if (mysqli_num_rows($qsqlr) > 0) {
    	
    //Students data already exist in the db

    $_SESSION["coursedata"] = $rsr["ID"];
    $_SESSION["courseserial"] = $serial;
    echo "<script>window.location.assign('course-registration');</script>";
    }
    else
    {


    	$sql="INSERT INTO course_registration (Matric,Session,Level,First_Semester,Dates)
	    VALUES('$matno','$session', '$level','$semester','$dt')";
	        if(!$qsql=mysqli_query($con,$sql))
	        {
	            echo mysqli_error($con);
	        }
	    $insid = mysqli_insert_id($con);
	    
	   
	    

	     $sqlil="INSERT INTO logindetails(Username, Application_id, Password, Login_type, Status) VALUES ('$matno', '$app_id', '$password','Student', 'Active')";
	        if(!$qsqlil=mysqli_query($con,$sqlil))
	        {
	            echo mysqli_error($con);
	        }
 	 $_SESSION["coursedata"] = $insid;
 	 $_SESSION["courseserial"] = $serial;
     echo "<script>window.location.assign('course-registration');</script>";

    }

    

    }
    elseif ($semester == 'First' && $level != '100') {
    
    	$sqlr = "SELECT * FROM course_registration WHERE Matric= '$matno' AND Level='$level' AND First_Semester ='First' AND Session='$session'";
    $qsqlr = mysqli_query($con,$sqlr);
    $rsr = mysqli_fetch_array($qsqlr);
    
  	if (mysqli_num_rows($qsqlr) > 0) {
    	

    //Students data already exist in the db

   $_SESSION["coursedata"] = $rsr["ID"];
    $_SESSION["courseserial"] = $serial;
    echo "<script>window.location.assign('course-registration');</script>";
    }
    else
    {


    	$sql="INSERT INTO course_registration (Matric,Session,Level,First_Semester,Dates)
    VALUES('$matno','$session', '$level','$semester','$dt')";
        if(!$qsql=mysqli_query($con,$sql))
        {
            echo mysqli_error($con);
        }
    $insid = mysqli_insert_id($con);


     $_SESSION["coursedata"] = $insid;   
     $_SESSION["courseserial"] = $serial;
    echo "<script>window.location.assign('course-registration');</script>";



    }

    
    
 
    }


 	}
 	else
 	{
 		//Invalid Pin
   		  $_SESSION['serialerror'] = "Invalid Serial No entered..., Please Try Again";
         echo "<script>window.location.assign('course-form-validation');</script>";
 	}





   	}
    /*Only Ex 300 Level*/
    elseif ($semester == 'Second' && $level == 'Ex-300') {
      

        $sqlr = "SELECT * FROM course_registration WHERE Matric= '$matno' AND Level='$level' AND Second_Semester ='Second' AND Session='$session'";
    $qsqlr = mysqli_query($con,$sqlr);
    $rsr = mysqli_fetch_array($qsqlr);
    
    if (mysqli_num_rows($qsqlr) > 0) {
      

    //Students data already exist in the db

   $_SESSION["coursedata"] = $rsr["ID"];
    $_SESSION["courseserial"] = $serial;
    echo "<script>window.location.assign('course-registration');</script>";
    }
    else
    {


      $sql="INSERT INTO course_registration (Matric,Session,Level,Second_Semester,Dates)
    VALUES('$matno','$session', '$level','$semester','$dt')";
        if(!$qsql=mysqli_query($con,$sql))
        {
            echo mysqli_error($con);
        }
    $insid = mysqli_insert_id($con);


     $_SESSION["coursedata"] = $insid;   
     $_SESSION["courseserial"] = $serial;
    echo "<script>window.location.assign('course-registration');</script>";



    }


    }

   	/*Second Semester*/
   	else
   	{
   		//Update db where matno is equal to existing matno

   	$sqlr = "SELECT * FROM course_registration WHERE Matric= '$matno' AND Level='$level' AND Session ='$session'";
    $qsqlr = mysqli_query($con,$sqlr);
    $rsr = mysqli_fetch_array($qsqlr);

    

    $sqlss="UPDATE course_registration SET  Second_Semester='$semester' WHERE Matric='$matno' AND Level='$level' AND Session='$session'";
    if(!$qsqlss=mysqli_query($con,$sqlss))
    {
        echo mysqli_error($con);
    }
    

    $_SESSION["coursedata"] = $rsr["ID"];
    $_SESSION["courseserial"] = $serial;
    echo "<script>window.location.assign('course-registration');</script>";


   	}
      	

   } 


}
/*else
{

     $_SESSION["serialerror"] = 'Please kindly validate yourself to complete your registration...';
echo "<script>window.location.assign('course-form-validation');</script>";
}*/






?>
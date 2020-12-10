<?php
ob_start();
error_reporting(0);
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



$app_id_session = strtoupper(mysqli_real_escape_string($con, $_POST['app_id']));



if (!empty($_FILES)) {

$app_id_session =  $_SESSION["admin_app_id"];

if (!empty($_FILES['passportfile']['tmp_name'])) {

        $temp_file = $_FILES['passportfile']['tmp_name'];
        $targetDir = '../../../images/students_images/';
        $filename = explode(".", $_FILES['passportfile']['name']);
        $newfilename = $app_id_session.'_Passport'.'.'.end($filename);
        
        //$filename = rand().$_FILES['file']['name'];
        $targetFile =  $targetDir.$newfilename;

 
       // Deleting file

      
           unlink('../../../images/students_images/'.$app_id_session.'_Passport'.'.png');
           unlink('../../../images/students_images/'.$app_id_session.'_Passport'.'.jpg');
           unlink('../../../images/students_images/'.$app_id_session.'_Passport'.'.jpeg');
           unlink('../../../images/students_images/'.$app_id_session.'_Passport'.'.gif');


        if (move_uploaded_file($temp_file,$targetFile)) {

          $sql="UPDATE applicationform SET Passport='$newfilename' WHERE Application_id = '$app_id_session'";//
            if(!$qsql=mysqli_query($con,$sql))
            {
              echo mysqli_error($con);
            }
       
        }

    

}
elseif (!empty($_FILES['olevelfile']['tmp_name'])) {
 
$app_id_session =  $_SESSION["admin_app_id"];
$empty_img_arr=array();
foreach($_FILES['olevelfile']['tmp_name'] as $key => $value) {
        $temp_file = $_FILES['olevelfile']['tmp_name'][$key];
        $targetDir = '../../../images/result_images/';
         $filename = explode(".", $_FILES['olevelfile']['name']);
        $filename = $app_id_session.'_Olevel'.$_FILES['olevelfile']['name'][$key];
        $targetFile =  $targetDir.$filename;

        if (move_uploaded_file($temp_file,$targetFile)) {

           
         $empty_img_arr[]= $filename;

         $image = implode(',',$empty_img_arr);

        $sql="UPDATE applicationform SET OlevelFirst='$image' WHERE Application_id = '$app_id_session' ";//
        if(!$qsql=mysqli_query($con,$sql))
        {
          echo mysqli_error($con);
        }
       
        }
    }
     

     

}
elseif (!empty($_FILES['jambfile']['tmp_name'])) {
   $app_id_session =  $_SESSION["admin_app_id"];

            $temp_file = $_FILES['jambfile']['tmp_name'];
        $targetDir = '../../../images/result_images/';
        $filename = explode(".", $_FILES['jambfile']['name']);
        $newfilename = $app_id_session.'_Jamb'.'.'.end($filename);
        //$filename = rand().$_FILES['file']['name'];
        $targetFile =  $targetDir.$newfilename;

 
       // Deleting file

      
           unlink('../../../images/result_images/'.$app_id_session.'.png');
           unlink('../../../images/result_images/'.$app_id_session.'.jpg');
           unlink('../../../images/result_images/'.$app_id_session.'.jpeg');
           unlink('../../../images/result_images/'.$app_id_session.'.gif');


        if (move_uploaded_file($temp_file,$targetFile)) {

            $sql="UPDATE applicationform SET Jamb='$newfilename' WHERE Application_id = '$app_id_session' ";//
            if(!$qsql=mysqli_query($con,$sql))
            {
              echo mysqli_error($con);
            }
       
        }

      
}

}





if (isset($_POST['firstname'])) {

$firstname = ucfirst(mysqli_real_escape_string($con, $_POST['firstname']));
$middlename = ucfirst(mysqli_real_escape_string($con, $_POST['middlename']));
$lastname = ucfirst(mysqli_real_escape_string($con, $_POST['lastname']));
$email = mysqli_real_escape_string($con, $_POST['email']);
$phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);    
$marital = mysqli_real_escape_string($con, $_POST['marital']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$dob = mysqli_real_escape_string($con, $_POST['dob']);
$country = mysqli_real_escape_string($con, $_POST['country']);
$state = mysqli_real_escape_string($con, $_POST['state']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$session = mysqli_real_escape_string($con, $_POST['session']);
$utmeno = strtoupper(mysqli_real_escape_string($con, $_POST['utmeno']));
$jambscore = mysqli_real_escape_string($con, $_POST['jambscore']);
$collegechoice = ucfirst(mysqli_real_escape_string($con, $_POST['collegechoice']));
$school = mysqli_real_escape_string($con, $_POST['school']);
$department = mysqli_real_escape_string($con, $_POST['department']);
$address = ucfirst(mysqli_real_escape_string($con, $_POST['address']));

$app_id_session =  $_SESSION["admin_app_id"];
$sql="UPDATE applicationform SET FirstName='$firstname', MiddleName='$middlename', LastName='$lastname', Email='$email', PhoneNumber='$phonenumber', Marital='$marital', Gender='$gender', Dob='$dob', Country='$country', State='$state', City='$city', Address='$address', Session='$session', Utmeno='$utmeno', JambScore='$jambscore', CollegeChoice='$collegechoice', School='$school', Department='$department', Status='Complete' WHERE Application_id = '$app_id_session' ";//
            if(!$qsql=mysqli_query($con,$sql))
            {
              echo mysqli_error($con);
            }

    $_SESSION["biocor"] = 'Candidate Data Successfully Change';
    echo "<script>window.location.assign('edit-candidate-data/".$app_id_session."');</script>";
}











if (isset($_POST['changecourse'])) {
    

   $sql="UPDATE applicationform SET  School='$_POST[school]',Department='$_POST[department]' WHERE Application_id='$_POST[num]'";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

     $sql="UPDATE biodata SET  school='$_POST[school]',department='$_POST[department]' WHERE application_id='$_POST[num]'";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    else
    {
      $_SESSION["coursechg"] = 'Department Successfully Change..';
    echo "<script>window.location.assign('change-of-course?num=".$_POST['num']."');</script>";
        
       
    }

}
?>
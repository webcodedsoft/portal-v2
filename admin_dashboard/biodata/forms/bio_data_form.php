<?php
ob_start();
error_reporting(0);
session_start();

include_once("../../../function/dbconfig.php");








if (isset($_POST['firstname'])) {


$prevmatric = strtoupper(mysqli_real_escape_string($con, $_POST['prevmatric']));
$prevphone = strtoupper(mysqli_real_escape_string($con, $_POST['prevphone']));
$matric = strtoupper(mysqli_real_escape_string($con, $_POST['matric']));
$app_id = strtoupper(mysqli_real_escape_string($con, $_POST['app_id']));
$firstname = ucfirst(mysqli_real_escape_string($con, $_POST['firstname']));
$middlename = ucfirst(mysqli_real_escape_string($con, $_POST['middlename']));
$lastname = ucfirst(mysqli_real_escape_string($con, $_POST['lastname']));
$email = mysqli_real_escape_string($con, $_POST['email']);
$phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);    
$marital = mysqli_real_escape_string($con, $_POST['marital']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$dob = mysqli_real_escape_string($con, $_POST['dob']);
$religion = mysqli_real_escape_string($con, $_POST['religion']);
$language = mysqli_real_escape_string($con, $_POST['language']);
$country = mysqli_real_escape_string($con, $_POST['country']);
$state = mysqli_real_escape_string($con, $_POST['state']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$address = ucfirst(mysqli_real_escape_string($con, $_POST['address']));
$school = mysqli_real_escape_string($con, $_POST['school']);
$department = mysqli_real_escape_string($con, $_POST['department']);
$session = mysqli_real_escape_string($con, $_POST['session']);
$kinfname = ucfirst(mysqli_real_escape_string($con, $_POST['kinfname']));
$kinmname = ucfirst(mysqli_real_escape_string($con, $_POST['kinmname']));
$kinlname = ucfirst(mysqli_real_escape_string($con, $_POST['kinlname']));
$kinaddress = ucfirst(mysqli_real_escape_string($con, $_POST['kinaddress']));
$sponsorfname = ucfirst(mysqli_real_escape_string($con, $_POST['sponsorfname']));
$sponsorothername = ucfirst(mysqli_real_escape_string($con, $_POST['sponsorothername']));
$sponsoraddress = ucfirst(mysqli_real_escape_string($con, $_POST['sponsoraddress']));
$sponsorphone = mysqli_real_escape_string($con, $_POST['sponsorphone']);
$declared = ucfirst(mysqli_real_escape_string($con, $_POST['declared']));
$image = mysqli_real_escape_string($con, $_POST['image']);




    $sqlss="UPDATE biodata SET  matric='$matric', application_id='$app_id', fname='$firstname', mname='$middlename', lname='$lastname', dob='$dob', country='$country', state='$state', city='$city', marital='$marital', gender='$gender', address='$address', phone='$phonenumber', email='$email', school='$school', department='$department', religion='$religion', language='$language', session='$session', kinfname='$kinfname', kinmname='$kinmname', kinlname='$kinlname', kinaddress='$kinaddress', sponsorfname='$sponsorfname', sponsorothername='$sponsorothername', sponsoraddress='$sponsoraddress', sponsorphone='$sponsorphone', declared='$declared' WHERE  application_id='$app_id' ";
    if(!$qsqlss=mysqli_query($con,$sqlss))
    {
        echo mysqli_error($con);
    }



   $sql="UPDATE applicationform SET FirstName='$firstname', MiddleName='$middlename', LastName='$lastname', Email='$email', PhoneNumber='$phonenumber', Marital='$marital', Gender='$gender', Dob='$dob', Country='$country', State='$state', City='$city', Address='$address', Session='$session', School='$school', Department='$department', Matric='$matric'  WHERE Application_id = '$app_id' ";//
   if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

      $sqlc="UPDATE course_registration SET Matric='$matric'  WHERE Matric = '$prevmatric' ";//
   if(!$qsqlc=mysqli_query($con,$sqlc))
    {
        echo mysqli_error($con);
    }

     $sqlcf="UPDATE course_registration_form SET Matric='$matric'  WHERE Matric = '$prevmatric' ";//
   if(!$qsqlcf=mysqli_query($con,$sqlcf))
    {
        echo mysqli_error($con);
    }

    $sqllg="UPDATE logindetails SET  Username='$matric', Application_id='$app_id' WHERE  Application_id='$app_id' ";
    if(!$qsqllg=mysqli_query($con,$sqllg))
    {
        echo mysqli_error($con);
    }

    $_SESSION["adbiodatasuc"] = "Information Successfully Saved";
    echo "<script>window.location.assign('edit-student-bio-data/".$phonenumber."');</script>";

   } 








?>
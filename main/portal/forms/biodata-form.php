<?php
ob_start();
error_reporting(0);
session_start();

include_once("../../../function/dbconfig.php");








if (isset($_POST['firstname'])) {



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


    $sql = "SELECT * FROM biodata where matric= '$matric' OR Application_id='$app_id'";
    $qsql = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($qsql);
     $mats = $rs['matric'];


if (mysqli_num_rows($qsql) > 0) {

$_SESSION["validaterr"] = 'Sorry you already complete your registration...';
echo "<script>window.location.assign('validate-admission');</script>";


   }else{


    $dt= date("Y-m-d");

    $sql="INSERT INTO biodata (matric,application_id,fname,mname,lname,dob,country,state,city,marital,gender,address,phone,email,school,department,religion,language,session,kinfname,kinmname,kinlname,kinaddress,sponsorfname,sponsorothername,sponsoraddress,sponsorphone,declared,image)
    VALUES('$matric','$app_id', '$firstname','$middlename','$lastname','$dob','$country', '$state', '$city', '$marital','$gender','$address','$phonenumber','$email','$school','$department','$religion','$language','$session','$kinfname','$kinmname','$kinlname','$kinaddress','$sponsorfname','$sponsorothername','$sponsoraddress','$sponsorphone','$declared','$image')";
        if(!$qsql=mysqli_query($con,$sql))
        {
            echo mysqli_error($con);
        }
$insid = mysqli_insert_id($con);

        $sqla="UPDATE applicationform SET FirstName='$firstname', MiddleName='$middlename', LastName='$lastname', Email='$email', PhoneNumber='$phonenumber', Marital='$marital', Gender='$gender', Dob='$dob', Country='$country', State='$state', City='$city', Address='$address', Session='$session', School='$school', Department='$department', Matric='$matric'  WHERE Application_id = '$app_id' ";//
           if(!$qsqla=mysqli_query($con,$sqla))
            {
                echo mysqli_error($con);
            }


    
    
    $_SESSION["biodatasession"] = $insid;
    $_SESSION['last_login_timestamp'] = time();
    echo "<script>window.location.assign('bio-data-print-out?biodata_id=".$insid."');</script>";

   } 


}
else
{
    $_SESSION["validaterr"] = 'Please kindly validate yourself to complete your registration...';
echo "<script>window.location.assign('validate-admission');</script>";
}






?>
<?php
ob_start();
error_reporting(0);
session_start();

include_once("../../function/dbconfig.php");




if(!isset($_SESSION["admin_id"]))
{
    header("Location: login");
}



if (isset($_POST['sessionbtn'])) {
    
$sessionsettings = mysqli_real_escape_string($con, $_POST['sessionsettings']);

 $sql="INSERT INTO session_table (Session) VALUES ('$sessionsettings')";
        if(!$qsql=mysqli_query($con,$sql))
        {
            echo mysqli_error($con);
        }

    $_SESSION['sessioncrt'] = "Session Sucessfully Created...";
    echo "<script>window.location.assign('menu-page');</script>";
}









if (isset($_POST['postbtn'])) {
    
$heading = mysqli_real_escape_string($con, $_POST['heading']);
$description = mysqli_real_escape_string($con, $_POST['description']);

$heading_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $heading)));

  $day = date('d F Y'); 
 $sql="INSERT INTO post(Heading, Heading_Slug, Description,Dates, Status) VALUES ('$heading', '$heading_slug', '$description','$day', 'Active')";
        if(!$qsql=mysqli_query($con,$sql))
        {
            echo mysqli_error($con);
        }

    $_SESSION['newsmesg'] = "News Sucessfully Posted...";
    echo "<script>window.location.assign('post-news');</script>";

}





if (isset($_POST['regsettingbtn'])) {

$first100 = mysqli_real_escape_string($con, $_POST['first100']);
$first200 = mysqli_real_escape_string($con, $_POST['first200']);
$first300 = mysqli_real_escape_string($con, $_POST['first300']);
$obtainform = mysqli_real_escape_string($con, $_POST['obtainform']);
$timer = mysqli_real_escape_string($con, $_POST['timer']);
$semester = mysqli_real_escape_string($con, $_POST['semester']);



 $sql="UPDATE adminsettings SET  Course100='$first100', Course200='$first200', Course300='$first300', ObtainForm='$obtainform', Semester='$semester', CourseTimer='$timer' WHERE ID=1";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    $_SESSION['regsettingmsg'] = "Settings Sucessfully Change...";
    echo "<script>window.location.assign('menu-page');</script>";
}








if (!empty($_FILES['sliderfile']['tmp_name'])) {
 

$empty_img_arr=array();
foreach($_FILES['sliderfile']['tmp_name'] as $key => $value) {
        $temp_file = $_FILES['sliderfile']['tmp_name'][$key];
        $targetDir = '../../images/slider/';
        $filename = rand().$_FILES['sliderfile']['name'][$key];
        $targetFile =  $targetDir.$filename;

        if (move_uploaded_file($temp_file,$targetFile)) {

           
         $empty_img_arr[]= $filename;

         


          $sqlch = "SELECT * FROM site_settings WHERE ID='1'";
            $qsqlch = mysqli_query($con,$sqlch);
            $rsch = mysqli_fetch_array($qsqlch);
            $existing_slide = $rsch["Slider"];


            $image = implode(',',$empty_img_arr); 
            $selectors=  explode(",", $image);
             $existing_slides=  explode(",", $existing_slide);

            $results  = array_diff($selectors, $existing_slides);

             $resultss=  implode(",",$results);
            $selectorcheck = $existing_slide.','.$resultss;



        $sql="UPDATE site_settings SET Slider='$selectorcheck' WHERE ID = '1' ";//
        if(!$qsql=mysqli_query($con,$sql))
        {
          echo mysqli_error($con);
        }
       
        }
    }
     

     
}






if (!empty($_FILES['galleryfile']['tmp_name'])) {
 

$empty_img_arr=array();
foreach($_FILES['galleryfile']['tmp_name'] as $key => $value) {
        $temp_file = $_FILES['galleryfile']['tmp_name'][$key];
        $targetDir = '../../images/gallery/';
        $filename = rand().$_FILES['galleryfile']['name'][$key];
        $targetFile =  $targetDir.$filename;

        if (move_uploaded_file($temp_file,$targetFile)) {

           
         $empty_img_arr[]= $filename;

         


          $sqlch = "SELECT * FROM site_settings WHERE ID='1'";
            $qsqlch = mysqli_query($con,$sqlch);
            $rsch = mysqli_fetch_array($qsqlch);
            $existing_slide = $rsch["Gallery"];


            $image = implode(',',$empty_img_arr); 
            $selectors=  explode(",", $image);
             $existing_slides=  explode(",", $existing_slide);

            $results  = array_diff($selectors, $existing_slides);

             $resultss=  implode(",",$results);
            $selectorcheck = $existing_slide.','.$resultss;



        $sql="UPDATE site_settings SET Gallery='$selectorcheck' WHERE ID = '1' ";//
        if(!$qsql=mysqli_query($con,$sql))
        {
          echo mysqli_error($con);
        }
       
        }
    }
     

     
}












if (isset($_POST['aboutbtn'])) {

$abcontent = mysqli_real_escape_string($con, $_POST['abcontent']);


 $sql="UPDATE site_settings SET  About_Us='$abcontent' WHERE ID=1";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    $_SESSION['abtmesg'] = "About Us Sucessfully Change...";
    echo "<script>window.location.assign('manage-about-us');</script>";
}




if (isset($_POST['contactbtn'])) {

$connumber = mysqli_real_escape_string($con, $_POST['connumber']);


 $sql="UPDATE site_settings SET  Contact_Us='$connumber' WHERE ID=1";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    $_SESSION['conmesg'] = "Contact Us Sucessfully Change...";
    echo "<script>window.location.assign('manage-about-us');</script>";
}





if (isset($_POST['submitfee'])) {
    
$feename = mysqli_real_escape_string($con, $_POST['feename']);
$amount = mysqli_real_escape_string($con, $_POST['amount']);
$accountno = mysqli_real_escape_string($con, $_POST['accountno']);
$bankname = mysqli_real_escape_string($con, $_POST['bankname']);
$level = mysqli_real_escape_string($con, $_POST['level']);


  $day = date('d F Y'); 
 $sql="INSERT INTO school_fee(FeeName, Amount,AccountNo, BankName, Level) VALUES ('$feename', '$amount','$accountno', '$bankname','$level')";
        if(!$qsql=mysqli_query($con,$sql))
        {
            echo mysqli_error($con);
        }

    $_SESSION['schmesg'] = "School Fee Sucessfully Added...";
    echo "<script>window.location.assign('manage-fee');</script>";

}

?>



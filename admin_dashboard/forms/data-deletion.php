<?php
ob_start();
error_reporting(0);
session_start();

include_once("../../function/dbconfig.php");



if(!isset($_SESSION["admin_id"]))
{
    header("Location: login");
}





if (isset($_GET["ses_id"])) {
	
	$sql=" DELETE FROM session_table WHERE ID='$_GET[ses_id]' ";
	if(!$qsql=mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}

    $_SESSION['newsdel'] = "Session Sucessfully Deleted...";
    echo "<script>window.location.assign('menu-page');</script>";

}



if (isset($_GET["fee_id"])) {
    
    $sql=" DELETE FROM school_fee WHERE ID='$_GET[fee_id]' ";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    $_SESSION['schmesg'] = "School Fee Sucessfully Deleted...";
    echo "<script>window.location.assign('manage-fee');</script>";

}



if (isset($_GET["postid"])) {
	
	$sql=" DELETE FROM post WHERE ID='$_GET[postid]' ";
	if(!$qsql=mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}

    $_SESSION['sessioncrt'] = "News Sucessfully Deleted...";
    echo "<script>window.location.assign('post-news');</script>";

}






if (isset($_GET["bio_id"])) {
	
	$sql=" DELETE FROM biodata WHERE application_id='$_GET[bio_id]' ";
	if(!$qsql=mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}

    $_SESSION['biodata_del'] = "Student Biodata Sucessfully Deleted...";
    echo "<script>window.location.assign('students-bio-data-table');</script>";

}



if (isset($_GET["del_slide"])) {
	
	$del_slide = array($_GET["del_slide"]);
	 $sqlch = "SELECT * FROM site_settings WHERE ID='1'";
    $qsqlch = mysqli_query($con,$sqlch);
    $rsch = mysqli_fetch_array($qsqlch);
    $existing_slide = $rsch["Slider"];
    $existing_slide = explode(",", $existing_slide);

    /*Compare deleting array file*/
   $arr = array_diff($existing_slide, array($_GET["del_slide"]));
    //var_dump($arr);

    	$newimg = implode(",", $arr);

   	$sql="UPDATE site_settings SET  Slider='$newimg' WHERE ID=1";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }
    unlink('../../images/slider/'.$_GET["del_slide"].'');

	$_SESSION['sl_id_del'] = "Slide Sucessfully Deleted...";
    echo "<script>window.location.assign('slider-settings');</script>";
    
}







if (isset($_GET["accept"])) {
	
	 	$sql="UPDATE applicationform SET  Admission='Admitted' WHERE Application_id='$_GET[accept]'";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    $_SESSION['candidatemsg'] = "Admission Sucessfully Issued...";
    echo "<script>window.location.assign('candidate-list');</script>";

}




if (isset($_GET["unaccept"])) {
	
	 	$sql="UPDATE applicationform SET  Admission='Not Admitted' WHERE Application_id='$_GET[unaccept]'";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    $_SESSION['candidatemsg'] = "Admission Sucessfully Unaccepted...";
    echo "<script>window.location.assign('candidate-list');</script>";

}




if (isset($_GET["can_del"])) {
	
	$sql=" DELETE FROM applicationform WHERE Application_id='$_GET[can_del]' ";
	if(!$qsql=mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}

    $_SESSION['candidatemsg'] = "Candidate Data Sucessfully Deleted...";
    echo "<script>window.location.assign('candidate-list');</script>";

}







if (isset($_GET["del_gallery"])) {
    
    $del_gallery = array($_GET["del_gallery"]);
     $sqlch = "SELECT * FROM site_settings WHERE ID='1'";
    $qsqlch = mysqli_query($con,$sqlch);
    $rsch = mysqli_fetch_array($qsqlch);
    $existing_gallery = $rsch["Gallery"];
    $existing_gallery = explode(",", $existing_gallery);

    /*Compare deleting array file*/
   $arr = array_diff($existing_gallery, array($_GET["del_gallery"]));
    //var_dump($arr);

        $newimg = implode(",", $arr);

    $sql="UPDATE site_settings SET  Gallery='$newimg' WHERE ID=1";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }
    unlink('../../images/gallery/'.$_GET["del_gallery"].'');

    $_SESSION['ga_id_del'] = "Gallery Sucessfully Deleted...";
    echo "<script>window.location.assign('school-gallery');</script>";
    
}

?>
<?php
ob_start();
error_reporting(0);
session_start();

include_once("../../function/dbconfig.php");



if(!isset($_SESSION["reg_id"]))
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
    echo "<script>window.location.assign('reg-menu-page');</script>";

}









if (isset($_GET["accept"])) {
	
	 	$sql="UPDATE applicationform SET  Admission='Admitted' WHERE Application_id='$_GET[accept]'";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    $_SESSION['candidatemsg'] = "Admission Sucessfully Issued...";
    echo "<script>window.location.assign('reg-candidate-list');</script>";

}




if (isset($_GET["unaccept"])) {
	
	 	$sql="UPDATE applicationform SET  Admission='Not Admitted' WHERE Application_id='$_GET[unaccept]'";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }

    $_SESSION['candidatemsg'] = "Admission Sucessfully Unaccepted...";
    echo "<script>window.location.assign('reg-candidate-list');</script>";

}




if (isset($_GET["can_del"])) {
	
	$sql=" DELETE FROM applicationform WHERE Application_id='$_GET[can_del]' ";
	if(!$qsql=mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}

    $_SESSION['candidatemsg'] = "Candidate Data Sucessfully Deleted...";
    echo "<script>window.location.assign('reg-candidate-list');</script>";

}






?>
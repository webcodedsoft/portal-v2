 <?php
ob_start();
error_reporting(0);


include_once("function/dbconfig.php");
$sql = "SELECT * FROM site_settings where ID='1'";
    $qsql = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($qsql);
    $base_url = $rs['Base_url'];
    $admission = $rs['Admission'];
     $aboutus = $rs['About_Us'];
 
 
 
 $sql="UPDATE adminsettings SET  Course100='OFF', Course200='OFF', Course300='OFF' WHERE ID='1'";
    if(!$qsql=mysqli_query($con,$sql))
    {
        echo mysqli_error($con);
    }
    else
    {
        header("Location: ".$base_url."");
    }

    ?>
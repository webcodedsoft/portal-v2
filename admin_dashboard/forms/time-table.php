<?php
ob_start();
error_reporting(0);
session_start();

include_once("../../function/dbconfig.php");




if(!isset($_SESSION["admin_id"]))
{
    header("Location: login");
}


if (!empty($_FILES['jambfile']['tmp_name'])) {

            $temp_file = $_FILES['jambfile']['tmp_name'];
        $targetDir = '../../images/timetable/';
        $filename = explode(".", $_FILES['jambfile']['name']);
            $newfilename = 'schoolcalender'.'.'.end($filename);
        
        //$filename = rand().$_FILES['file']['name'];
        $targetFile =  $targetDir.$newfilename;

 
       // Deleting file

      
           unlink('../../images/timetable/schoolcalender.png');
           unlink('../../images/timetable/schoolcalender.jpg');
           unlink('../../images/timetable/schoolcalender.jpeg');
           unlink('../../images/timetable/schoolcalender.gif');


        if (move_uploaded_file($temp_file,$targetFile)) {

            $sql="UPDATE site_settings SET School_Calender='$newfilename' WHERE ID = 1 ";//
            if(!$qsql=mysqli_query($con,$sql))
            {
              echo mysqli_error($con);
            }
       
        }

      
}








if (!empty($_FILES['passportfile']['tmp_name'])) {

        $temp_files = $_FILES['passportfile']['tmp_name'];
        $targetDirs = '../../images/timetable/';
        $filenames = explode(".", $_FILES['passportfile']['name']);
         $newfilenames = 'timetable'.'.'.end($filenames);
        //$filename = rand().$_FILES['file']['name'];
        $targetFiles =  $targetDirs.$newfilenames;

 
       // Deleting file

      
           unlink('../../images/timetable/timetable.png');
           unlink('../../images/timetable/timetable.jpg');
           unlink('../../images/timetable/timetable.jpeg');
           unlink('../../images/timetable/timetable.gif');


        if (move_uploaded_file($temp_files,$targetFiles)) {

           $sqls="UPDATE site_settings SET Time_Table='$newfilenames' WHERE ID = 1 ";//
            if(!$qsqls=mysqli_query($con,$sqls))
            {
              echo mysqli_error($con);
            }
       
        }

    

}





























?>



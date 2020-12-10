<?php
ob_start();
session_start();


if(!isset($_SESSION["admin_id"]))
{
    header("Location: login");
}



if(isset($_POST['sessionbtn']))
{

  $_SESSION["session"] = $_POST['session'];

  echo "<script>window.location.assign('menu-page');</script>";


        
}


?>
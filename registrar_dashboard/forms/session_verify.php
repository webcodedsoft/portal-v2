<?php
ob_start();
session_start();


if(!isset($_SESSION["reg_id"]))
{
    header("Location: login");
}



if(isset($_POST['sessionbtn']))
{

  $_SESSION["reg_session"] = $_POST['session'];

  echo "<script>window.location.assign('reg-menu-page');</script>";


        echo($_SESSION['reg_id']);
}


?>
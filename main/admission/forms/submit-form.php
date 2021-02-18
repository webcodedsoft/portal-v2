<?php
ob_start();
error_reporting(0);
session_start();

include_once("../../../function/dbconfig.php");

 $app_id_session = $_SESSION["app_id"];
 $pin_session = $_SESSION["pin"];




if(isset($_POST['verify']))
{
/*$pin = mysqli_real_escape_string($con, $_POST['pin']);*/
$serial = mysqli_real_escape_string($con, $_POST['serial']);
$phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
$applicationmethod = mysqli_real_escape_string($con, $_POST['applicationmethod']);
$error =array();
$app_id = random_string(10);


    $sqlp = "SELECT * FROM cardpin WHERE SERIALS='$serial' ";
    $qsqlp = mysqli_query($con,$sqlp);
    $rsp = mysqli_fetch_array($qsqlp);


    $sqlc = "SELECT * FROM applicationform WHERE PhoneNumber='$phonenumber'";
    $qsqlc = mysqli_query($con,$sqlc);
    $rsc = mysqli_fetch_array($qsqlc);


    $sqls = "SELECT * FROM applicationform WHERE Pin='$serial'";
    $qsqls = mysqli_query($con,$sqls);
    $rss = mysqli_fetch_array($qsqls);


    if(mysqli_num_rows($qsqlp)<1){

     
           $_SESSION['pinerror'] = "Invalid Serial Number* entered..., Please Try Again";
         echo "<script>window.location.assign('application-form');</script>";
      
        $error[]='Invalid Serial Number entered..., Please Try Again';
    }
    
    elseif ($rsp['STATUS'] == 'ACTIVE') {
      
      if(mysqli_num_rows($qsqlc) > 0 && $rsc['Status'] =='Incomplete'){

         $_SESSION["pin"] = $rsc['Pin'];
         $_SESSION["app_id"] = $rsc['Application_id'];
          echo "<script>window.location.assign('proceed-application-form');</script>";

      }

      elseif (mysqli_num_rows($qsqlc) > 0 && $rsc['Status'] =='Complete') {

         $_SESSION["pinerror"] = 'Sorry you already complete your registration.';
        echo "<script>window.location.assign('application-form');</script>";
      }

      elseif (mysqli_num_rows($qsqls) > 0 && $phonenumber != $rss['PhoneNumber'] ) {

       $_SESSION["pinerror"] = 'Serial number already been in used by someone else..., Please Try Again.';
        echo "<script>window.location.assign('application-form');</script>";
      }

      
      else
      {

         $_SESSION["pin"] = $rsp['SERIALS'];
        $_SESSION["app_id"] = $app_id;       

        $sql="INSERT INTO applicationform (Application_id,PhoneNumber,JambOption,Pin, Admission, Status) VALUES('$app_id', '$phonenumber', '$applicationmethod', '$serial', 'Not Admitted', 'Incomplete')";
        if(!$qsql=mysqli_query($con,$sql))
        {
            echo mysqli_error($con);
        }
        $formapp = mysqli_insert_id($con);


        echo "<script>window.location.assign('proceed-application-form');</script>";
       
        }   
      }
      else
      {
         $_SESSION["pinerror"] = 'Serial number already been used..., Please Try Again.';
        
        echo "<script>window.location.assign('application-form');</script>";
      }


    }













if (!empty($_FILES)) {

$app_id_session = $_SESSION['app_id'];


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
 

$empty_img_arr=array();
foreach($_FILES['olevelfile']['tmp_name'] as $key => $value) {
        $temp_file = $_FILES['olevelfile']['tmp_name'][$key];
        $targetDir = '../../../images/result_images/';
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


    $sql="UPDATE applicationform SET FirstName='$firstname', MiddleName='$middlename', LastName='$lastname', Email='$email', PhoneNumber='$phonenumber', Marital='$marital', Gender='$gender', Dob='$dob', Country='$country', State='$state', City='$city', Address='$address', Session='$session', Utmeno='$utmeno', JambScore='$jambscore', CollegeChoice='$collegechoice', School='$school', Department='$department', Admission='Admitted', Status='Complete' WHERE Application_id = '$app_id_session' ";//
    if(!$qsql=mysqli_query($con,$sql))
    {
      echo mysqli_error($con);
    }


    $sqlp="UPDATE cardpin SET STATUS='$phonenumber' WHERE SERIALS = '$pin_session' ";//
            if(!$qsqlp=mysqli_query($con,$sqlp))
            {
              echo mysqli_error($con);
            }
    unset($_SESSION["pin"]);

    echo "<script>window.location.assign('print-application');</script>";
}












function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('A', 'Z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

?>
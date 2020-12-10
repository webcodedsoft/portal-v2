<?php include("../include/header.php");


if(!isset($_SESSION['coursedata']))//!isset($_SESSION["app_id"]) && 
{
    header("Location: course-form-validation");

}

?>
<link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/tables/datatable/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/plugins/forms/checkboxes-radios.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/plugins/animate/animate.css">
    
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
    </div>
        <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Welcome To ASSCOED NCE Portal </h3>
         
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2"
            id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"><i class="ft-settings icon-left"></i> ASSCOED NCE Portal</button>
             <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

              <a class="dropdown-item" href="<?php echo"$base_url";?>/login">NCE Login Portal</a>
              <a class="dropdown-item" href="<?php echo"$base_url";?>/entry-requirments" >Registration Instruction </a>
               <?php
                if ($first100 == 'ON' && $semester ='First') {
                  ?>
                  <li><a class="dropdown-item" href="<?php echo"$base_url";?>/validate-admission" >Bio Data</a>
                </li>
                <?php
                }
                
                if ($first100 == 'ON' || $first200 == 'ON' || $first300 == 'ON') {
                  ?>
                  <li><a class="dropdown-item" href="<?php echo"$base_url";?>/course-form-validation" >Create Course Form</a>
                </li>
                <?php
                }
                ?>
                  
            </div>
          </div>
        </div>
      </div>
      <br/>

   
<br/>
   <?php include("../include/sidebar.php");?>

      <div class="content-body">

      <section id="horizontal-vertical">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">COURSE REGISTRATION FORM</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                  <center> <p style="color:red">NOTE: Please be inform that your total course units must not greater than 28 units.</p>
                  <small style="color:red">Carefully Select your course any mistake(s) their is  penalty attached to it</small>
                                                                              
                  </center>
              
              <div class="table-responsive col-sm-12">

                  
         

        
                  <table class="table table-bordered mb-0" >
                    <tr class="bg-yellow bg-lighten-4" style="color: black">
                      <td style="width: 50px">
                          <img style='width:150px;height:150px;' src="<?php echo"$base_url";?>/images/students_images/<?php echo $rscfd['image'];?>"  class=""
                        />
                        </td>
                        
    
                        <td>

                        <strong><p style="color:black">Name: <?php echo $rscfd["fname"];?> <?php echo $rscfd["mname"];?> <?php echo $rscfd["lname"];?><br>
                          Sex: <?php echo $rscfd["gender"];?><br>
                          
                          Matric: <?php echo $rscfd["matric"];?><br>
                          Level: <?php echo $rscf["Level"];?> Level<br>
                          Department: <?php echo $rscourse_idcf["coursetype"];?><br/>
                          Session: <?php echo $rscf["Session"];?><br/>
                          Semester: <?php echo $rsset["Semester"];?><br/>
                          School: <?php echo $rsschoolcf["schoolname"];?>
                          </strong></p>
                        </td>

                       
                    </tr>
                    
                  </table>
                </div>

                
                     <br/>
                     <?php 

                    if (isset($_SESSION['coursereg'])) 
                    {
                      
                      echo '
                      <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["coursereg"].'
                        </div>

                    ';
                      
                      unset($_SESSION['coursereg']);

                    }

                  

                  if (isset($_SESSION['courseregsucc'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["courseregsucc"].'
                        </div>

                    ';
                      
                      unset($_SESSION['courseregsucc']);

                    }
                     ?>
  <form action="course_registration" class="form-horizontal" method="post">

                    <table style="width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal-vertical">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Course Code</th>
                          <th>Semester</th>
                          <th>Course Title</th>
                          <th>Unit</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                     
                      <tr>
<?php

if ($rsset["Semester"] == 'First') {
  
  $sem = 1;
}
else
{
  $sem = 2;
}


if ($rscf["Level"] == '100') {
  $level = 1;

  $sql = "SELECT * FROM education where course_Id='0' AND Semester='$sem' AND Level='$level'";

}
elseif ($rscf["Level"] == '200') {
  $level = 2;

  $sql = "SELECT * FROM education where course_Id='0' AND Semester='$sem' AND (Level='$level' OR Level='1')";

}
elseif ($rscf["Level"] == '300') {
  $level = 3;

    $sql = "SELECT * FROM education where course_Id='0' AND Semester='$sem' AND (Level='$level' OR Level='1' OR Level='2')";

}
elseif ($rscf["Level"] == 'Ex-300') 
{
    $level = 3;
    $sql = "SELECT * FROM education where course_Id='0' AND Semester='$sem' AND (Level='$level' OR Level='1' OR Level='2')";
}


$i=0;


$qsql = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($qsql)){
$id = $row['ID'];

$i++;

?>
                          <td><?php echo"$i";?></td>
                          <td><div class="row skin skin-flat"> <input type="checkbox"  id="selectall" name="selector[]" value="<?php echo $id; ?>"> <label class="custom-control custom-checkbox" ><?php echo $row['Course_Code'];?> </label></div></td>
                          <td><?php echo $row['Semester'];?></td>
                          <td><?php echo $row['Course_Title'];?></td>
                          <td><?php echo $row['Course_Unit'];?></td>
                          <td><?php echo $row['Description'];?></td>
                          </tr>

<?php } 

if ($rscf["Level"] == '100') {
  $level = 1;
  
  $sql = "SELECT * FROM courseoffer where course_Id='$rscfd[department]' AND semester='$sem'  AND Level='$level'";

}
elseif ($rscf["Level"] == '200') {
  $level = 2;

  $sql = "SELECT * FROM courseoffer where course_Id='$rscfd[department]' AND semester='$sem' AND (Level='$level' OR Level='1')";


}
elseif ($rscf["Level"] == '300') {
  $level = 3;

  $sql = "SELECT * FROM courseoffer where course_Id='$rscfd[department]' AND semester='$sem' AND (Level='$level' OR Level='1' OR Level='2')";

}
elseif ($rscf["Level"] == 'Ex-300') {
  $level = 3;

  $sql = "SELECT * FROM courseoffer where course_Id='$rscfd[department]' AND semester='$sem' AND (Level='$level' OR Level='1' OR Level='2')";

}




$qsql = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($qsql)){
$id = $row['ID'];

$i++;
?>                      <td><?php echo"$i";?></td>
                        <td><div class="row skin skin-flat"> <input type="checkbox"  id="selectall" name="selector[]" value="<?php echo $id; ?>"> <label class="custom-control custom-checkbox" ><?php echo $row['Course_Code'];?> </label></div></td>
                        <td><?php echo $row['Semester'];?></td>
                        <td><?php echo $row['Course_Title'];?></td>
                        <td><?php echo $row['Course_Unit'];?></td>
                        <td><?php echo $row['Description'];?></td>


</tr>
<?php }?>


                      </tbody>
                    </table>

                    <center><button type="submit" class="btn btn-info btn-rounded" name="courseregbtn">Submit</button></center>

<?php


 $sqlch = "SELECT * FROM course_registration_form where Matric='$rscfd[matric]'  AND Semester = '$rsset[Semester]' AND Level='$rscf[Level]' AND Session='$rscf[Session]'";
            $qsqlch = mysqli_query($con,$sqlch);
            $rsch = mysqli_fetch_array($qsqlch);

if (mysqli_num_rows($qsqlch) > 0) {
  echo '<button type="button" class="btn btn-info btn-round" data-toggle="modal"
                          data-target="#wobble">Finish & Print Submited Course</button>';
}
         
?>

<!-- <button type="submit" class="btn btn-info btn-round"  onclick="myFunction()" class="fa fa-print" name="getdata">Finish & Print Submited Course</button> -->

                          <!-- Modal -->
                          <div class="modal animated wobble text-left" id="wobble" tabindex="-1" role="dialog"
                          aria-labelledby="myModalLabel44" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel44">Question?</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  
                                  <h5>Are you sure you want to finish this?</h5>
                                  <div class="alert alert-success" role="alert">
                                    <span class="text-bold-600">Well done!</span> Your Selected Course(s) Successfully Submitted.
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                                  <button type="button" onclick="location.href='print-course'" class="btn btn-outline-primary">Yes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
   
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->


  <footer class="footer footer-static footer-light navbar-border">
     <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; <?php echo date("Y");?> <a class="text-bold-800 grey darken-2" href="https://webtechfit.com"
        target="_blank">WEBTECH </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"> Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/ui/headroom.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
   <script src="<?php echo"$base_url";?>/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/tables/datatables/datatable-basic.js"
  type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
</body>
</html>




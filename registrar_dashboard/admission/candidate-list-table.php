<?php include("../include/header.php");

unset($_SESSION["admin_app_id"]);
?>

  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
        <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Welcome To ASSCOED NCE Portal</h3>
         
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
  



  <?php include("../include/sidebar.php");?>

      <div class="content-body">
       
        <!-- Column selectors table -->
        <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">New Candidates Table</h4>
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
                   <?php 

                    if (isset($_SESSION['candidatemsg'])) 
                    {
                      
                      echo '
			                <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["candidatemsg"].'
                        </div>

			              ';
                      
                      unset($_SESSION['candidatemsg']);

                    }

                  
                     ?>
                    <table class="table table-striped table-bordered dataex-html5-selectors">
                      <thead>
                         <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>UTME No.</th>
                            <th>Application ID</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Marital</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>College of Choice</th>
                            <th>Jamb Score</th>
                            <th>School</th>
                            <th>Department</th>
                            <th>Apply Method</th>
                            <th>PINS Used</th>
                            <th>Session</th>
                            <th>Admission Status</th>
                            <th>Form Status</th>
                            <th style="width: 200px">Admission Action</th>
                            <th style="width: 200px">Edit & Preview</th>
                            <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
<?php

$sn = 0;
$sql = "SELECT * FROM applicationform ";
$qsql = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($qsql)){
$id = $row['ID'];
$email = $row['email'];
$app_id = $row['application_id'];
$sn++;
 $sqlcourse_id ="SELECT * FROM course where course_id='$row[Department]'";
                        $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
                        $rscourse_id = mysqli_fetch_array($qsqlcourse_id);

$sqlschool_id ="SELECT * FROM school where school_id='$row[School]'";
$qsqlschool_id = mysqli_query($con,$sqlschool_id);
$rsschool_id = mysqli_fetch_array($qsqlschool_id);

?>                       
                        <tr>
                          <td><?php echo"$sn";?></td>
                         <td><?php echo $row['FirstName'];?> <?php echo $row['MiddleName'];?> <?php echo $row['LastName'];?></td>
                         <td><?php echo $row['Utmeno'];?></td>
                         <td><?php echo $row['Application_id'];?></td>
                         <td><?php echo $row['Dob'];?></td>
                         <td><?php echo $row['Gender'];?></td>
                         <td><?php echo $row['Marital'];?></td>
                         <td><?php echo $row['Country'];?></td>
                         <td><?php echo $row['State'];?></td>
                         <td><?php echo $row['City'];?></td>
                         <td><?php echo $row['Address'];?></td>
                         <td><?php echo $row['PhoneNumber'];?></td>
                         <td><?php echo $row['Email'];?></td>
                         <td><?php echo $row['CollegeChoice'];?></td>
                         <td><?php echo $row['JambScore'];?></td>
                         <td><?php echo $rsschool_id['schoolname'];?></td>
                         <td><?php echo $rscourse_id['coursename'];?></td>
                         <td><?php echo $row['JambOption'];?></td>
                         <td><?php echo $row['Pin'];?></td>
                         <td><?php echo $row['Session'];?></td>
                         <td><?php echo $row['Admission'];?> </td>
                         <td><?php echo $row['Status'];?></td>
                         <td><div class="row">
                            <div class="col-md-6">
                           <a href="reg-deleting?accept=<?php echo $row['Application_id'];?>" class="btn btn-primary btn-round"> Accept</a></div>
                            <br/>
                           <div class="col-md-6">
                           <a href="reg-deleting?unaccept=<?php echo $row['Application_id'];?>" class="btn btn-danger btn-round">Unaccept</a></div>
                         </div> </td>

  
                         <td>
                          <div class="row">
                            <div class="col-md-6"><a href="reg-edit-candidate-data/<?php echo $row['Application_id'];?>" class="btn btn-info btn-round"> Edit</a></div>

                             <div class="col-md-6"><a href="reg-preview-results?app_id=<?php echo $row['Application_id'];?>" class="btn btn-success btn-round"> View Results</a></div>

                          </td>


                         <td><a href="reg-deleting?can_del=<?php echo $row['Application_id'];?>" class="btn btn-danger btn-round"> Delete</a></td>

                     </td>
                        </tr>
                      </tbody>

                        <?php } ?>

                      <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>UTME No.</th>
                            <th>Application ID</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Marital</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>College of Choice</th>
                            <th>Jamb Score</th>
                            <th>School</th>
                            <th>Department</th>
                            <th>Apply Method</th>
                            <th>PINS Used</th>
                            <th>Session</th>
                            <th>Admission Status</th>
                            <th>Form Status</th>
                            <th style="width: 200px">Admission Action</th>
                            <th style="width: 200px">Edit & Preview</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ Column selectors table -->
       
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

  <!-- BEGIN MODERN JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js"
  type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
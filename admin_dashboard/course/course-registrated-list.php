<?php include("../include/header.php");?>

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
                  <h4 class="card-title">Course Registered Table</h4>
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

                    if (isset($_SESSION['biodata_del'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["biodata_del"].'
                        </div>

                    ';
                      
                      unset($_SESSION['biodata_del']);

                    }

                  
                     ?>
                    <table class="table table-striped table-bordered dataex-html5-selectors">
                      <thead>
                         <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Matric</th>
                            <th>School</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Semester</th>
                            <th>Session</th>
                            <th>Edit</th>
                          </tr>
                      </thead>
                      <tbody>
<?php
$sn=0;
$sqlcs = "SELECT * FROM course_registration_form ";
$qsqlcs = mysqli_query($con,$sqlcs);
while($rowcs = mysqli_fetch_array($qsqlcs)){
$id = $rowcs['ID'];
$matric = $rowcs['Matric'];
$sn++;

$sqlbcs = "SELECT * FROM  biodata WHERE matric='$matric'";
if(!$qsqlbcs=mysqli_query($con,$sqlbcs))
{
    echo mysqli_error($con);
}
$rsbcs = mysqli_fetch_array($qsqlbcs);


$sqlcourse_idcs ="SELECT * FROM course where course_id='$rsbcs[department]'";
                        $qsqlcourse_idcs = mysqli_query($con,$sqlcourse_idcs);
                        $rscourse_idcs = mysqli_fetch_array($qsqlcourse_idcs);

$sqlschoolcs ="SELECT * FROM school where school_id='$rsbcs[school]'";
                        $qsqlschoolcs = mysqli_query($con,$sqlschoolcs);
                       $rsschoolcs = mysqli_fetch_array($qsqlschoolcs);

?>                    
                        <tr>
                            <td><?php echo"$sn";?></td>
                            <td><?php echo $rsbcs["fname"];?> <?php echo $rsbcs["mname"];?> <?php echo $rsbcs["lname"];?></td>
                            <td><?php echo"$matric";?></td>
                            <td><?php echo $rsschoolcs["schoolname"];?></td>
                            <td><?php echo $rscourse_idcs["coursetype"];?></td>
                            <td><?php echo $rowcs["Level"];?> Level</td>
                            <td><?php echo $rowcs["Semester"];?> Semester</td>
                            <td><?php echo $rowcs["Session"];?></td>
                            <td><a href="edit-student-courses/<?php echo $rowcs['ID'];?>" class="btn btn-info btn-round"> Edit</a>
                          </tr>
                          <?php } ?>
                      </tbody>

                        

                      <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Matric</th>
                            <th>School</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Semester</th>
                            <th>Session</th>
                            <th>Edit</th>
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
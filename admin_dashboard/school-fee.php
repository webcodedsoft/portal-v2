<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("include/header.php");?>

 <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/tables/datatable/datatables.min.css">


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
  



  <?php include("include/sidebar.php");?>


      <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="horizontal-form-layouts">
         
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="horz-layout-colored-controls">Manage School Fee</h4>
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
                <div class="card-content collpase show">

                  <?php 

                    if (isset($_SESSION['schmesg'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["schmesg"].'
                        </div>

                    ';
                      
                      unset($_SESSION['schmesg']);

                    }

                  
                     ?>

                  <div class="card-body">
                   
                   <form action="portal-setting" class="form form-horizontal" enctype="multipart/form-data" method="post">
                      <div class="form-body">
                        <h4 class="form-section"><i class="la la-eye"></i> Manage School Fee</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">Fee Name</label>
                              <div class="col-md-9">
                                <input type="text" id="userinput1" required="" class="form-control border-primary" placeholder="Enter Fee Name"
                                name="feename">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2">Fee Amount</label>
                              <div class="col-md-9">
                                <input type="text" id="userinput2" required="" class="form-control border-primary" placeholder="Enter Fee Amount"
                                name="amount">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput3">Account Number</label>
                              <div class="col-md-9">
                                <input type="text" id="userinput3" required="" class="form-control border-primary" placeholder="Enter Account Number"
                                name="accountno">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Bank Name</label>
                              <div class="col-md-9">
                                <input type="text" id="userinput4" required="" class="form-control border-primary" placeholder="Enter Bank Name"
                                name="bankname">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput3">Fee Level</label>
                              <div class="col-md-9">
                                <select class="form-control input" required="" name="level" id="xLargeSelect">
                                <option selected disabled> Select Level</option>
                                <option value="100 Level"> 100 Level</option>
                                <option value="200 Level"> 200 Level</option>
                                <option value="300 Level"> 300 Level</option>
                              </select>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                       
                      </div>
                      <div class="form-actions right">
                        <button type="button" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" name="submitfee" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> Save
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </section>
        <!-- // Basic form layout section end -->







          <section id="file-export">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
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
                   
                    <table class="table table-striped table-bordered file-export">
                      <thead>
                        <tr>
                          <td>S/N</td>
                          <th>FEES</th>
                          <th>AMOUNT</th>
                          <th>ACCOUNT NO</th>
                          <th>BANK</th>
                          <th>LEVEL</th>
                          <th>DELETE</th>
                        </tr>
                      </thead>
                      <tbody>

<?php

$id=0;
$sql = "SELECT * FROM school_fee ORDER BY FeeName DESC ";
$qsql = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($qsql)){
$school_id = $row["ID"];
$id++;
?>                       
      
                        <tr>
                            <td><?php echo "$id";?></td>
                            <td><?php echo $row["FeeName"] ;?></td>
                            <td><?php echo $row["Amount"] ;?></td>
                            <td><?php echo $row["AccountNo"] ;?></td>
                            <td><?php echo $row["BankName"] ;?></td>
                            <td><?php echo $row["Level"] ;?></td>
                            <td><a data-toggle="modal"
                          data-target="#wobble<?php echo $school_id;?>" data-action="delete"><i class="ft-x"></i></a></td>

                           <div class="modal animated wobble text-left" id="wobble<?php echo $school_id;?>" tabindex="-1" role="dialog"
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
                                  
                                  <h5>Are you sure you want to delete this?</h5>
                                  <div class="alert alert-success" role="alert">
                                    <span class="text-bold-600"><h3>?</h3></span> Your Selected School Fee Will be Deleted if You continue.
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                                  <a href="deleting?fee_id=<?php echo $school_id;?>"><button type="button" onclick="location.href='deleting?fee_id=<?php echo $school_id;?>'" class="btn btn-outline-primary">Yes</button></a>
                                </div>
                              </div>
                            </div>
                          </div></td>
                        </tr>
<?php } ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>S/N</td>
                          <th>FEES</th>
                          <th>AMOUNT</th>
                          <th>ACCOUNT NO</th>
                          <th>BANK</th>
                          <th>LEVEL</th>
                          <th>DELETE</th>
                        </tr>
                      </tfoot>
                    </table>
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
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/buttons.flash.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/tables/datatables/datatable-advanced.js"
  type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
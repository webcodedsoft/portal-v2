<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("include/header.php");

unset($_SESSION["fname"]);
unset($_SESSION["mat"]);
?>
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
        <!-- eCommerce statistic -->
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"><?php echo"$std100";?></h3>
                      <h6>No. of Students in 100 Level</h6>
                    </div>
                    <div>
                      <i class="icon-graduation info font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: <?php echo"$std100";?>%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning"><?php echo"$std200";?></h3>
                      <h6>No. of Students in 200 Level</h6>
                    </div>
                    <div>
                      <i class="icon-graduation warning font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: <?php echo"$std100";?>%"
                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="success"><?php echo"$std300";?></h3>
                      <h6>No. of Students in 300 Level</h6>
                    </div>
                    <div>
                      <i class="icon-graduation success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: <?php echo"$std100";?>%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger"><?php echo"$incoming";?></h3>
                      <h6>No. of Incoming Students</h6>
                    </div>
                    <div>
                      <i class="icon-graduation danger font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: <?php echo"$std100";?>%"
                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ eCommerce statistic -->
        <!-- Products sell and New Orders -->
        <div class="row match-height">
          <div class="col-xl-8 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Course Registration Seetings</h4>
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
                <div class="card-content">
                  <div class="card-body">
                  <?php 

                    if (isset($_SESSION['regsettingmsg'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["regsettingmsg"].'
                        </div>

                    ';
                      
                      unset($_SESSION['regsettingmsg']);

                    }

                  
                     ?>
<form action="reg-portal-setting" class="form-horizontal" enctype="multipart/form-data" method="post">
        <div class="table-responsive">
          <table class="table color-table info-table">
            <thead>
                <tr>
                    <th>100 Level</th>
                    <th>200 Level</th>
                    <th>300 Level</th>
                    <th>Obtain Form</th>
                </tr>
            </thead>
            <tbody>
              <tr>                
                <td>
                  <div class="row skin skin-flat">
                  <fieldset>
                  <input name="first100" type="radio" value="ON" id="radio_1" class="radio-col-red"<?php echo"$first100"=="ON" ? "checked" : "";?> /> <label for="radio_1"> <b>ON</b> &nbsp;</label> 
                  </fieldset>
                  
                  <fieldset>
                  <input name="first100" type="radio" id="radio_2" value="OFF" class="radio-col-amber"<?php echo"$first100"=="OFF" ? "checked" : "";?> /> <label for="radio_2"> <b>OFF</b> &nbsp;</label>
                  </fieldset>
                  </div>
                </td>


                <td>
                  <div class="row skin skin-flat">
                  <fieldset>
                  <input name="first200" type="radio" id="radio_7" value="ON" class="radio-col-red"<?php echo"$first200"=="ON" ? "checked" : "";?> /> <label for="radio_7"> <b>ON</b> &nbsp;</label>
                  </fieldset>
                  
                  <fieldset>
                  <input name="first200" type="radio" value="OFF" id="radio_20" class="radio-col-amber"<?php echo"$first200"=="OFF" ? "checked" : "";?> /> <label for="radio_20"> <b>OFF</b> &nbsp;</label>
                 </fieldset>
                  </div>         
                </td>
                                  


                <td>
                  <div class="row skin skin-flat">
                  <fieldset>
                  <input name="first300" type="radio" id="radio_23" value="ON" class="radio-col-red"<?php echo"$first300"=="ON" ? "checked" : "";?> /> <label for="radio_23"> <b>ON</b> &nbsp;</label>
                  </fieldset>
                  
                  <fieldset>
                  <input name="first300" type="radio" id="radio_24" value="OFF" class="radio-col-amber"<?php echo"$first300"=="OFF" ? "checked" : "";?> /> <label for="radio_24"> <b>OFF</b> &nbsp;</label>
                  </fieldset>
                  </div>
                </td>



                <td>
                <div class="row skin skin-flat">
                  <fieldset>
                  <input id="radio2" name="obtainform" type="radio" value="ON" class="custom-control-input"<?php echo"$obtainform"=="ON" ? "checked" : "";?> /> <label for="radio_23"> <b>ON</b> &nbsp;</label> 
                  </fieldset>
                  
                  <fieldset>
                  <input id="radio2" name="obtainform" type="radio" value="OFF" class="custom-control-input"<?php echo"$obtainform"=="OFF" ? "checked" : "";?> /> <label for="radio_24"> <b>OFF</b> &nbsp;</label>
                  </fieldset>
                  </div>

                </td>

              </tr>
                             
            </tbody>

          </table>
         
</div>
          <div class="row">
            <div class="col-md-6">
                  <label>Select Date: </label>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <span class="la la-calendar-o"></span>
                            </span>
                          </div>
                        <input type='text' required="" value="<?php echo"$coursecloseingdate";?>" name="timer" class="form-control pickadate" placeholder="Basic Pick-a-date" />
                      </div>
                  </div>
            </div>
                <div class="col-md-6">
                  <label>Select Semester: </label>
                  <div class="form-group">
                   <fieldset class="form-group">
                      <select class="form-control" name="semester" required="" id="basicSelect">
                        <option value="" selected > Select Semester</option>
                        <option value="First"> First Semester</option>
                        <option value="Second"> Second Semester</option>
                      
                      </select>
                    </fieldset>
                  </div>
                </div>


            <div class="col-md-6">
              <div class="form-actions">
                <button type="submit" name="regsettingbtn" class="btn btn-warning"> Save Changes
                </button>
            </div>
            </div>
        </div>
       </form>             
      </div>
    </div>
  </div>
  </div>





           <div class="col-xl-4 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Create New Session</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div id="new-orders" class="media-list position-relative">
<?php 

                    if (isset($_SESSION['sessioncrt'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["sessioncrt"].'
                        </div>

                    ';
                      
                      unset($_SESSION['sessioncrt']);

                    }

                  
                     ?>
<form action="reg-portal-setting" class="form-horizontal" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <label>Enter Session: </label>
                    <div class="form-group">
                      <input type="text" placeholder="2000/2010" required="" name="sessionsettings" class="form-control">
                    </div>
                    <input type="submit" name="sessionbtn" class="btn btn-outline-primary btn-lg" value="Create">
                  </div>
</form>
                  <div class="table-responsive">
                    <table id="new-orders-table" class="table table-hover table-xl mb-0">
                      <thead>
                        <tr>
                          <th class="border-top-0">S/N</th>
                          <th class="border-top-0">Session History</th>
                          <td class="border-top-0">Delete</td>
                        </tr>
                      </thead>
                      <tbody>
                       
<?php

$id=0;
$sql = "SELECT * FROM session_table ORDER BY ID DESC LIMIT 3";
$qsql = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($qsql)){

$id++;
?>                       
                        <tr>
                          <td><?php echo $id;?></td>
                          <td><?php echo $row['Session'];?></td>
                          <td><a data-toggle="modal"
                          data-target="#wobble<?php echo"$id";?>" data-action="delete"><i class="ft-x"></i></a></td>

                           <div class="modal animated wobble text-left" id="wobble<?php echo"$id";?>" tabindex="-1" role="dialog"
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
                                    <span class="text-bold-600"><h3>?</h3></span> Your Selected Session Will be Deleted if You continue.
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                                  <button type="button" onclick="location.href='reg-deleting?ses_id=<?php echo"$id";?>'" class="btn btn-outline-primary">Yes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                                               
<?php } ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
     </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("include/footer.php");?>


  
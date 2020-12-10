<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("include/header.php");

if (isset($_GET["clear"])) {
unset($_SESSION["fname"]);
unset($_SESSION["mat"]);
}
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
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
          
          <div class="row justify-content-md-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-card-center">Student Password Changing Page</h4>
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
                  <div class="card-body">
                  	<?php
                  	if (isset($_SESSION['passchangeerr'])) 
                    {
                      
                      echo '
                      <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Snap!</strong> '.$_SESSION["passchangeerr"].'
                        </div>

                    ';
                      
                      unset($_SESSION['passchangeerr']);

                    }

                  
                  if (isset($_SESSION['passchange'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["passchange"].'
                        </div>

                    ';
                      
                      unset($_SESSION['passchange']);

                    }


                     ?>
                    <div class="card-text">
                      <p style="color: red">Search with Students Matric Number or Application ID</p>
                    </div>
                    <form class="form form-horizontal form-bordered" autocomplete="off" method="post" action="data-file">
                      <div class="form-body">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput1">Matric No./Application ID</label>
                          <div class="col-md-9">
                            <input type="text" id="eventRegInput1" value="<?php echo !empty($_SESSION["mat"]) ? $_SESSION["mat"] : "";?>" <?php echo !empty($_SESSION["mat"]) ? "readonly" : "";?> style="text-transform: uppercase;" class="form-control" placeholder="Matric No./Application ID" name="matapp">
                          </div>
                        </div>

                        <?php
                        if (!empty($_SESSION["fname"])) {
                        ?>
                        <div style="display: block;">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput2">Student Name</label>
                          <div class="col-md-9">
                            <input type="text" id="eventRegInput2"  value="<?php echo $_SESSION["fname"];?>" readonly="" class="form-control" placeholder="Student Name" name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput3">New Password</label>
                          <div class="col-md-9">
                            <input type="text" required="" maxlength="10" minlength="4" id="eventRegInput3" class="form-control" placeholder="New Password"
                            name="newpassword">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput4">Confirm New Password</label>
                          <div class="col-md-9">
                            <input type="text" required="" maxlength="10" minlength="4" id="eventRegInput4" class="form-control" placeholder="Confirm New Password"
                            name="connewpassword">
                          </div>
                          <center><small style="color: red">Max Length of password must not greater than 10 and minimum is 4</small></center>
                        </div>
                      </div>
                      <?php
                        }
                        ?>

                        
                      </div>
                      <div class="form-actions center">
                      	 <?php
                        if (!empty($_SESSION["fname"])) {
                        ?>
                        <button onclick="location.href='?clear'" name="clear" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Clear
                        </button>
                     <?php
                 		}
                 		else
                 		{
                 		?>
                 		<button type="submit" name="searchbtn" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Search
                        </button>
                 		<?php
                 		}
                 		?>
                        <button type="submit" name="changepass" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> Change
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
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("include/footer.php");?>
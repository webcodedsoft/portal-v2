<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("include/header.php");?>


  <!-- fixed-top-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/login-register.css">
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

      <?php include("../include/sidebar.php");?>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="images/asslogo.png" >
                  </div>
                  <p class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>ASSCOED LOGIN</span>
                  </p>

                  <?php 

                    if (isset($_SESSION['sign_up_sign_in_error'])) 
                    {
                      
                      echo '
			                <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["sign_up_sign_in_error"].'
                        </div>

			              ';
                      
                      unset($_SESSION['sign_up_sign_in_error']);

                    }

                  
                     ?>
                     
                </div>
                <div class="card-content">
                 
                  <div class="card-body pt-0">
                    <form class="form-horizontal" autocomplete="off" method="post" action="sign-in-form" validate>
                      <fieldset class="form-group position-relative ">
                      	<label>Enter Application ID or Matric No</label>
                        <input type="text" class="form-control input-lg" name="matno_or_app_id" id="user-name" style="text-transform: uppercase;" placeholder="Enter Application ID or Matric No"
                        required>
                       
                      </fieldset>
                      <fieldset class="form-group position-relative">
                      	Enter Your Password
                        <!-- <input type="password" maxlength="10" minlength="4" class="form-control input-lg" name="password" id="user-password" placeholder="Enter Password"
                        required> -->
                       
                       <input type="password" class="form-control input-lg" name="password" id="user-password" placeholder="Enter Password"
                        required>

                      </fieldset>
                      <button type="submit" name="loginbtn" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                  <div class="card-body pb-0">
                    <p class="text-center">Forget Password? <a href="<?php echo"$base_url";?>/forget-password" class="card-link">Recover Password</a></p>
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
<?php include("include/footer.php");?>

 <script src="<?php echo"$base_url";?>/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
<script src="<?php echo"$base_url";?>/app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
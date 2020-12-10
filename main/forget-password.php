<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

session_start();
include("include/header.php");


$pass = $_SESSION["output"]; 
$passerr = $_SESSION["outputerr"]; 
?>


  <!-- fixed-top-->
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/pages/login-register.css">


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
                    <span>PASSWORD RECOVER</span>
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
                  <div class="card-body">
                    <form class="form-horizontal" autocomplete="off" method="post" action="sign-in-form" validate>
                      <fieldset class="form-group position-relative ">
                        <label id="department">Enter Application ID or Matric No</label>
                        <input type="text" class="form-control input-lg" name="matno_or_app_id" id="matno_or_app_id" style="text-transform: uppercase;" placeholder="Enter Application ID or Matric No"
                        >
                      </fieldset>
						

						<input type="hidden" class="form-control input-lg" value="<?php echo"$pass";?>" id="output" style="text-transform: uppercase;" 
                        >

                        <input type="hidden" class="form-control input-lg" value="<?php echo"$passerr";?>" id="outputerr" style="text-transform: uppercase;" 
                        >


                      <fieldset class="form-group position-relative ">
                        <label>Enter Sponsor Phone Number</label>
                        <input type="text" onkeypress="return OnlyNumber(event)" class="form-control input-lg" name="sponsor_num" id="sponsor_num"  placeholder="Enter Sponsor Phone Number"
                        >
                      </fieldset>

                      <button type="submit" name="pass-recover" id="pass-recover" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i> Recover Password</button>
                    </form>
                  </div>
                </div>
                <div class="card-footer border-0">
                  
                  <p class="float-sm-right text-center">Know Login Details ? <a href="<?php echo"$base_url";?>/login" class="card-link">Login</a></p>
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
<script src="<?php echo"$base_url";?>/app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
<script src="<?php echo"$base_url";?>/app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function(){

$('#pass-recover').on('click',function(){

			if ($('#matno_or_app_id').val() == "" && $('#sponsor_num').val() == "") 
			{
				swal("Kindly Enter Your Matric Number or App ID and Sponsor Phone Number");
			}


});
		
			if($('#output').val() != ""){

				$msg = $('#output').val();

				swal({
		    title: "Your Password is "+$msg,
		    text: "Kindly write it down this frame will close in 4 seconds",
		    icon: "warning",
		     timer: 4000,
		    buttons: {
                cancel: {
                    text: "No, cancel pls!",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: false,
                },
                confirm: {
                    text: "Yes, delete it!",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false
                }
		    }
		})
		.then((isConfirm) => {
		    if (isConfirm) {
		        swal("Deleted!", "Are you sure you want to delete this message?", "success");
		        $('#output').val("");
		        $('#matno_or_app_id').val();
		        $('#sponsor_num').val();

		        <?php unset($_SESSION["output"]);?>
		    } else {
		        swal("Cancelled", "Message successfully cancel the message", "error");
		         $('#output').val("");
		         $('#output').val("");
		        $('#matno_or_app_id').val();
		        $('#sponsor_num').val();
		        <?php unset($_SESSION["output"]);?>
		    }
		});


				//
			}
			else if ($('#outputerr').val()!= "") 
			{
				swal({   title: "Opps Error!",   text: "Details Not match and this will close in 3 seconds.",   timer: 3000,   showConfirmButton: false });
				<?php unset($_SESSION["outputerr"]);?>
			}
			//	swal("Kindly Enter Your Sponsor Phone Number");
	
});
</script>
<?php include("../include/header.php");?>
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
        <!-- horizontal grid start -->
        <section class="horizontal-grid" id="horizontal-grid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Admission Status Checker</h4>
                  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>
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
                  <div class="col-xl-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <center><label class="card-title" for="iconLeft1"><h2>Enter Your Phone Number</h2></label></center>
                </div>
                <div class="card-block">
                  <div class="card-body">


					<?php
			        if (isset($_SESSION['invalidphone'])) 
			            {
			              
			              echo '
			                <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["invalidphone"].'
                        </div>

			              ';
			              
			              unset($_SESSION['invalidphone']);

			            }

			                     
			          ?>

					


                   <form action="admission-checker-data" class="form-horizontal" enctype="multipart/form-data" method="post">
                    <fieldset class="form-group position-relative">
                      <input type="text" onkeypress="return OnlyNumber(event)" maxlength="11" name="phone" required="" class="form-control form-control-xl input-xl" id="iconLeft1" placeholder="Enter Your Phone Number">
                      <div class="form-control-position">
                        <i class="icon-pencil info font-medium-4"></i>
                      </div>
                      <small> Enter the Phone number you used to register </small>
                    </fieldset>

                     <div class="form-actions">
                        <div class="text-right">
                          <button type="submit" name="validateadmission" class="btn btn-primary">Validate <i class="ft-refresh-cw position-right"></i></button>
                         
                        </div>
                      </div>
                    </form>


                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- horizontal grid end -->
    
       
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 <?php include("../include/footer.php");?>
</html>
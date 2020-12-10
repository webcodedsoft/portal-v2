<?php include("../include/header.php");



?>
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
        <!-- Form repeater section start -->
        <section id="form-repeater">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">Admission Validating</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
                  <div class="card-body">
                   <?php 

                    if (isset($_SESSION['validaterr'])) 
                    {
                      
                      echo '
			                <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["validaterr"].'
                        </div>

			              ';
                      
                      unset($_SESSION['validaterr']);

                    }

                  
                     ?>
                     <form action="admission-checker-data" autocomplete="off" class="form row" enctype="multipart/form-data" method="post">
                      <div class="form-group col-md-6 mb-2">
                        <input type="text" class="form-control" maxlength="11" required=""  placeholder="Enter Application ID " style="text-transform: uppercase;" name="appid">
                      </div>
                      <div class="form-group col-md-6 mb-2">
                        <input type="text" class="form-control" required="" maxlength="11" onkeypress="return OnlyNumber(event)" placeholder="Enter Phone Number" name="phonenumber">
                      </div>
                      <div class="form-group col-md-6 mb-2">
                        <input type="text" value="<?php echo"$session";?>" required="" readonly="" class="form-control" placeholder="Session" name="session">
                      </div>
                      <div class="form-group col-md-6 mb-2">
                        <input type="text" class="form-control" value="100 Level" required="" readonly="" placeholder="Level" name="level">
                      </div>
                    
                     <div class="form-group overflow-hidden">
                        <div class="col-12">
                          <button name="validatebtn" class="btn btn-primary">
                            <i class="ft-plus"></i> Validate
                          </button>
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
   <?php include("../include/footer.php");?>
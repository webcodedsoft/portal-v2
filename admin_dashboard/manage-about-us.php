<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("include/header.php");?>
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
   
      
      
        <!-- Basic Horizontal Timeline -->
        <div class="row match-height">


          <div class="col-xl-12 col-lg-12">
  <form action="portal-setting" class="form-horizontal" enctype="multipart/form-data" method="post">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">About Us</h4>
              </div>
              
              <div class="card-content">
                <?php 

                    if (isset($_SESSION['abtmesg'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["abtmesg"].'
                        </div>

                    ';
                      
                      unset($_SESSION['abtmesg']);

                    }

                  
                     ?>
                <div class="card-body">
                  
                    <b>
                      About Us Content
                    </b>
                    <fieldset class="form-group position-relative">
                      <textarea class="form-control border-primary" name="abcontent" placeholder="About us content here" id="tareaColor2" rows="3"><?php echo"$aboutus";?></textarea>
                    </fieldset>
                </div>
              </div>
              <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                <span class="float-right">
                  <div class="form-actions">
                <button type="submit" name="aboutbtn" class="btn btn-warning"> Submit Changes
                </button>
            </div>
                </span>
              </div>
            </div>
            </form>
          </div>

        </div>
        <!--/ Basic Horizontal Timeline -->



<!-- Contact Us -->


 <div class="row match-height">


          <div class="col-xl-12 col-lg-12">
  <form action="portal-setting" class="form-horizontal" enctype="multipart/form-data" method="post">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Contact Us</h4>
              </div>
              
              <div class="card-content">
                <?php 

                    if (isset($_SESSION['conmesg'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["conmesg"].'
                        </div>

                    ';
                      
                      unset($_SESSION['conmesg']);

                    }

                  
                     ?>
                <div class="card-body">
                  
                    <b>
                      Contact Us Number
                    </b>
                    <fieldset class="form-group position-relative">
                      <input class="form-control border-primary" value="<?php echo"$contactus";?>" name="connumber" placeholder="Enter Contact Us Phone Number Here" id="tareaColor2" rows="3"></input>
                    </fieldset>
                </div>
              </div>
              <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                <span class="float-right">
                  <div class="form-actions">
                <button type="submit" name="contactbtn" class="btn btn-warning"> Submit Changes
                </button>
            </div>
                </span>
              </div>
            </div>
            </form>
          </div>

        </div>


        <!-- End of Contact Us -->
      </div>
    </div>
  </div>
</div>
</div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("include/footer.php");?>
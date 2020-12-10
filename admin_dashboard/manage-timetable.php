<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("include/header.php");?>

<link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/photoswipe.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/default-skin/default-skin.css">

  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/pages/gallery.css">
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
        <!-- Description -->
    <section id="dropzone-examples">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Timetable Image Here</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">

                  <div class="card-body">
                     <form action="<?php echo"$base_url";?>/school-table-time" class="dropzone dropzone-area" id="dpz-single-file">

                      <div class="dz-message">Drop Timetable Image Here To Upload</div>
                    </form>
                    <small style="color: red">Only png,.jpg,.jpeg is allow</small>
    

                    
    
        <br/><br/>
                <center>
                   <button type="button" id="passportbtn" class="btn btn-float btn-float-lg btn-pink"><i class="la la-cloud-upload"></i><span>Upload</span></button>
                </center>

                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
        <!--/ Description -->



    <!-- School Calender -->

        <section id="dropzone-examples">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload School Calender Image Here</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">

                  <div class="card-body">
                     <form action="<?php echo"$base_url";?>/school-table-time" class="dropzone dropzone-area" id="dpz-file-limits">

                      <div class="dz-message">Drop School Calender Image Here To Upload</div>
                    </form>
                    <small style="color: red">Only png,.jpg,.jpeg is allow</small>
    

                    
    
        <br/><br/>
                <center>
                   <button type="button" id="jambbtnup" class="btn btn-float btn-float-lg btn-pink"><i class="la la-cloud-upload"></i><span>Upload</span></button>
                </center>

                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
        <!--/ End of School Calender -->



      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("include/footer.php");?>

<script src="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js"
  type="text/javascript"></script>

   <script src="<?php echo"$base_url";?>/app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js"
  type="text/javascript"></script>
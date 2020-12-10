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
        <!-- Dropzone section start -->
        <section id="dropzone-examples">
          
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Slide Images</h4>
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
                     <form action="portal-setting" class="dropzone dropzone-area" id="dp-accept-files">
                      <div class="dz-message">Drop Files Here To Upload</div>
                    </form>

                    <small style="color: red">Only png,.jpg,.jpeg is allow</small>
    
    
				<br/><br/>
				 <button type="button" id="sliderup" class="btn btn-float btn-float-lg btn-pink"><i class="la la-cloud-upload"></i><span>Upload</span></button>

                  </div>
                </div>
              </div>
            </div>
          </div>
          
         <div class="row">
                    <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Slider History</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <?php 

                    if (isset($_SESSION['sl_id_del'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["sl_id_del"].'
                        </div>

                    ';
                      
                      unset($_SESSION['sl_id_del']);

                    }

                  
                     ?>
              <div class="card-content">
                <div class="table-responsive">
                  <table id="recent-orders" class="table table-hover table-xl mb-0">
                    <thead>
                        <tr>
                            <th class="border-top-0">S/N</th>
                            <th class="border-top-0">Images</th>
                            <th class="border-top-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$sn=0;
$sql = "SELECT * FROM site_settings where ID='1' ";
$qsql = mysqli_query($con,$sql);
$row = mysqli_fetch_array($qsql);
$slider = $row['Slider'];

$slider_ex = explode(",", $slider);
$i=0;
foreach ($slider_ex as $slider ) {
if ($i++ ==4) break;

$sn++;
?>                        
                     <tr>
                        <td><?php echo $sn;?></td>
                        <td><img style="width: 20%; height: 50%" src="<?php echo"$base_url";?>/images/slider/<?php echo"$slider";?>"></td>

                        <td><a href="deleting?del_slide=<?php echo"$slider";?>"><i class="ft-x"></i></a></td>

                        

                    </tr>
                               <?php } ?>                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
         </div>
        </section>
        <!-- // Dropzone section end -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("include/footer.php");?>
<?php include("include/header.php");


unset($_SESSION["app_id"]);
unset($_SESSION['pin']);
unset($_SESSION['biodatasession']);
unset($_SESSION['course_id']);
unset($_SESSION["coursedata"]);
unset($_SESSION["courseserial"]);
unset($_SESSION["course_result_id"]);
unset($_SESSION["news_ss"]);
?>


 <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/css/tables/datatable/datatables.min.css">
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


      <?php include("include/sidebar.php");?>


      <div class="content-body">
        




<section id="html5">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Available Courses</h4>
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
                   <p class="card-text" style="color:black">
                      <center>
                        <h3>ASSANUSIYYAH COLLEGE OF EDUCATION, ODEOMU AVAILABLE COURSES</h3>
                      </center>
                    </p>
                      <table class="table table-striped table-bordered dataex-html5-export">
                        <thead>
                                                   <tr>
<th>School of Arts & SOS</th>
<th>School of Languages</th>
<th>School of ECCE & PES</th>
<th>School of Voc. & Tech.</th>
<th>School of Sciences</th>
<th></th>
 </tr>
                        </thead>
                        <tbody>
                        
                         
                        
                          <tr style="color:black">
                           <td>Islamic Studies / Social Studies</td>
                           <td>English / Arabic</td>
                           <td>Primary Education (Double Major)</td>
                           <td>Agricultural Education (Double Major)</td>
                           <td>Integrated Science / Computer Education</td>
                           <td>Computer Education / Mathematics</td>
                       </tr>
                       <tr style="color:black">
							<td>Islamic Studies / English</td>
							<td>English / Yoruba</td>
							<td>Early Childhood and Education (Double Major)</td>
							<td>Business Education (Accounting Option)c(Double Major)</td>
							<td>Integrated Science / Chemistry</td>
							<td>Mathematics / Chemistry</td>
							
						</tr>
                       <tr style="color:black">
							<td>Islamic Studies / Arabic</td>
							<td>English / Economic</td>
							<td></td>
							<td></td>
							<td>Integrated Science / Physics</td>
							<td>Mathematics / Physics</td>
					  </tr>
                       <tr style="color:black">
							<td>Islamic Studies / Economic</td>
							<td>English / Political Science</td>
							<td></td>
							<td></td>
							<td>Integrated Science / Mathematics</td>
							<td>Mathematics / Biology</td>
					  </tr>
                       <tr style="color:black">
							<td></td>
							<td>Islamic Studies / Political Science</td>
							<td></td>
							<td></td>
							<td>Integrated Science / Biology</td>
							<td></td>

					  </tr>
                       <tr style="color:black">
							<td></td>
							<td>Political Science / Economic</td>
							<td></td>
							<td></td>
							<td>Biology / Physics</td>
							<td></td>
					  </tr>
                       <tr style="color:black">
							<td></td>
							<td>English / Social Studies</td>
							<td></td>
							<td></td>
							<td>Chemistry / Physics</td>
							<td></td>
					  </tr>
                       <tr style="color:black">
							<td></td>
							<td>Yoruba / Arabic</td>
							<td></td>
							<td></td>
							<td>Chemistry / Biology</td>
							<td></td>
					  </tr>
                       <tr style="color:black">
							<td></td>
							<td>Yoruba / Political Science</td>
							<td></td>
							<td></td>
							<td>Computer Education / Chemistry</td>
							<td></td>
					  </tr>
					  <tr style="color:black">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Computer Education / Biology</td>
							<td></td>
					  </tr>
					  <tr style="color:black">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Computer Education / Physics</td>
							<td></td>
							</tr>
                        </tbody>
                        <tfoot>
                                                    <tr>
<th>School of Arts & SOS</th>
<th>School of Languages</th>
<th>School of ECCE & PES</th>
<th>School of Voc. & Tech.</th>
<th>School of Sciences</th>
<th></th>
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
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/ui/headroom.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/buttons.colVis.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js"
  type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
<?php include("../include/header.php");


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


      <?php include("../include/sidebar.php");?>


      <div class="content-body">
        

                  <section id="file-export">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
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
                        <h3>ASSANUSIYYAH COLLEGE OF EDUCATION, ODEOMU
                       IMPORTANT NOTICE ON SCHOOL FEES AND OTHER ACCREDITED FEES FOR <?php echo"$school_session";?>
                                                            ACADEMIC SESSION</h3>
                      </center>
                    </p>
                    <table class="table table-striped table-bordered file-export">
                      <thead>
                        <tr>
                          <td>S/N</td>
                          <th>FEES</th>
                          <th>AMOUNT</th>
                          <th>ACCOUNT NO</th>
                          <th>BANK</th>
                          <th>LEVEL</th>
                        </tr>
                      </thead>
                      <tbody>

<?php

if ($student_level == '100') {
  $student_next_level = '200 Level';
}
elseif ($student_level == '200') {
  $student_next_level = '300 Level';
}
elseif ($student_level = '300') {
  $student_next_level = '300 Level';
}

$id=0;
$sql = "SELECT * FROM school_fee WHERE Level ='$student_next_level' ORDER BY FeeName DESC";
$qsql = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($qsql)){
$school_id = $row["ID"];
$id++;
?>                       
      
                        <tr>
                            <td><?php echo "$id";?></td>
                            <td><?php echo $row["FeeName"] ;?></td>
                            <td><?php echo $row["Amount"] ;?></td>
                            <td><?php echo $row["AccountNo"] ;?></td>
                            <td><?php echo $row["BankName"] ;?></td>
                            <td><?php echo $row["Level"] ;?></td>
                           
                        </tr>
<?php } ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>S/N</td>
                          <th>FEES</th>
                          <th>AMOUNT</th>
                          <th>ACCOUNT NO</th>
                          <th>BANK</th>
                          <th>LEVEL</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <!-- File export table -->
       <!--  <section id="file-export">
         <div class="row">
           <div class="col-12">
             <div class="card">
               <div class="card-header">
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
                       <h3>ASSANUSIYYAH COLLEGE OF EDUCATION, ODEOMU
                      IMPORTANT NOTICE ON SCHOOL FEES AND OTHER ACCREDITED FEES FOR <?php echo"$school_session";?>
                                                           ACADEMIC SESSION</h3>
                     </center>
                   </p>
                   <table class="table table-striped table-bordered file-export">
                     <thead>
                       <tr>
                         <th>FEES</th>
                         <th>AMOUNT</th>
                         <th>ACCOUNT NO</th>
                         <th>BANK</th>
                         <th>LEVEL</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                           <td>School fees</td>
                           <td>38,500</td>
                           <td>2014459717</td>
                           <td>First Bank</td>
                           
                       </tr>
                       <tr>
                           <td>Medical fee</td>
                           <td>5,000</td>
                           <td>2031314453</td>
                           <td>First Bank</td>
                           
                       </tr>
                       <tr>
                           <td>ICT</td>
                           <td>5,000</td>
                           <td>2031314415</td>
                           <td>First Bank</td>
                           
                       </tr>
                       <tr>
                           <td>Admission Form Fee</td>
                           <td>3,000</td>
                           <td>2014841716</td>
                           <td>First Bank</td>
                           
                       </tr>
                       <tr>
                           <td>Acceptance Fee</td>
                           <td>5,000</td>
                           <td>20148141716</td>
                           <td>First Bank</td>
                           
                       </tr>
                       <tr>
                           <td>Screening / Post UTME</td>
                           <td>2,000</td>
                           <td>20148141716</td>
                           <td>First Bank</td>
                           
                       </tr>
                       <tr>
                           <td>Students Hand Book</td>
                           <td>2,000</td>
                           <td>2014459683</td>
                           <td>First Bank</td>
                           
                       </tr>
                       <tr>
                           <td>Matriculation Fee</td>
                           <td>3,500</td>
                           <td>2031314453</td>
                           <td>First Bank</td>
                           
                       </tr>
                       <tr>
                           <td>Orientation Fee</td>
                           <td>1,000</td>
                           <td>2031314453</td>
                           <td>First Bank</td>
                           
                       </tr>
                       <tr>
                           <td>Practical Fee (Science Students)</td>
                           <td>2,500</td>
                           <td>2031314453</td>
                           <td>First Bank</td>
                       </tr>
                     </tbody>
                     <tfoot>
                       <tr>
                         <th>FEES</th>
                         <th>AMOUNT</th>
                         <th>ACCOUNT NO</th>
                         <th>BANK</th>
                         <th>LEVEL</th>
                       </tr>
                     </tfoot>
                   </table>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </section> -->
        <!-- File export table -->
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
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/ui/headroom.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/buttons.flash.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/tables/datatables/datatable-advanced.js"
  type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
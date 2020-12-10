<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("../include/header.php");

unset($_SESSION["fname"]);
unset($_SESSION["mat"]);

$sel_session = $_GET["sel_session"];
$sel_level = $_GET["sel_level"];
$sel_semester = $_GET["sel_semester"];
$pn = $_GET['pn'];



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
  



     <?php include("../include/sidebar.php");?>


      <div class="content-body">
       
              <h4 class="text-uppercase">Students Result Compute</h4>
              


        <section id="form-repeater">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">Repeating Forms</h4>
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
                    <div class="repeater-default">
                      <div data-repeater-list="car">
                        <div data-repeater-item>
                          <form class="form row" method="GET" >
                            <div class="form-group mb-1 col-sm-12 col-md-3">
                              <label for="email-addr">Clearance Session</label>
                              <br>
                             <fieldset class="form-group position-relative">
                                <select class="form-control input-lg" required="" name="sel_session" id="LargeSelect">
                                  <option selected disabled>Select Clearance Session</option>
                                  <?php
                                  $sql = "SELECT Session FROM session_table ORDER BY ID DESC";
                                  $qsql = mysqli_query($con,$sql);
                                  while($rs = mysqli_fetch_array($qsql))
                                  {
                                  	if ($sel_session == $rs['Session']) {
                                  		echo "<option selected value='$rs[Session]'>$rs[Session]</option>";
                                  	}
                                  	else
                                  	{
                                  		echo "<option value='$rs[Session]'>$rs[Session]</option>";
                                  	}
                                  
                                  	}
                                  	?>
                                </select>
                            </fieldset>
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-3">
                              <label for="pass">Clearance Level</label>
                              <br>
                              <fieldset class="form-group position-relative">
                              <select class="form-control input-lg" required="" name="sel_level" id="LargeSelect">
                                <option selected disabled>Select Clearance Level</option>
                                <?php
                                	if ($sel_level == '100') {
                                	echo "<option selected value='100'>100</option>
		                                <option value='200'>200</option>
                                		<option value='300'>300</option>";
                                	}elseif ($sel_level == '200') {
                                		echo "<option value='100'>100</option>
		                                <option selected value='200'>200</option>
                                		<option value='300'>300</option>";
                                	}
                                	elseif ($sel_level == '300') {
                                		echo "<option value='100'>100</option>
		                                <option value='200'>200</option>
                                		<option selected value='300'>300</option>";
                                	}
                                	else
                                	{
										echo "<option value='100'>100</option>
		                                <option value='200'>200</option>
                                		<option value='300'>300</option>";
                                	}
                                	?>
                                
                              </select>
                            </fieldset>
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-3">
                              <label for="bio" class="cursor-pointer">Clearance Semester</label>
                              <br>
                              <fieldset class="form-group position-relative">
                              <select class="form-control input-lg" required="" name="sel_semester" id="LargeSelect">
                                <option selected disabled>Select Clearance Semester</option>
                                <?php
                                	if ($sel_semester == 'First') {
                                		echo "
                                		<option selected value='First'>First Semester</option>
		                                <option value='Second'>Second Semester</option>
		                                ";
                                	}
                                	elseif ($sel_semester == 'Second') {
                                		echo "
                                		<option value='First'>First Semester</option>
		                                <option selected value='Second'>Second Semester</option>
		                                ";
                                	}
                                	else
                                	{
                                		echo "
                                		<option value='First'>First Semester</option>
		                                <option value='Second'>Second Semester</option>
		                                ";
                                	}
                                	?>
                              </select>
                            </fieldset>
                            </div>

                            
                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                              <button type="submit" class="btn btn-danger" data-repeater-delete> <i class="ft-plus"></i> Search</button>
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
       <!-- Outline variants section start -->






       <!-- Result Page -->
       <section id="form-repeater">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">Result Compute</h4>
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
                    <div class="repeater-default">
                      <div data-repeater-list="car">
                        <div data-repeater-item>


 
                   <form action="admin-cours-registration" class="form row" validation="" enctype="multipart/form-data" method="POST">

                   	<input type="hidden" value="<?php echo"$sel_semester";?>" name="sel_semester">
                   	<input type="hidden" value="<?php echo"$sel_session";?>" name="sel_session">
                   	<input type="hidden" value="<?php echo"$sel_level";?>" name="sel_level">
                    <input type="hidden" value="<?php echo"$pn";?>" name="sel_pn">
                           
                            <?php 




                             $sql = "SELECT COUNT(ID) FROM course_registration_form WHERE Session='$sel_session' AND Semester='$sel_semester' AND Level='$sel_level' ";
                              $query = mysqli_query($con, $sql);
                              $row = mysqli_fetch_row($query);
                              // Here we have the total row count
                              $rows = $row[0];
                              // This is the number of results we want displayed per page
                              $page_rows = 10;
                              // This tells us the page number of our last page
                              $last = ceil($rows/$page_rows);
                              // This makes sure $last cannot be less than 1
                              if($last < 1){
                                  $last = 1;
                              }
                              // Establish the $pagenum variable
                              $pagenum = 1;
                              // Get pagenum from URL vars if it is present, else it is = 1
                              if(isset($_GET['pn'])){
                                  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
                              }
                              // This makes sure the page number isn't below 1, or more than our $last page
                              if ($pagenum < 1) { 
                                  $pagenum = 1; 
                              } else if ($pagenum > $last) { 
                                  $pagenum = $last; 
                              }


                              $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;




                             $sql = "SELECT * FROM course_registration_form WHERE Session='$sel_session' AND Semester='$sel_semester' AND Level='$sel_level' ORDER BY ID DESC $limit";

					            $query = mysqli_query($con,$sql);
					            $paginationCtrls = '';
					            $result = mysqli_num_rows($query);


					           while($rs = mysqli_fetch_array($query, MYSQLI_ASSOC))
					           {
					            $matric = $rs['Matric'];
					            $semester = $rs['Semester'];
					            $session = $rs['Session'];
					            $level = $rs['Level'];
					            $courses = $rs['Courses'];
					            $existing_result_db = $rs['Result'];

					            $sqlbio = "SELECT * FROM biodata where matric='$matric'";
					            $qsqlbio = mysqli_query($con,$sqlbio);
					            $rsbio = mysqli_fetch_array($qsqlbio);

					            $image = $rsbio['image'];
					            $fname = $rsbio['fname'];
					            $mname = $rsbio['mname'];
					            $lname = $rsbio['lname'];
					            $department = $rsbio['department'];
					            

					            

					            $sqlcourse_id ="SELECT * FROM course where course_id='$department'";
					            $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
					            $rscourse_id = mysqli_fetch_array($qsqlcourse_id);
					            $dept = $rscourse_id['coursename'];


					            $selectors=  explode(",", $courses);

					            $existing_result_db_selectors = explode(",", $existing_result_db);


					            //$matric_array=  explode(",", $matric);

					            $matrics[] =  $matric;
					            $matrics_array =  implode(',', $matrics);

					            ?>


                            <div class="col-sm-12 col-md-12">
                            	<div style="border-style: groove;"> </div>
					<b>
						<?php echo strtoupper($fname); echo" "; echo strtoupper($mname); echo" "; echo strtoupper($lname);?> &nbsp;&nbsp;||&nbsp;&nbsp;
						<?php echo $matric;?> &nbsp;&nbsp;||&nbsp;&nbsp; <?php echo $dept;?> &nbsp;&nbsp;||&nbsp;&nbsp; <?php echo $semester;?> &nbsp;&nbsp;||&nbsp;&nbsp; <?php echo $level." Level";?>
					</b>
					<br/>
					<div style="border-style: groove;"> </div>
						</div>
                            <?php

                            echo '
		                          <input type="hidden" name="matrics_array" id="matric" value="'.$matrics_array.'">
		                          ';

		                         /* foreach ($existing_result_db_selectors as $key => $existing_result_db_selectorans) {
		                          	echo $existing_result_db_selectorans;
		                          }*/
                            	
                            	foreach ($selectors as $key => $selectorans) {

                            		$key_no +=1;

                            		$result = $existing_result_db_selectors[$key];
                            		//echo "$result";

		                          $sqlcourse_id ="SELECT * FROM education where ID='$selectorans'";
		                          $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
		                          $rscourse_id = mysqli_fetch_array($qsqlcourse_id);
		                          
		                          $sqlcourse ="SELECT * FROM courseoffer where ID='$selectorans'";
		                          $qsqlcourse = mysqli_query($con,$sqlcourse);
		                          $rscourse = mysqli_fetch_array($qsqlcourse);

		                          echo '<input type="hidden" name="matrics[]" id="matric" value="'.$matric.'">
		                         
		                          ';


		                          echo '<div class="form-group mb-1 col-sm-12 col-md-2">
		                          <label for="email-addr">'.$rscourse_id['Course_Code'].' '.$rscourse['Course_Code'].'</label>';

		                          echo '<input type="text" class="form-control border-primary" placeholder="'.$rscourse_id['Course_Code'].' '.$rscourse['Course_Code'].'"
                                name="score'.$key_no.'" value="'.$result.'"></div>';
		                           //echo $rscourse_id['Course_Code']; echo"|&nbsp;"; echo $rscourse['Course_Code']; 
		                        }
		                      
		                    ?>

                              <!-- <label for="email-addr">Clearance Session</label>
                                <input type="text" id="firstname" class="form-control border-primary" placeholder="First Name"
                                name="firstname">   </div>-->
                          

                      	 <?php } ?>
                           
                            <center><br/><br/>
                            	<button  type="submit" id="upload_compute_result" name="upload_compute_result" class="btn btn-info mb-1"><i class="ft-upload"></i> Upload Computation</button>
                            </center>

                          </form>
                        </div>
                      </div>


                      <?php 
              if($last != 1){
              /* First we check if we are on page one. If we are then we don't need a link to 
                 the previous page or the first page so we do nothing. If we aren't then we
                 generate links to the first page, and to the previous page. */
              if ($pagenum > 1) {
                  $previous = $pagenum - 1;

                  $paginationCtrls .= '


                  <b><a href="?sel_session='.$sel_session.'&sel_level='.$sel_level.'&sel_semester='.$sel_semester.'&pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
                  // Render clickable number links that should appear on the left of the target page number
                  for($i = $pagenum-4; $i < $pagenum; $i++){
                      if($i > 0){
                          $paginationCtrls .= '<b><a href="?sel_session='.$sel_session.'&sel_level='.$sel_level.'&sel_semester='.$sel_semester.'&pn='.$i.'">'.$i.'</a> &nbsp; ';
                      }
                  }
              }
              // Render the target page number, but without it being a link
              $paginationCtrls .= ''.$pagenum.' &nbsp; ';
              // Render clickable number links that should appear on the right of the target page number
              for($i = $pagenum+1; $i <= $last; $i++){

                  $paginationCtrls .= '



                  <b><a href="?sel_session='.$sel_session.'&sel_level='.$sel_level.'&sel_semester='.$sel_semester.'&pn='.$i.'">'.$i.'</a> &nbsp; ';
                  if($i >= $pagenum+4){
                      break;
                  }
              }
              // This does the same as above, only checking if we are on the last page, and then generating the "Next"
              if ($pagenum != $last) {
                  $next = $pagenum + 1;
                  $paginationCtrls .= '<b>&nbsp; &nbsp; <a href="?sel_session='.$sel_session.'&sel_level='.$sel_level.'&sel_semester='.$sel_semester.'&pn='.$next.'">Next</a> ';
              }
          }

              ?>
            <center><div id="pagination_controls"><?php echo $paginationCtrls; ?></div></center>



                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>



</div></div>

 <?php include("../include/footer.php");?>



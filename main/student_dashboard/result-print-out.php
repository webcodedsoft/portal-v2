<?php include("../include/header.php");


unset($_SESSION["coursedata"]);
unset($_SESSION["courseserial"]);
unset($_SESSION["course_id"]);


if(!isset($_SESSION['course_result_id']))//!isset($_SESSION["app_id"]) && 
{
    header("Location: student_dashboard");

}

?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
    </div>
        <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Sessional Result Print Out</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>/student_dashboard">Home</a>
                </li>
                
                <li class="breadcrumb-item active">Sessional Result Print Out
                </li>
              </ol>
            </div>
          </div>
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
                  <a class="dropdown-item" href="<?php echo"$base_url";?>/logout">Logout</a>
            </div>
          </div>
        </div>
      </div>
      <br/>

   
<br/>
   <?php include("../include/sidebar.php");?>



      <div class="content-body printableArea">
        <section class="card">
          <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <img style="width: 100%; height: 100px" src="<?php echo"$base_url";?>/images/logo.png" class=""
                  />
            <center><h2>SESSIONAL RESULT </h2></center>
            <p style="color: black">Printed Date: <?php echo date(" d-m-Y - h:m:s "); ?></p>

            <br/><br/>
            <table class="table table-bordered mb-0" style="border-style: hidden;">
                    <tr class="bg-yellow bg-lighten-4" style="color: black; " >
                      <td style="width: 50px; ">
                          <img style='width:150px;height:150px;' src="<?php echo"$base_url";?>/images/students_images/<?php echo $rsr['image'];?>"  class=""
                        />
                        </td>
                        
    
                        <td>

                        <strong><p style="color:black">Name: <?php echo $rsr["fname"];?> <?php echo $rsr["mname"];?> <?php echo $rsr["lname"];?><br>
                          Sex: <?php echo $rsr["gender"];?><br>
                          
                          Matric: <?php echo $rsr["matric"];?><br>
                          Level: <?php echo $rscr["Level"];?> Level<br>
                          Department: <?php echo $rscourse_idr["coursetype"];?><br/>
                          Session: <?php echo $rscr["Session"];?><br/>
                          Semester: <?php echo $result_semester;?><br/>
                          School: <?php echo $rsschoolr["schoolname"];?>
                          </strong></p>
                        </td>

                       
                    </tr>
                    
                  </table>
            <!--/ Invoice Company Details -->
           
            <!-- Invoice Items Details -->
            <div id="invoice-items-details" class="pt-2">
              <div class="row">
                <div class="table-responsive col-sm-12">
                   <table style="width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal-vertical" >
                      <thead style="color: black">
                        <tr>
                          	<th>S/N</th>
							<th>Course Code</th>
							<th>Unit</th>
							<th>Status</th>
							<th>Score</th>
							<th>Grade</th>
							<th>Grade Point</th>
							<th>Weighted Grade Point(WGP)</th>
                        </tr>
                      </thead>
                      <tbody style="color: black">
                     
                     
                     
<?php




  $selectorsf=  explode(",", $result_coursesf);
    $scoresf=  explode(",", $course_scoref);

  $dbscoref[] = $scoresf;

 

$wgpf=0;

foreach ($dbscoref as $dbscoref) {}

$if=0;
foreach ($selectorsf as $indexf => $selectoransf){
$if++;

	$sqlcourse_idf ="SELECT * FROM education where ID='$selectoransf'";
    $qsqlcourse_idf = mysqli_query($con,$sqlcourse_idf);
    $rscourse_idf = mysqli_fetch_array($qsqlcourse_idf);
    
    $sqlcoursef ="SELECT * FROM courseoffer where ID='$selectoransf'";
    $qsqlcoursef = mysqli_query($con,$sqlcoursef);
    $rscoursef = mysqli_fetch_array($qsqlcoursef);

    $unit1f = $rscourse_idf["Course_Unit"];
    $unit2f = $rscoursef["Course_Unit"];


?>
<tr>
                          <td><?php echo"$if";?></td>
                          <td><?php echo $rscourse_idf['Course_Code']; ?><?php echo $rscoursef['Course_Code']; ?></td>
                          <td><?php echo $rscourse_idf['Course_Unit']; ?><?php echo $rscoursef['Course_Unit']; ?></td>
                          <td><?php echo $rscourse_idf['Description']; ?><?php echo $rscoursef['Description']; ?></td>
                          <td><?php print_r($dbscoref[$indexf]);?></td>
                          <td>
                          <?php
                                if ($dbscoref[$indexf] == 'ABS') {

                                  echo "ABS";

                                }elseif ($dbscoref[$indexf] >= '70') {
                                    # code...
                                    echo "A";
                                  
                                  }elseif ($dbscoref[$indexf] >= '60') {
                                    # code...
                                    echo "B";

                                  }elseif ($dbscoref[$indexf] >= '50') {
                                      echo "C";

                                    # code...
                                    
                                    # code...

                                  }elseif ($dbscoref[$indexf] >= '40') {

                                    echo "D";

                                  }elseif ($dbscoref[$indexf] >= '45') {


                                    echo "E";

                                    # code...
                                  }else{

                                    echo "F";
                                  }
                                ?>
                          </td>

                          <td>
                          	 <?php
                              if ($dbscoref[$indexf] == 'ABS') {

                              echo "ABS";

                              }elseif ($dbscoref[$indexf] >= '70') {
                                # code...
                                echo "5";
                                
                                
                              }elseif ($dbscoref[$indexf] >= '60') {
                                # code...
                                echo "4";


                              }elseif ($dbscoref[$indexf] >= '50') {
                                  echo "3";
                                  
                                # code...
                              }elseif ($dbscoref[$indexf] >= '45') {

                                echo "2";
                                

                              }elseif ($dbscoref[$indexf] >= '40') {
                                
                                echo "1";
                                
                                # code...
                              }else{

                                echo "0";
                              }
                            ?>
                          </td>

                          <td width ="1%">
                          	
                          <?php
                              
							$ans1f = 0;$ans2f = 0;$ans3f = 0;$ans4f = 0;$ans5f = 0;$ans6f = 0;
                              if ($dbscoref[$indexf] == 'ABS') {
                                
                                   echo "ABS";

                              }elseif ($dbscoref[$indexf] >= '70') {
                                
                                //$ans1 = $unit * 5;

                                !empty($unit1f) ? $ans1f = $unit1f * 5 : $ans1f = $unit2f * 5;
                                echo "$ans1f";


                                
                                
                              }elseif ($dbscoref[$indexf] >= '60') {
                                # code...
                               // $ans2 = $unit * 4;
                                 !empty($unit1f) ? $ans2f = $unit1f * 4 : $ans2f = $unit2f * 4;
                                echo "$ans2f";

                              }elseif ($dbscoref[$indexf] >= '50') {
                                  
                                  //$ans3 = $unit * 3;
                                 !empty($unit1f) ? $ans3f = $unit1f * 3 : $ans3f = $unit2f * 3;
                                 echo "$ans3f";

                              }elseif ($dbscoref[$indexf] >= '45') {

                                //$ans4 = $unit * 2;
                                !empty($unit1f) ? $ans4f = $unit1f * 2 : $ans4f = $unit2f * 2;
                                echo "$ans4f";
                                

                              }elseif ($dbscoref[$indexf] >= '40') {
                                
                               //$ans5 = $unit * 1;
                               !empty($unit1f) ? $ans5f = $unit1f * 1 : $ans5f = $unit2f * 1;
                                echo "$ans5f";
                                
                                # code...
                              }else{

                                  //$ans6 = $unit * 0;
                                  !empty($unit1f) ? $ans6f = $unit1f * 0 : $ans6f = $unit2f * 0;
                                echo "$ans6f";
                                

                              }
                              $wgpf += $ans1f; $wgpf += $ans2f;
                              $wgpf += $ans3f; $wgpf += $ans4f;
                              $wgpf += $ans5f; $wgpf += $ans6f;
                             

                              
                            ?>

                              
                              
                            </td>
<?php
}

$gpaf = $wgpf / $total_unitf;
?>


</tr>
                   
              

<tr>
<td colspan="2"><b>TOTAL WEIGHTED GRADE POINT(WGP):</b></td>
<td><strong><?php echo"$wgpf";?></strong></td>
<td colspan="2"><b>TOTAL UNIT EXPECTED: </b></td>
<td><strong><?php echo"$total_unitf";?></strong></td>
<td><strong>GPA: </strong></td>
<td><strong><?php echo number_format((float)$gpaf, 2, '.', ''); ?></strong></td>
</tr>



  
        </div>
      
   
   
                      </tbody>
                    </table>













<?php
if ($result_semester == 'Second') {
?>


<br/>
<center><h1>Second Semester Result</h1></center>
<br/>


       <table style="width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal-vertical" >
                      <thead style="color: black">
                        <tr>
                          	<th>S/N</th>
							<th>Course Code</th>
							<th>Unit</th>
							<th>Status</th>
							<th>Score</th>
							<th>Grade</th>
							<th>Grade Point</th>
							<th>Weighted Grade Point(WGP)</th>
                        </tr>
                      </thead>
                      <tbody style="color: black">
                     
                     
                     
<?php




  $selectorss=  explode(",", $result_coursess);
    $scoress=  explode(",", $course_scores);

  $dbscores[] = $scoress;



$wgps=0;

foreach ($dbscores as $dbscores) {}

$is=0;
foreach ($selectorss as $indexs => $selectoranss){
$is++;

	$sqlcourse_ids ="SELECT * FROM education where ID='$selectoranss'";
    $qsqlcourse_idss = mysqli_query($con,$sqlcourse_ids);
    $rscourse_ids = mysqli_fetch_array($qsqlcourse_idss);
    
    $sqlcourses ="SELECT * FROM courseoffer where ID='$selectoranss'";
    $qsqlcourses = mysqli_query($con,$sqlcourses);
    $rscourses = mysqli_fetch_array($qsqlcourses);

    $unit1s = $rscourse_ids["Course_Unit"];
    $unit2s = $rscourses["Course_Unit"];


?>
<tr>
                          <td><?php echo"$is";?></td>
                          <td><?php echo $rscourse_ids['Course_Code']; ?><?php echo $rscourses['Course_Code']; ?></td>
                          <td><?php echo $rscourse_ids['Course_Unit']; ?><?php echo $rscourses['Course_Unit']; ?></td>
                          <td><?php echo $rscourse_ids['Description']; ?><?php echo $rscourses['Description']; ?></td>
                          <td><?php print_r($dbscores[$indexs]);?></td>
                          <td>
                          <?php
                                if ($dbscores[$indexs] == 'ABS') {

                                  echo "ABS";

                                }elseif ($dbscores[$indexs] >= '70') {
                                    # code...
                                    echo "A";
                                  
                                  }elseif ($dbscores[$indexs] >= '60') {
                                    # code...
                                    echo "B";

                                  }elseif ($dbscores[$indexs] >= '50') {
                                      echo "C";

                                    # code...
                                    
                                    # code...

                                  }elseif ($dbscores[$indexs] >= '40') {

                                    echo "D";

                                  }elseif ($dbscores[$indexs] >= '45') {


                                    echo "E";

                                    # code...
                                  }else{

                                    echo "F";
                                  }
                                ?>
                          </td>

                          <td>
                          	 <?php
                              if ($dbscores[$indexs] == 'ABS') {

                              echo "ABS";

                              }elseif ($dbscores[$indexs] >= '70') {
                                # code...
                                echo "5";
                                
                                
                              }elseif ($dbscores[$indexs] >= '60') {
                                # code...
                                echo "4";


                              }elseif ($dbscores[$indexs] >= '50') {
                                  echo "3";
                                  
                                # code...
                              }elseif ($dbscores[$indexs] >= '45') {

                                echo "2";
                                

                              }elseif ($dbscores[$indexs] >= '40') {
                                
                                echo "1";
                                
                                # code...
                              }else{

                                echo "0";
                              }
                            ?>
                          </td>

                          <td width ="1%">
                          	
                          <?php
                              
							$ans1s = 0;$ans2s = 0;$ans3s = 0;$ans4s = 0;$ans5s = 0;$ans6s = 0;
                              if ($dbscores[$indexs] == 'ABS') {
                                
                                   echo "ABS";

                              }elseif ($dbscores[$indexs] >= '70') {
                                
                                //$ans1 = $unit * 5;

                                !empty($unit1s) ? $ans1s = $unit1s * 5 : $ans1s = $unit2s * 5;
                                echo "$ans1s";


                                
                                
                              }elseif ($dbscores[$indexs] >= '60') {
                                # code...
                               // $ans2 = $unit * 4;
                                 !empty($unit1s) ? $ans2s = $unit1s * 4 : $ans2s = $unit2s * 4;
                                echo "$ans2s";

                              }elseif ($dbscores[$indexs] >= '50') {
                                  
                                  //$ans3 = $unit * 3;
                                 !empty($unit1s) ? $ans3s = $unit1s * 3 : $ans3s = $unit2s * 3;
                                 echo "$ans3s";

                              }elseif ($dbscores[$indexs] >= '45') {

                                //$ans4 = $unit * 2;
                                !empty($unit1s) ? $ans4s = $unit1s * 2 : $ans4s = $unit2s * 2;
                                echo "$ans4s";
                                

                              }elseif ($dbscores[$indexs] >= '40') {
                                
                               //$ans5 = $unit * 1;
                               !empty($unit1s) ? $ans5s = $unit1s * 1 : $ans5s = $unit2s * 1;
                                echo "$ans5s";
                                
                                # code...
                              }else{

                                  //$ans6 = $unit * 0;
                                  !empty($unit1s) ? $ans6s = $unit1s * 0 : $ans6s = $unit2s * 0;
                                echo "$ans6s";
                                

                              }
                              $wgps += $ans1s; $wgps += $ans2s;
                              $wgps += $ans3s; $wgps += $ans4s;
                              $wgps += $ans5s; $wgps += $ans6s;
                             

                              
                            ?>

                              
                              
                            </td>
<?php
}

$gpas = $wgps / $total_units;
?>


</tr>
                   
              

<tr>
<td colspan="2"><b>TOTAL WEIGHTED GRADE POINT(WGP):</b></td>
<td><strong><?php echo"$wgps";?></strong></td>
<td colspan="2"><b>TOTAL UNIT EXPECTED: </b></td>
<td><strong><?php echo"$total_units";?></strong></td>
<td><strong>GPA: </strong></td>
<td><strong><?php echo number_format((float)$gpas, 2, '.', ''); ?></strong></td>
</tr>



  
        </div>
      
   
   
                      </tbody>
                    </table>

 <?php
}







?>




                </div>
              </div>
             
           
        </section>
      </div>
      <center>
        <div class="col-md-5 col-sm-12 text-center">
                  <button id="print" class="btn btn-info btn-lg my-1" type="button"> <span><i class="la la-print"></i> Print</span> </button>
                  
                </div>
      </center>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("../include/footer.php");?>

 <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>

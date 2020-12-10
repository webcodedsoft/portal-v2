<?php include("../include/header.php");


unset($_SESSION["coursedata"]);
unset($_SESSION["courseserial"]);

if(!isset($_SESSION['course_id']))//!isset($_SESSION["app_id"]) && 
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
          <h3 class="content-header-title">Course Form Print Out</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>/student_dashboard">Home</a>
                </li>
                
                <li class="breadcrumb-item active">Course Form Print Out
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
            <img style="width: 100%; height: 100px" src="<?php echo"$base_url";?>/images/logo.png" alt="company logo" class=""
                  />
            <center><h2>COURSE REGISTRATION PRINT OUT</h2></center>
            <p style="color: black">Printed Date: <?php echo date(" d-m-Y - h:m:s "); ?></p>

            <br/><br/>
            <table class="table table-bordered mb-0" style="border-style: hidden;">
                    <tr class="bg-yellow bg-lighten-4" style="color: black; " >
                      <td style="width: 50px; ">
                          <img style='width:150px;height:150px;' src="<?php echo"$base_url";?>/images/students_images/<?php echo $rscfd['image'];?>"  class=""
                        />
                        </td>
                        
    
                        <td>

                        <strong><p style="color:black">Name: <?php echo $rscfd["fname"];?> <?php echo $rscfd["mname"];?> <?php echo $rscfd["lname"];?><br>
                          Sex: <?php echo $rscfd["gender"];?><br>
                          
                          Matric: <?php echo $rscfd["matric"];?><br>
                          Level: <?php echo $rscf["Level"];?> Level<br>
                          Department: <?php echo $rscourse_idcf["coursetype"];?><br/>
                          Session: <?php echo $rscf["Session"];?><br/>
                          Semester: <?php echo $course_semester;?><br/>
                          School: <?php echo $rsschoolcf["schoolname"];?>
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
                          <th>Semester</th>
                          <th>Course Title</th>
                          <th>Unit</th>
                          <th>Status</th>
                          <th>HOD's Signature</th>
                        </tr>
                      </thead>
                      <tbody style="color: black">
                     
                     
                     
<?php

  $selectors=  explode(",", $courses_id);
  //print_r($selectorcheck);
$i=0;
foreach ($selectors as $selectorans) {

  $sqlcourse_id ="SELECT * FROM education where ID='$selectorans'";
    $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
    $rscourse_id = mysqli_fetch_array($qsqlcourse_id);
    
    $sqlcourse ="SELECT * FROM courseoffer where ID='$selectorans'";
    $qsqlcourse = mysqli_query($con,$sqlcourse);
    $rscourse = mysqli_fetch_array($qsqlcourse);
$i++;
?>                        <tr>
                          <td><?php echo"$i";?></td>
                          <td><?php echo $rscourse_id['Course_Code']; ?><?php echo $rscourse['Course_Code']; ?></td>
                          <td><?php echo $rscourse_id['Semester']; ?><?php echo $rscourse['Semester']; ?></td>
                          <td><?php echo $rscourse_id['Course_Title'] ; ?><?php echo $rscourse['Course_Title'] ; ?></td>
                          <td><?php echo $rscourse_id['Course_Unit']; ?><?php echo $rscourse['Course_Unit']; ?></td>
                          <td><?php echo $rscourse_id['Description']; ?><?php echo $rscourse['Description']; ?></td>
                          <td> </td>
<?php
}
?>
                      </tr>
              

<tr>
<td colspan="4"><b>Total Unit:</b></td>
<td><strong><?php echo "$unit" ?></strong></td>
<td></td><td></td>
</tr>



  
        </div>
      
   
   
                      </tbody>
                    </table>

 <br><br>


 <table style="width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal-vertical" >
                      <thead style="color: black; border-style: hidden;">
                        <tr >
                          <th>
                            <center>
                              __________________________________<br>
                            Student's Signature & Date
                            </center>
                          </th>

                          <th style="border-style: hidden;">
                            <center>
                            __________________________________<br>
                          Dean Signature, Stamp & Date
                          </center>
                        </th>
                        </tr>
                      </thead>

                    </table>








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

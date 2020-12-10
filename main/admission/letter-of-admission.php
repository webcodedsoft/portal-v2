<?php include("../include/header.php");


$admission_admitted = $rsch['Admission'];
if(!isset($_GET["source"]))//!isset($_SESSION["app_id"]) && 
{
    header("Location: ".$base_url."/admission-checker-auth");

}

if ($admission_admitted == 'Not Admitted') {
	
	header("Location: ".$base_url."/admission-checker-auth");
}
?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
        <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        

        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Admission Letter </h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>/entry-requirments">Entry Requirment</a>
                </li>
                <li class="breadcrumb-item active">Admission Letter
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
                  
            </div>
          </div>
        </div>
      </div>

<br/>
     <?php include("../include/sidebar.php");?>



      <div class="content-body printableArea" >
       

        <section class="card">
          <div id="invoice-template" class="card-body ">
            <!-- Invoice Company Details -->
            <img style="width: 100%; height: 100px" src="<?php echo"$base_url";?>/images/logo.png" alt="company logo" class=""
                  />
			
			<div id="invoice-items-details" class="pt-2">
              	
              </center>
 <P>Printed Date: <?php echo date("d-m-Y - h:i:s"); ?></P>
             <div id="invoice-items-details" class="pt-2">
              <div class="row">
                <div class="table-responsive col-sm-12">

                  
         

        
                  <table class="table table-bordered mb-0" >
                    <tr class="bg-yellow bg-lighten-4" style="color: black">
                      <td>
                      	<strong><br/><br/><p style="color:black">PROVOST<br>
                          MR. T.K. AKINLOYE<br>
                          REGISTRAR<br>
                          MRS. ADEYEMI B<br>
                          Our Ref. ASSCOED/OO/R/STL/17/18/VOL.14<br>  
                          </strong></p>
                      </td>
                        

                        <td>
                        <strong><br><br><p style="color:black">ESTABLISHED IN 2006<br>
                          E-MAIL: asscoeda@gmail.com<br>
                          
                          Date: <?php echo date("d-m-Y"); ?><br>
                          Your Ref:____________________<br>
                          </strong></p>
                        </td>

                        <td>
                        	<img style='width:120px;height:120px;' src="<?php echo"$base_url";?>/images/students_images/<?php echo $rsch['Passport'];?>"  class=""
                        />
                        <p><b>&nbsp;&nbsp;ID: <?php echo($rsch['Application_id']);?></b></p>
                        </td>
                    </tr>
                    
                  </table>
                </div>
				


                <div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0">
                    <thead class="bg-yellow bg-lighten-4">
                    </thead>
                    <tbody>
                      <tr>

                  <?php

                if ($rs['Admission'] = 'Admitted') {
                ?>
                  <td>

                  	<br/>
                    <h5 style="color:black"> <strong>Dear Mr./Mrs./Miss. <?php echo strtoupper($rsch['FirstName']); ?> <?php echo strtoupper($rsch['MiddleName']); ?> <?php echo strtoupper($rsch['LastName']); ?>

                    <br/><br/> 
                    <p style="color:black">OFFER OF ADMISSIONS TO THREE YEARS NCE PROGRAMME
     			 </strong><br>

					<p style="color:black"> 
						With reference to your application for admission into NCE I, I am pleased to inform you that you have been offered Provisional Admission to into three years course leading to the award of NCE for <?php echo $rsch['Session']; ?>  Academic Session.
      					You are hereby admitted into the school of <?php echo $rsschool['schoolname']; ?> <br><strong>
      				</p>

      				<p style="color:black">Department: <?php echo $rscourse_id['coursetype']; ?> (<?php echo $rscourse_id['coursename']; ?>)</strong>  <br>  

					<br/>
      				<strong><h4 style="color:black">1. CONDITIONS OF THE OFFER</h4></strong>
			       <p style="color:black">The confirmation of your admission is subject to the following:<br>
			       i.     &nbsp;&nbsp;Production of reference letter from a person vouchsafe for your good behaviour.<br>
			       ii.    &nbsp;Presentation at the time of registration, the original of the credentials listed in your application form for verification. Result slips of SSCE/GCE, Grade II Certificate
			          &nbsp;&nbsp;&nbsp;&nbsp;Examination will be accepted provisionally where the original has not been issued.<br>
			       iii.   Registration for SSCE/NECO, GCE with the first year of your admission. This is to enable you to make the necessary requirements for admission to tertiary institutions and &nbsp;&nbsp;&nbsp;&nbsp;hence facilitate your future academic pursuit after
			       the NCE Programme.
			        </strong>
			       <br><br></p>



			       
			       <strong><h4 style="color:black" ><b>2. OTHER CONDITIONS</b></h4></strong>
			      <p style="color:black">i. &nbsp;    If at any time even after your registration, it is discovered that you do not satisfy the minimum entry requirements prescribed for your course of study at the time of 
			      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this offer or that any of the qualifications you claimed to have had is false, forged,
			        altered or incorrect, you will be required to withdraw from the College forthwith 
			        and in &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;addition, you may face other sanctions that the college may decide on.<br>

			      ii.    The name by which you are admitted and by which you will be registered is the name which will appear on any certificate that college may issue to you on successful &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;completion of your course.<br>
			      
			      iii.   The offer is not transferable to another person.<br>
			      iv.    The Provisional admission shall be subject to any internal rules and regulations of the college as may be adopted from time to time.</p>


				 <br><strong><p style="color:black">3.</strong> You will be required to accept this offer by payment of an Acceptance Fee.<br/>
                   
                        <br/><br/>
                        <div class="text-right">
                          <p>Authorized person</p>
                          <img src="images/signed.jpg" alt="signature" class="height-100"
                          />
                          <br/><?php echo date("d-M-Y"); ?>
                          <p class="text-muted">Ag. Registrar</p>
                        </div>
                       
                        
                   </p>
                   </td>
                   
                <?php
                }
                
                ?>
                

                      
            
                      </tr>
                     
                      
                    </tbody>
                  </table>
                </div>
 
              </div>
             
            </div>

             
            </div>
           
           
           <br/>
          
          </div>
        </section>
      </div>
      <center>
        <div class="col-md-5 col-sm-12 text-center row">
                  <button id="print" class="btn btn-info btn-lg my-1" type="button"> <span><i class="la la-print"></i> Print</span> </button>
                  <br/>

                 
                </div>
             
      </center>
    </div>
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



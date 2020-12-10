<?php include("../include/header.php");

if(!isset($_GET["source"]))//!isset($_SESSION["app_id"]) && 
{
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
          <h3 class="content-header-title">Admission Status </h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>/entry-requirments">Entry Requirment</a>
                </li>
                <li class="breadcrumb-item active">Admission Status
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
            <img style="width: 100%; height: 100px" src="<?php echo"$base_url";?>/images/logo.png" class=""
                  />
			
			<div id="invoice-items-details" class="pt-2">
              <center><font size="+2">ONLINE ADMISSION STATUS SLIP</font></center>
              	
              </center>
 <P>Printed Date: <?php echo date("d-m-Y - h:i:s"); ?></P>
             <div id="invoice-items-details" class="pt-2">
              <div class="row">
                <div class="table-responsive col-sm-12">

                  
         

        
                  <table class="table table-bordered mb-0" >
                    <tr class="bg-yellow bg-lighten-4" style="color: black">
                      <td><img style='width:120px;height:120px;' src="<?php echo"$base_url";?>/images/students_images/<?php echo $rsch['Passport'];?>"  class=""
                        /></td>
                        

                        <td>
                        <?php
                         if ($rsch['JambOption'] =='Jamb') {
                          ?>
                         UTME REG. No.: <?php echo $rsch['Utmeno'];?><p>
                          <?php
                          }
                          ?>
                          <p>Name: <?php echo $rsch['FirstName'];?> <?php echo $rsch['MiddleName'];?> <?php echo $rsch['LastName'];?><p>
                          Gender: <?php echo $rsch['Gender'];?><p>
                          Phone Number: <?php echo $rsch['PhoneNumber'];?><p>
                          Email Address: <?php echo $rsch['Email'];?><p>
                        </td>
                    </tr>
                    
                  </table>
                </div>


            	<div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0" >
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Admission Information:</h4></th>
                    </thead>
                    <tbody>
                    	<tr>
                        <td width="20%" >School:</td>
                        <td width="20%" class="text-right"><?php echo $rsschool['schoolname'];?></td>
                        <td width="20%" class="text-right">Department:</td>
                        <td width="20%" class="text-right"><?php echo $rscourse_id['coursetype'];?></td>
                      </tr>
                    <?php

              if ($rsch['Admission'] == 'Admitted') {
                ?>
                      <tr>
                        <td width="20%"><b>Admission Status</b></p></td>
                        <td width="20%"  class="text-right"><b style="color: green"><?php echo $rsch['Admission'];?></b></td>
                        <td width="20%"  class="text-right"></td>
                        <td width="20%"  class="text-right"></td>
                      </tr>
                     <?php
        }
        ?>
                    </tbody>
                  </table>
                </div>
          

                <div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0">
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Notification:</h4></th>
                    </thead>
                    <tbody>
                      <tr>

                  <?php

                if ($rsch['Admission'] == 'Admitted') {
                ?>
                  <td><p>
                    <h5> <strong>Congratulations!!!</strong> Please print your online admissions slip now; and click the button below to print admissions letter</h5>
                    <h3> REQUIRMENT FOR REGISTRATION<br></h3>
                    <strong>At the time of registration, you are required to produce the following:
                    <h4>a) Medical Certificate of fitness that must be issued in any Government approved Hospital.<br>
                        b) Original and photocopy of either Birth Certificate or Sworn Declaration of age.<br>
                        c) Letter of Identification from your Local Government.<br>
                        d) Letter of reference from a person of reportable standing in the society who can Vouchsafe for your good behavior.<br>
                        e) Screening / Oral Interview which will be done at the registry department.<br>
                        f) Tuition fees shall not be refunded to any student who withdraws from the college (3) weeks after the commencement of the semesters for which payments has been made<br>
                        g) Please accept our congratulations.
                   
                        <br/><br/>
                        <div class="text-right">
                          <p>Authorized person</p>
                          <img src="images/signed.jpg" alt="signature" class="height-100"
                          />
                          <p class="text-muted">Ag. Registrar</p>
                        </div>
                       
                        
                   </p>
                   </td>
                   
                <?php
                }
                else
                {
                ?>
                

                      <td><p>
                <h5> <strong>Sorry!!!</strong> You have not been given admission yet. Please check back later<br>
                    
                    <div class="text-right">
                          <p>Authorized person</p>
                          <img src="images/signed.jpg" alt="signature" class="height-100"
                          />
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
                  &nbsp;&nbsp;<br/>

                 
                </div>
              <?php
              if ($rsch['Admission'] == 'Admitted') {
                ?> 
                <a target="_blank" href="admission-letter?source=<?php echo $rsch["PhoneNumber"];?>"><button  class="btn btn-info btn-lg my-1" type="submit"> <span><i class="la la-print"></i> Print Admission Letter</span> </button>&nbsp;&nbsp;<br/></a>
              <?php
            }
            ?>
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



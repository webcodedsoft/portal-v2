<?php include("../include/header.php");

if(!isset($_SESSION["app_id"]))//!isset($_SESSION["app_id"]) && 
{
    header("Location: application-form");

}
?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
        <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        

        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Application Form Print Out</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>/entry-requirments">Entry Requirment</a>
                </li>
                <li class="breadcrumb-item active">Application Form Print Out
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
              
              	<div class="row">
                <div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0" >
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><img style='width:120px;height:120px;' src="<?php echo"$base_url";?>/images/students_images/<?php echo $rsprint['Passport'];?>"  class=""
			                  /></th>
                    </thead>
                    
                  </table>
                </div>
              </div>
              </center>

             <div id="invoice-items-details" class="pt-2">
              <div class="row">
                <div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0" >
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Personal Data</h4></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td width="20%" >FIRST NAME:</p></td>
                        <td width="20%"  class="text-right"><?php echo $rsprint['FirstName'];?></td>
                        <td width="20%"  class="text-right">MIDDLE NAME:</td>
                        <td width="20%"  class="text-right"><?php echo $rsprint['MiddleName'];?></td>
                      </tr>
                      <tr>
                        <td width="20%" >LAST NAME:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['LastName'];?></td>
                        <td width="20%" class="text-right">DATE OF BIRTH:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['Dob'];?></td>
                      </tr>
                      <tr>
                        <td width="20%" >NATIONALITY:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['Country'];?></td>
                        <td width="20%" class="text-right">STATE OF ORIGIN:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['State'];?></td>
                      </tr>
                       <tr>
                        <td width="20%" >CITY OF ORIGIN:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['City'];?></td>
                        <td width="20%" class="text-right">CONTACT ADDRESS:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['Address'];?></td>
                      </tr>
                       <tr>
                        <td width="20%" class="text-right">E-MAIL:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['Email'];?></td>
                        <td width="20%" >GENDER: </td>
                        <td width="20%" class="text-right"><?php echo $rsprint['Gender'];?></td>
                      </tr>
                       <tr>
                       	
                        <td width="20%" class="text-right">Phone Number</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['PhoneNumber'];?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

<?php

        if ($rsprint['JambOption'] == 'Jamb') {
          ?>
            	<div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0" >
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Jamb Details:</h4></th>
                    </thead>
                    <tbody>
                    	<tr>
                        <td width="20%" >UTME REG. NO.:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['Utmeno'];?></td>
                        <td width="20%" class="text-right">JAMB SCORE:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['JambScore'];?></td>
                      </tr>
                      <tr>
                        <td width="20%">COLLEGE OF CHOICE:</p></td>
                        <td width="20%"  class="text-right"><?php echo $rsprint['CollegeChoice'];?></td>
                        <td width="20%"  class="text-right"></td>
                        <td width="20%"  class="text-right"></td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          <?php
        }
        ?>

                <div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0">
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Department & School:</h4></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td width="20%" >SCHOOL:</p></td>
                        <td width="20%"  class="text-right"><?php echo $rsschool['schoolname'];?></td>
                        <td width="20%"  class="text-right">DEPARTMENT:</td>
                        <td width="20%"  class="text-right"><?php echo $rscourse_id['coursetype'];?></td>
                      </tr>
                      <tr>
                        <td width="20%" >SESSION:</td>
                        <td width="20%" class="text-right"><?php echo $rsprint['Session'];?></td>
                        <td width="20%" class="text-right"></td>
                        <td width="20%" class="text-right"></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>

              </div>
             
            </div>

             
            </div>
           
           
           <br/>
            <!-- Invoice Footer -->
            <div id="invoice-footer">
              <div class="row">
                <div class="col-md-7 col-sm-12">
                  <h6>NOTE</h6>
                   <p style="color:red">1.&nbsp; Always check the E-Portal and Email Inbox/Spam Folder For your Admission Status</p>
                </div>
                
              </div>
            </div>
            <!--/ Invoice Footer -->
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
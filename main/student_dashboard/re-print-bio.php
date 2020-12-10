<?php include("../include/header.php");



    
if(!isset($_SESSION["admin_id"]) && !isset($_SESSION["student_app_id"]))
{
    header("Location: ".$base_url."/login");
} 

?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
        <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        

        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Bio Data Form Print Out</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>/student_dashboard">Home</a>
                </li>
                
                <li class="breadcrumb-item active">Bio Data Form Print Out
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
                     <th colspan="4"><img style='width:120px;height:120px;' src="<?php echo"$base_url";?>/images/students_images/<?php echo $rsblg['image'];?>"  class=""
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
                        <td width="20%" >APPLICATION ID:</p></td>
                        <td width="20%"  class="text-right"><?php echo $rsblg['application_id'];?></td>
                        <td width="20%"  class="text-right">MATRIC NO.:</td>
                        <td width="20%"  class="text-right"><?php echo $rsblg['matric'];?></td>
                      </tr>

                      <tr>
                        <td width="20%" >FIRST NAME:</p></td>
                        <td width="20%"  class="text-right"><?php echo $rsblg['fname'];?></td>
                        <td width="20%"  class="text-right">MIDDLE NAME:</td>
                        <td width="20%"  class="text-right"><?php echo $rsblg['mname'];?></td>
                      </tr>
                      <tr>
                        <td width="20%" >LAST NAME:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['lname'];?></td>
                         <td width="20%" class="text-right">EMAIL: </td>
                        <td width="20%" class="text-right"><?php echo $rsblg['email'];?></td>
                        
                      </tr>
                      
                       <tr>
                        <td width="20%" >PHONE NUMBER</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['phone'];?></td>
                        <td width="20%" class="text-right">MARITAL STATUS: </td>
                        <td width="20%" class="text-right"><?php echo $rsblg['marital'];?></td>
                        
                      </tr>
                      <tr>
                        <td width="20%" >GENDER: </td>
                        <td width="20%" class="text-right"><?php echo $rsblg['gender'];?></td>
                        <td width="20%" class="text-right">DATE OF BIRTH:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['dob'];?></td>
                        
                      </tr>
                       <tr>
                        <td width="20%" >RELIGION</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['religion'];?></td>
                        <td width="20%" class="text-right">MOTHER LANGUAGE</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['language'];?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>


            	<div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0" >
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Nationality:</h4></th>
                    </thead>
                    <tbody>
                     <tr>
                        <td width="20%" >NATIONALITY:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['country'];?></td>
                        <td width="20%" class="text-right">STATE OF ORIGIN:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['state'];?></td>
                      </tr>
                       <tr>
                        <td width="20%" >CITY OF ORIGIN:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['city'];?></td>
                        <td width="20%" class="text-right">CONTACT ADDRESS:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['address'];?></td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
          

                <div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0">
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Department & School:</h4></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td width="20%" >SCHOOL:</p></td>
                        <td width="20%"  class="text-right"><?php echo $rsschoollg['schoolname'];?></td>
                        <td width="20%"  class="text-right">DEPARTMENT:</td>
                        <td width="20%"  class="text-right"><?php echo $rscourse_idlg['coursetype'];?></td>
                      </tr>
                      <tr>
                        <td width="20%" >SESSION:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['session'];?></td>
                        <td width="20%" class="text-right"></td>
                        <td width="20%" class="text-right"></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>



                <div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0" >
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Next of Kin:</h4></th>
                    </thead>
                    <tbody>
                     <tr>
                        <td width="20%" >NEXT OF KIN FIRST NAME:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['kinfname'];?></td>
                        <td width="20%" class="text-right">NEXT OF KIN MIDDLE NAME:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['kinmname'];?></td>
                      </tr>
                       <tr>
                        <td width="20%" >NEXT OF KIN LAST NAME:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['kinlname'];?></td>
                        <td width="20%" class="text-right">NEXT OF KIN ADDRESS:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['kinaddress'];?></td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>



                <div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0" >
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Sponsorship Details:</h4></th>
                    </thead>
                    <tbody>
                     <tr>
                        <td width="20%" >SPONSOR SURNAME:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['sponsorfname'];?></td>
                        <td width="20%" class="text-right">SPONSOR OTHER NAME:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['sponsorothername'];?></td>
                      </tr>
                       <tr>
                        <td width="20%" >SPONSOR PHONE NUMBER:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['sponsorphone'];?></td>
                        <td width="20%" class="text-right">SPONSOR ADDRESS:</td>
                        <td width="20%" class="text-right"><?php echo $rsblg['sponsoraddress'];?></td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>

                <div class="table-responsive col-sm-12">
                  <table class="table table-bordered mb-0" >
                    <thead class="bg-yellow bg-lighten-4">
                     <th colspan="4"><h4 class="form-section"><i class="la la-eye"></i> Declaration:</h4></th>
                    </thead>
                    <tbody>
                     <tr>
                        <td width="20%" >I <b><?php echo $rsblg['declared'];?></b> declare that all the particulars furnished above are true and correct. I submit that I will abide by the rules and regulations of the College.</td>
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
    <div class="col-md-5 col-sm-12 text-center">
    	<button id="print" class="btn btn-info btn-lg my-1" type="button"> <span><i class="la la-print"></i> Print</span> </button>
      
    </div>
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
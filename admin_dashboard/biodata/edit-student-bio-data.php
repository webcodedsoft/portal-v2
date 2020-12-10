<?php include("../include/header.php");


if(!isset($_GET['app_id']) && !isset($_SESSION["admin_id"]) )//!isset($_SESSION["app_id"]) && 
{
    header("Location: ../page login.php");

}


?>

  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/step-form-validation-css.css">
 
 
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
        <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Students Bio Data Form</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>/entry-requirments">Entry Requirment</a>
                </li>
                <li class="breadcrumb-item active">Students Bio Data Form
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


      <div class="content-body">
         <!-- Form wizard with step validation section start -->

           <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="horz-layout-colored-controls">ONLINE BIO DATA FORM</h4>
                  <small>Kindly fill the following form with valid records...</small>
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
                <div class="card-content collpase show">
                  <div class="card-body">
                    
                    <form id="regForm" class="form form-horizontal" action="../admin-bio-data-form" method="post">

				
                          
					
					<!-- Personal Data -->
					<div class="tab">
                      <div class="form-body">
                        <h4 class="form-section"><i class="la la-eye"></i> Personal Data</h4>
                        
						<?php 

                    if (isset($_SESSION['adbiodatasuc'])) 
                    {
                      
                      echo '
			                <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["adbiodatasuc"].'
                        </div>

			              ';
                      
                      unset($_SESSION['adbiodatasuc']);

                    }

                  
                     ?>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">Matric No.:<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="matric" value="<?php echo $rsch['matric'];?>" style="text-transform: uppercase;"  oninput="this.className = ''" class="form-control border-primary" placeholder="Matric Number"
                                name="matric">

                                <input type="hidden" id="prevmatric" value="<?php echo $rsch['matric'];?>" style="text-transform: uppercase;"  oninput="this.className = ''" class="form-control border-primary" placeholder="Matric Number"
                                name="prevmatric">

                                 <input type="hidden" id="prevphone" value="<?php echo $rsch['phone'];?>" style="text-transform: uppercase;"  oninput="this.className = ''" class="form-control border-primary" placeholder="Matric Number"
                                name="prevphone">
                                

                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2">Application ID<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="app_id" readonly="" value="<?php echo $rsch['application_id'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Application ID"
                                name="app_id">
                              </div>
                            </div>
                          </div>
                        </div>



                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">Fist Name<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="firstname"  style="text-transform: capitalize;" value="<?php echo $rsch['fname'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="First Name"
                                name="firstname">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2">Middle Name<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="middlename"  style="text-transform: capitalize;" value="<?php echo $rsch['mname'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Middle Name"
                                name="middlename">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput3">Last Name<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="lastname"  style="text-transform: capitalize;" value="<?php echo $rsch['lname'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Last Name"
                                name="lastname">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Email Address<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="email" id="email"  value="<?php echo $rsch['email'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Email Address"
                                name="email">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput3">Phone Number<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="phonenumber"  value="<?php echo $rsch['phone'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Phone Number"
                                name="phonenumber">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Marital Status<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="email"  value="<?php echo $rsch['marital'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Marital Status"
                                name="marital">
                              </div>
                            </div>
                          </div>
                        </div>


                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput3">Gender<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="gender"  value="<?php echo $rsch['gender'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Gender"
                                name="gender">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Date of Birth<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="date" id="dob"  value="<?php echo $rsch['dob'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Date of Birth"
                                name="dob">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Religion<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <select onselect="this.className = ''" class="border-primary form-control"  required id="religion" name="religion">
                                	<option selected value="<?php echo $rsch['religion'];?>"><?php echo $rsch['religion'];?></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Others">Others</option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Mother Language<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <select onselect="this.className = ''" class="border-primary form-control"  required id="language" name="language">
                                	<option selected value="<?php echo $rsch['language'];?>"><?php echo $rsch['language'];?></option>
                                    <option value="Arabic">Arabic</option>
                                    <option value="Fulani">Fulani</option>
                                     <option value="Hausa">Hausa</option>
                                     <option value="Igbo">Igbo</option>
                                     <option value="Hausa">Hausa</option>
                                     <option value="Ibibio">Ibibio</option>
                                     <option value="Tiv">Tiv</option>
                                     <option value="Yoruba">Yoruba</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>
                  </div>






      <!-- Nationality -->
                    <div class="tab">
                      <div class="form-body">
                        <h4 class="form-section"><i class="la la-eye"></i>Nationality</h4>
                        

						            <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput3">Select Country<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="email"  value="<?php echo $rsch['country'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Country"
                                name="country">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Select State<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="email"  value="<?php echo $rsch['state'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="State"
                                name="state">
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput3">Select City<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="email"  value="<?php echo $rsch['city'];?>" oninput="this.className = ''" class="form-control border-primary" placeholder="City"
                                name="city">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput4">Address<span class="danger">*</span></label>
                              <div class="col-md-9">
                                 <input type="text"  oninput="this.className = ''"  style="text-transform: capitalize;" value="<?php echo $rsch['address'];?>" class="border-primary form-control" name="address">
                              </div>
                            </div>
                          </div>
                        </div>

						

					             </div>

					         </div>

					
					




					<!-- School Tab -->

					<div class="tab">
                      <div class="form-body">
                        <h4 class="form-section"><i class="la la-eye"></i> Select School & Department</h4>
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">Select School<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <select onselect="this.className = ''" class="border-primary form-control"  required id="school" name="school">
                                    <option selected value="<?php echo $rsch['school'];?>"><?php echo $rsschool['schoolname'];?></option>
                                   <?php
                                        $sql = "Select * From school";
                                        $result = mysqli_query($con, $sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                             echo'<option value="'.$row["school_id"].'">'.$row["schoolname"].'</option>';

                                        }

                                        ?>
                                        
                                    
                                </select>
 
                               
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2">Select Department<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <select onselect="this.className = ''" class="border-primary form-control"  required id="department" name="department">
                                    <option selected value="<?php echo $rsch['department'];?>"><?php echo $rscourse_id['coursetype'];?></option>
                                    
                                </select>
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group row">
                               <label class="col-md-3 label-control" for="userinput3">Current Session<span class="danger">*</span></label> 
                              <div class="col-md-9">
                                 <input type="text" id="userinput3" readonly="" oninput="this.className = ''"  value="<?php echo $rsch['session'];?>" class="form-control border-primary" placeholder="Current Session" name="session">
                              </div>
                            </div>
                         
                        </div>
                        </div>


						</div>

					</div>



  <!-- Next of kin Tab -->
					   <div class="tab">
                      <div class="form-body">
                        <h4 class="form-section"><i class="la la-eye"></i> Next of Kin Details</h4>
                        

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">First Name of Next of Kin:<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="kinfname" value="<?php echo $rsch['kinfname'];?>" style="text-transform: capitalize;"  oninput="this.className = ''" class="form-control border-primary" placeholder="First Name of Next of Kin"
                                name="kinfname">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2"> Middle Name of Next of Kin: <span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="kinmname" value="<?php echo $rsch['kinmname'];?>" style="text-transform: capitalize;" oninput="this.className = ''" class="form-control border-primary" placeholder="Middle Name of Next of Kin"
                                name="kinmname">
                              </div>
                            </div>
                          </div>
                        </div>


                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">Last Name of Kin:<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="kinlname" value="<?php echo $rsch['kinlname'];?>" style="text-transform: capitalize;"  oninput="this.className = ''" class="form-control border-primary" placeholder="Last Name of Kin"
                                name="kinlname">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2"> Address of Next of Kin: <span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="kinaddress" value="<?php echo $rsch['kinaddress'];?>" style="text-transform: capitalize;" oninput="this.className = ''" class="form-control border-primary" placeholder="Address of Next of Kin"
                                name="kinaddress">
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
                </div>
					



          <div class="tab">
                      <div class="form-body">
                        <h4 class="form-section"><i class="la la-eye"></i> Sponsorship Details</h4>
                        

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">Sponsor Surname:<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="sponsorname" value="<?php echo $rsch['sponsorfname'];?>" style="text-transform: capitalize;"  oninput="this.className = ''" class="form-control border-primary" placeholder="Sponsor Surname"
                                name="sponsorfname">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6"> 
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2"> Sponsor Other Name: <span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="sponsorothername" value="<?php echo $rsch['sponsorothername'];?>" style="text-transform: capitalize;" oninput="this.className = ''" class="form-control border-primary" placeholder="Sponsor Other Name"
                                name="sponsorothername">
                              </div>
                            </div>
                          </div>
                        </div>


                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">Sponsor Phone Number:<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="sponsornumber" value="<?php echo $rsch['sponsorphone'];?>" maxlength="11" onkeypress="return OnlyNumber(event)"  oninput="this.className = ''" class="form-control border-primary" placeholder="Sponsor Phone Number"
                                name="sponsorphone">
                              </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput2"> Sponsor Address: <span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="sponsoraddress" value="<?php echo $rsch['sponsoraddress'];?>" style="text-transform: capitalize;" oninput="this.className = ''" class="form-control border-primary" placeholder="Sponsor Address"
                                name="sponsoraddress">
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
                </div>


					<!-- Passport Tab -->
				<div class="tab">
                      <div class="form-body">
                        <h4 class="form-section"><i class="la la-eye"></i> Declaration</h4>
                        

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="userinput1">Declaration:<span class="danger">*</span></label>
                              <div class="col-md-9">
                                <input type="text" id="declare" value="<?php echo $rsch['declared'];?>" style="text-transform: capitalize;"  oninput="this.className = ''" class="form-control border-primary" placeholder="Enter your full name"
                                name="declared">
                                <small>I declare that all the particulars furnished above are true and correct. I submit that I will abide by the rules and requlations of the College </small>
                              </div>
                            </div>
                          </div>
                         
                        </div>
<input type="hidden" id="image"  value="<?php echo $rsch['image'];?>" class="form-control border-primary" name="image">

                         
                  </div>
                </div>


				



					 <h4 class="form-section"> </h4>

					 <div style="overflow:auto;">
					  <div style="float:right;">
					    <button type="button" id="prevBtn" class="btn btn-warning mr-1" onclick="nextPrev(-1)">Previous</button>
					    <button type="button" id="nextBtn" name="submitall" class="btn btn-primary" onclick="nextPrev(1)"> <i class="la la-check-square-o"></i> Next</button>
					  </div>
					</div>
					
					</form>
					<!-- Circles which indicates the steps of the form: -->
					<div style="text-align:center;margin-top:40px;">
					  <span class="step"></span>
					  <span class="step"></span>
					  <span class="step"></span>
					  <span class="step"></span>
					  <span class="step"></span>
            <span class="step"></span>
					</div>

					 
					

                </div>
              </div>
            </div>
          </div>

      
   
      </div>
    </div>
  </div>
    </div>
  </div>
</div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 <?php include("../include/footer.php");?>

  <script src="<?php echo"$base_url";?>/app-assets/step-form-validation.js"></script>
    <script>

     window.load=$(document).ready(function(){
$('#school').change(function(){
        var school_id = $(this).val();
        //alert("ss"+school_id);
        $.ajax({
            url:"main/include/fetch_course.php",
            method:"POST",
            data:{schoolId:school_id},
            dataType:"text",
            success:function(data)
            {
            	//alert("sss"+data);
                $('#department').html(data);
            }
        });  

});


});

</script>


<script>

  $("input#matric").on({
    keydown: function(e)
    {
      if (e.which === 32) 
        return false;
    },
    change: function()
    {
      this.value = this.value.replace(/\s/g, "");
    }
  });

	$("input#kinfname").on({
		keydown: function(e)
		{
			if (e.which === 32) 
				return false;
		},
		change: function()
		{
			this.value = this.value.replace(/\s/g, "");
		}
	});

	$("input#kinmname").on({
		keydown: function(e)
		{
			if (e.which === 32) 
				return false;
		},
		change: function()
		{
			this.value = this.value.replace(/\s/g, "");
		}
	});

	$("input#kinlname").on({
		keydown: function(e)
		{
			if (e.which === 32) 
				return false;
		},
		change: function()
		{
			this.value = this.value.replace(/\s/g, "");
		}
	});

	$("input#sponsornumber").on({
		keydown: function(e)
		{
			if (e.which === 32) 
				return false;
		},
		change: function()
		{
			this.value = this.value.replace(/\s/g, "");
		}
	});

	$("input#kinfname").on({
		keydown: function(e)
		{
			if (e.which === 32) 
				return false;
		},
		change: function()
		{
			this.value = this.value.replace(/\s/g, "");
		}
	});

	$("input#marital").on({
		keydown: function(e)
		{
			if (e.which === 32) 
				return false;
		},
		change: function()
		{
			this.value = this.value.replace(/\s/g, "");
		}
	});

  $("input#gender").on({
    keydown: function(e)
    {
      if (e.which === 32) 
        return false;
    },
    change: function()
    {
      this.value = this.value.replace(/\s/g, "");
    }
  });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>


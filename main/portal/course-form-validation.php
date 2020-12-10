<?php include("../include/header.php");


unset($_SESSION["coursedata"]);
unset($_SESSION["courseserial"]);
?>
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

   
<br/>
   <?php include("../include/sidebar.php");?>

      <div class="content-body">
        <!-- Form repeater section start -->
        <section id="form-repeater">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">Account Validation</h4>
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
                   <?php 

                    if (isset($_SESSION['serialerror'])) 
                    {
                      
                      echo '
			                <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["serialerror"].'
                        </div>

			              ';
                      
                      unset($_SESSION['serialerror']);

                    }

                  
                     ?>
                     <form action="datacourse-form" autocomplete="off" class="form row" enctype="multipart/form-data" method="post">


                      <div class="form-group col-md-6 mb-2">
                        <label>Enter Matric No.</label>
                        <input type="text" class="form-control" maxlength="12" required="" id="matno" placeholder="Enter Matric No. " style="text-transform: uppercase;" name="matno">
                      </div>

                     
                         <div class="form-group col-md-6 mb-2" id="serialdiv">
                        <label>Enter Serial Number</label>
                        <input type="text" class="form-control" maxlength="16" style="text-transform: uppercase;" placeholder="Enter Serial Number" id="serial" name="serial">
                      </div>
                     
                     
                      <div class="form-group col-md-6 mb-2">
                        <label>Current Session</label>
                        <input type="text" value="<?php echo"$session";?>" required="" readonly="" class="form-control" placeholder="Session" name="session">
                      </div>

                      <div class="form-group col-md-6">
                        <label>Select Current Level</label>
                          <select onselect="this.className = ''" class="border-primary form-control" onchange ="ShowHideDiv(this.value)"  required id="level" name="level">
                              <option selected disabled="">Select Current Level</option>
                              <?php
                              if ($first100 == 'ON') {
                                ?>
                              <option value="100">100 LEVEL</option>
                                <?php
                              }

                              if ($first200 == 'ON') {
                                ?>
                              <option value="200">200 LEVEL</option>
                                <?php
                              }
                              
                              if ($first300 == 'ON') {
                                ?>
                              <option value="300">300 LEVEL</option>
                                <?php
                              }
                              ?> 
                                                           
                              <option value="Ex-300">EX-300 LEVEL</option>
                                
                          </select>
                          <small style="color: red">Make sure you select current Level</small>
                      </div>


                   
                      <div class="form-group col-md-6 mb-2">
                        <label>Semester</label> 
                        <input type="text" class="form-control" value="<?php echo $semesterad =='First' ? 'First' : 'Second';?>" required="" readonly="" id="semester" placeholder="Level" name="semester">
                      </div>


                       <div class="form-group col-md-6 mb-2" id="password" style="display: none">
                        <label>Select Password</label>
                        <input type="password" maxlength="10" minlength="4" class="form-control" id="pass" placeholder="Select Login Password" name="password">
                        <small style="color: red">Max Length of password must not greater than 10 and minimum is 4</small>
                      </div>
                    
                     <div class="form-group overflow-hidden">
                        <div class="col-12"><br/>
                          <button name="validatebtn" class="btn btn-primary">
                            <i class="ft-plus"></i> Validate
                          </button>
                        </div>
                      </div>
                      
                    </form>
                      
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
   <?php include("../include/footer.php");?>

   <script>
  $("input#matno").on({
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

<script type="text/javascript">

    function ShowHideDiv(value) {

        var levels = document.getElementById("level");
        var semesters = document.getElementById("semester");
        var serials = document.getElementById("serial");
        var passin = document.getElementById("pass");


        var dsemesters = semesters.value;
        if (value == '100' && dsemesters == 'First') {

          password.style.display ="block";
          passin.setAttribute("required","required");
          
        }
        else
        {
          password.style.display="none";
          passin.removeAttribute("required");
          
        }


    }


</script>

<script type="text/javascript">
         var serials = document.getElementById("serial");
         var semesters = document.getElementById("semester");
         var dsemesters = semesters.value;


       if (dsemesters == 'First') {
          serials.setAttribute("required","required");
        }
        else if (dsemesters == 'Second') 
        {
          serialdiv.style.display="none";
          serials.removeAttribute("required");
        }
</script>
<?php include("../include/header.php");




if($admission !="ON")
{
    header("Location: ".$base_url."");
}
?>


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Application Form</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>/entry-requirments">Entry Requirment</a>
                </li>
                <li class="breadcrumb-item active">Application Form
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
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
        
         
          <div class="row justify-content-md-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-card-center">Pin and scratch card verifiation </h4>
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
                  <div class="card-body">
                    <?php 

                    if (isset($_SESSION['pinerror'])) 
                    {
                      
                      echo '
                        <div style="color: black" class="alert alert-danger" >
                                <span><b> Message - </b>'. $_SESSION['pinerror'].'<br/> </span>
                             </div>

                      ';
                      
                      unset($_SESSION['pinerror']);

                    }

                  
                     ?>
                     <form action="submit-form" autocomplete="off" class="form" enctype="multipart/form-data" method="post">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="eventRegInput1">Serial Number</label>
                          <input type="text" id="eventRegInput1" class="form-control" style="text-transform:uppercase" name="serial" required="" placeholder="Enter your serial number" >
                        </div>
                       <!--  <div class="form-group">
                         <label for="eventRegInput2">Pin Number</label>
                         <input type="text" id="eventRegInput2" class="form-control" style="text-transform:uppercase" name="pin" required="" placeholder="Enter your pin number" >
                       </div> -->
                        

                        <div class="form-group">
                          <label for="eventRegInput3">Phone Number</label>
                          <input type="text" id="eventRegInput2" maxlength="11" onkeypress="return OnlyNumber(event)" class="form-control" required="" placeholder="Enter your phone number" name="phonenumber">
                          <small><b style="color: red">Note:</b> This mobile number cannot be change later</small>
                        </div>
                       
                         <div class="form-group">
                          <label for="eventRegInput3">Application Method</label>
                          <select id="issueinput5" name="applicationmethod" required="" class="form-control" data-toggle="tooltip"
                          data-trigger="hover" data-placement="top" data-title="Application Method">
                            <option selected="" disabled="">Candidate Apply Method</option>
                            <option value="Jamb">Candidate with Jamb</option>
                            <option value="No Jamb">Candidate without Jamb</option>
                          </select>
                        </div>

                      </div>
                      <div class="form-actions center">
                        <button type="button" onclick="location.href='entry-requirments'" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" name="verify" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> Verify & Submit
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- // Basic form layout section end -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("../include/footer.php");?>


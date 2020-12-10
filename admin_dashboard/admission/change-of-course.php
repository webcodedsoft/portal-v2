<?php include("../include/header.php");

$st_num = $_GET["num"];

if (!empty($st_num)) {
  
  $sql = "SELECT * FROM applicationform where PhoneNumber='$st_num' OR Application_id='$st_num'";
            $qsql = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($qsql);
            $app = $row["Application_id"];
            $result = mysqli_num_rows($qsql);
if ($result < 1) {
  $_SESSION["notfound"] = "Candidate Not Found Our Database";
}

}
$sqlcourse_id ="SELECT * FROM course where course_id='$row[Department]'";
                        $qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
                        $rscourse_id = mysqli_fetch_array($qsqlcourse_id);

$sqlschool ="SELECT * FROM school where school_id='$row[School]'";
                        $qsqlschool = mysqli_query($con,$sqlschool);
                        $rsschool = mysqli_fetch_array($qsqlschool);
?>

<link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/photoswipe.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/default-skin/default-skin.css">

  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/pages/gallery.css">
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
        <!-- Description -->
        <section id="description" class="card">
          <div class="card-header">
            <h4 class="card-title">Select Session</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="card-text">
              <?php 

                    if (isset($_SESSION['notfound'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["notfound"].'
                        </div>

                    ';
                      
                      unset($_SESSION['notfound']);

                    }

                  
                     ?>
            <form method="get" >
                 <label class="card-title" for="xLargeSelect"><b>Enter Candidate Application ID or Phone Number Session</b></label>
               <fieldset class="form-group position-relative">

                <input type="text" required="" id="projectinput5" <?php echo $result > 0 ? 'value='.$app.' readonly' : '';?>  class="form-control" placeholder="Application ID or Phone Number" name="num">
              </fieldset>

           
              <div class="row py-2">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary btn-md" ><i class="ft-search"></i> Proceed</button>
                  <button type="button" onclick="location.href='<?php echo "$base_url";?>/change-of-course'" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Cancel
                        </button>
                </div>
              </div>
              </form>
            
              </div>
            </div>
          </div>
        </section>
        <!--/ Description -->
      


  <?php

  if ($result > 0) {
  ?>
   <section id="horizontal-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
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
                    <div class="card-text">
                    
                    </div>
                    <form class="form form-horizontal" method="post" action="admin-admission-edit">
                      <div class="form-body">
                      

                        <h4 class="form-section"><i class="ft-clipboard"></i> Candidate Changing of Course</h4>

                         <?php 

                    if (isset($_SESSION['coursechg'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["coursechg"].'
                        </div>

                    ';
                      
                      unset($_SESSION['coursechg']);

                    }

                  
                     ?>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput5">Candidate Name</label>
                          <div class="col-md-9">
                            <h3><?php echo $row['FirstName'];?> <?php echo $row['MiddleName'];?> <?php echo $row['LastName'];?></h3>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                           <label class="col-md-3 label-control" for="projectinput6">Candidate Application ID </label>
                          <div class="col-md-9">
                            <input type="text" required="" id="projectinput5" <?php echo $result > 0 ? 'value='.$app.' readonly' : '';?>  class="form-control" placeholder="Application ID or Phone Number" name="num">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">Select School </label>
                          <div class="col-md-9">
                            <select id="school" name="school" class="form-control">
                              <option value="<?php echo $rsschool['school_id'];?>"><?php echo $rsschool['schoolname'];?></option>
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


                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput7">Select Department</label>
                          <div class="col-md-9">
                             <select class="form-control custom-select" required id="department" name="department" data-placeholder="Choose a Department" tabindex="1">
                                <option value="<?php echo $rscourse_id['course_id'];?>"><?php echo $rscourse_id['coursetype'];?></option>
                                
                            </select>
                          </div>
                        </div>
                       
                      <div class="form-actions">
                        
                       <center>
                          <button type="submit" name="changecourse" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> Save Changes
                        </button>
                       </center>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
   </section>
        <?php
  }
  ?>

      </div>
    </div>
  </div>
</div>


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
<?php include("../include/header.php");

if(!isset($_SESSION["student_app_id"]))//!isset($_SESSION["app_id"]) && 
{
    header("Location: login");

}


unset($_SESSION["coursedata"]);
unset($_SESSION["courseserial"]);
unset($_SESSION["course_id"]);
unset($_SESSION["course_result_id"]);


?>

  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/pages/users.css">
  <link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/css/pages/timeline.css">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Welcome To ASSCOED NCE Portal </h3>
         <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo"$base_url";?>/student_dashboard">Home</a>
                </li>
                
                <li class="breadcrumb-item active">Homepage
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


      <div class="content-body">

        
        <div id="user-profile">
          <div class="row">
            <div class="col-12">
              <div class="card profile-with-cover">
                <div class="card-img-top img-fluid bg-cover height-300" style="background: url('<?php echo"$base_url";?>/images/logo.png');"></div>
                <div class="media profil-cover-details w-100">
                  <div class="media-left pl-2 pt-2">
                    <a href="#" class="profile-image">
                      <img src="<?php echo"$base_url";?>/images/students_images/<?php echo $image;?>" class="rounded-circle img-border height-100"
                      alt="Card image">
                    </a>
                  </div>
                  <div class="media-body pt-3 px-2">
                    <div class="row">
                      <div class="col"><br/><br/>
                        <h3 class="card-title" style="color: red"><?php echo $rsblg["fname"];?> <?php echo $rsblg["mname"];?></h3>
                        <p class="card-title" style="color: red"><?php echo"$matno";?></p>
                      </div>
                    
                    </div>
                  </div>
                </div>
                <nav class="navbar navbar-light navbar-profile align-self-end">
                  <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse" aria-expanded="false"
                  aria-label="Toggle navigation"></button>
                  <nav class="navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link " > <p class="card-title" style="color: red"></p></a>
                        </li>
                       
                        
                      </ul>
                    </div>
                  </nav>
              </div>
              </nav>
            </div>
          </div>
        </div>
        
          <div class="row">
              <div class="col-lg-4 col-12">
                <a onclick="timelin()">
                  <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h6 class="text-muted">News </h6>
                          <h3>Portal News</h3>
                        </div>
                        <div class="align-self-center">
                          <i class="la la-line-chart success font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
              <div class="col-lg-4 col-12">
                <a onclick="profil()">
                  <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h6 class="text-muted">Profile</h6>
                          <h3>Profile Data</h3>
                        </div>
                        <div class="align-self-center">
                          <i class="la la-user danger font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
               <div class="col-lg-4 col-12">
                <a onclick="tod()">
                  <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h6 class="text-muted">To Do</h6>
                          <h3>Course Form & Exam Results</h3>
                        </div>
                        <div class="align-self-center">
                          <i class="la la-briefcase danger font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
          </div>


         <br/>
         <section id="timeline" class="timeline-center timeline-wrapper" style="display: block;">
          <h3 class="page-title text-center">Timeline</h3>
          <ul class="timeline">
            <li class="timeline-line"></li>
            <li class="timeline-group">
              <button type="button" class="btn btn-primary"><i class="la la-calendar-o"></i> Today </button>
            </li>
          </ul>
     
                <section id="decks">
          <div class="row">
            <div class="col-12 mt-3 mb-1">
              <h4 class="text-uppercase">ASSCOED Latest News</h4>
             
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card-deck-wrapper">
                <div class="card-deck">

  <?php

$sql = "SELECT * FROM post ORDER BY ID DESC LIMIT 4";
$qsql = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($qsql)){
$id = $row['ID'];


$content = $row["Description"];
$date = $row["Dates"];
$slug = $row["Heading_Slug"];
?>  



                  <div class="card">
                    <div class="card-content">
                      <center>
                        <img class="card-img-top img-fluid" style="width: 90%; height: 150px" src="<?php echo"$base_url";?>/images/news.png"
                       />
                      </center>
                      <div class="card-body">
                        <h4 class="card-title"><?php echo $row['Heading'];?></h4>
                        <p class="card-text"><?php echo substr($content, 0, 80);?>...</p>
                         <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                          <span class="float-left"><?php echo time_since($date);?></span>
                          <span class="float-right">
                            <a href="<?php echo"$base_url";?>/news-in-details/<?php echo"$slug";?>" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
<?php
}
?>
                </div>
              </div>
            </div>
          </div>
        </section>
        
   </section>

         <section id="profile" style="display: none">
          <div class="row">
            <div class="col-12 mt-3 mb-1">
              <h4 class="text-uppercase">Profile</h4>
            </div>
          </div>
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="row mt-1">
                  <div class="col-md-2 col-sm-12">
                    <p>Name</p>
                    <h5><?php echo $rsblg["fname"];?> <?php echo $rsblg["mname"];?> <?php echo $rsblg["lname"];?></h5>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <p>Mobile Number</p>
                    <h5><?php echo $rsblg["phone"];?> </h5>
                  </div>
                 <div class="col-md-2 col-sm-12">
                    <p>Email Address</p>
                    <h5><?php echo $rsblg["email"];?> </h5>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <p>Home Address</p>
                    <h5><?php echo $rsblg["address"];?> </h5>
                  </div>

                  <div class="col-md-2 col-sm-12">
                    <p>Language</p>
                    <h5><?php echo $rsblg["language"];?> </h5>
                  </div>

                  <div class="col-md-2 col-sm-12">
                    <p>Country</p>
                    <h5><?php echo $rsblg["country"];?> </h5>
                  </div>
                  <br/><p></p>
                  <div class="card-footer px-0 py-0 col-sm-12">
                    <br/>
                  </div>


                  <div class="col-md-2 col-sm-12">
                    <p>State</p>
                    <h5><?php echo $rsblg["state"];?></h5>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <p>City</p>
                    <h5><?php echo $rsblg["city"];?> </h5>
                  </div>
                 <div class="col-md-2 col-sm-12">
                    <p>Religion</p>
                    <h5><?php echo $rsblg["religion"];?> </h5>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <p>School</p>
                    <h5><?php echo $rsschoollg["schoolname"];?> </h5>
                  </div>

                  <div class="col-md-2 col-sm-12">
                    <p>Department</p>
                    <h5><?php echo $rscourse_idlg["coursetype"];?> </h5>
                  </div>

                  <div class="col-md-2 col-sm-12">
                    <p>Gender</p>
                    <h5><?php echo $rsblg["gender"];?> </h5>
                  </div>
                  <br/><p></p>

                   
                <center>
                    <div class="col-md-12 col-sm-12">
                    <button type="button" onclick="location.href='print-bio-data'" class="btn btn-lg btn-block btn-outline-primary mb-2" id="clear-toast-btn">Bio Data Print Out</button>
                  </div>
                </center>

                </div>
              </div>
            </div>
          </div>
        </section>




        <section id="todo" style="display: none">
          <div class="row">
            <div class="col-12 mt-3 mb-1">
              <h4 class="text-uppercase">To Do</h4>
            </div>
          </div>


          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="row mt-1">
            

<!-- Course Form Section -->

            <div class="col-lg-12 col-md-12">
<form method="post" action="admission-checker-data">
               <h2>Course Form Re-print Section</h2>
               <div class="row">
                 <div class="col-md-6">
                    <div class="card-header">
                  <label class="card-title" for="xLargeSelect">Select Level</label>
                </div>
                <div class="card-block">
                  <div class="card-body">
                    <fieldset class="form-group position-relative">
                      <select class="form-control input-xl" required="" id="level" name="level">
                        <option selected disabled="">Select any avaliable level</option>
                         <?php

                        $sql = "SELECT * FROM course_registration where Matric='$matno' ORDER BY ID DESC";
                        $qsql = mysqli_query($con,$sql);
                        while($rs = mysqli_fetch_array($qsql))
                        {
                            echo "<option value='$rs[Level]'>$rs[Level] ($rs[Session]) </option>";

                           /* if (!empty($rs[Second_Semester])) {
                              echo "<option value='$rs[Level]'>$rs[Level] ($rs[Session]) Second Semester</option>";
                            }*/
                        }
                        ?>
                      </select>
                    </fieldset>
                  </div>
                </div>
                 </div>

                 <div class="col-md-6">
                    <div class="card-header">
                  <label class="card-title" for="xLargeSelect">Select Semester</label>
                </div>
                <div class="card-block">
                  <div class="card-body">
                    <fieldset class="form-group position-relative">
                      <select class="form-control input-xl" required="" id="semester" name="semester">
                        <option selected disabled="">Select any available semester</option>
                      
                      </select>
                    </fieldset>
                  </div>
                </div>
                 </div>

               </div>
                 <center>
                   <div class="col-md-2 col-sm-12">
                    <button type="submit" name="course_form_search" class="btn btn-lg btn-block btn-outline-primary mb-2" id="clear-toast-btn">Enter</button>
                  </div>
                 </center>
                  </form> 
            </div>
               
                 

                </div>
              </div>
            </div>
          </div>


<!-- Result  Section -->
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="row mt-1">
            
            <div class="col-lg-12 col-md-12">
               <form method="post" action="admission-checker-data">
               <h2> Sessional Result Section</h2>
               <div class="row">
                 <div class="col-md-6">
                    <div class="card-header">
                  <label class="card-title" for="xLargeSelect">Select Level</label>
                </div>
                <div class="card-block">
                  <div class="card-body">
                    <fieldset class="form-group position-relative">
                      <select class="form-control input-xl" required="" id="rlevel" name="rlevel">
                        <option selected disabled="">Select any avaliable level</option>
                         <?php

                        $sql = "SELECT * FROM course_registration where Matric='$matno' ORDER BY ID DESC";
                        $qsql = mysqli_query($con,$sql);

                        while($rs = mysqli_fetch_array($qsql))
                        {
                            echo "<option value='$rs[Level]'>$rs[Level] ($rs[Session]) </option>";

                           /* if (!empty($rs[Second_Semester])) {
                              echo "<option value='$rs[Level]'>$rs[Level] ($rs[Session]) Second Semester</option>";
                            }*/
                        }

                        
                        ?>
                      </select>
                    </fieldset>
                  </div>
                </div>
                 </div>

                 <div class="col-md-6">
                    <div class="card-header">
                  <label class="card-title" for="xLargeSelect">Select Semester</label>
                </div>
                <div class="card-block">
                  <div class="card-body">
                    <fieldset class="form-group position-relative">
                      <select class="form-control input-xl" required="" id="rsemester" name="rsemester">
                        <option selected disabled="">Select any available semester</option>
                      
                      </select>
                    </fieldset>
                  </div>
                </div>
                 </div>

               </div>
                 <center>
                   <div class="col-md-2 col-sm-12">
                    <button type="submit" name="result_search" class="btn btn-lg btn-block btn-outline-primary mb-2" id="clear-toast-btn">Enter</button>
                  </div>
                 </center>
                  </form> 
                 
                 

                </div>
              </div>
            </div>
          </div>
        </section>


      </div>
    </div>
  </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("../include/footer.php");?>

<script type="text/javascript">
function timelin()
{
    var timelines = document.getElementById("timeline");
    var profiles = document.getElementById("profile");
    var todos = document.getElementById("todo");

  if (timelines.style.display === "none") 
  {
    timelines.style.display = "block";
    profiles.style.display = "none";
    todos.style.display = "none";

  }
  else
  {

    timelines.style.display = "block";
  }
}



function profil()
{
    var timelines = document.getElementById("timeline");
    var profiles = document.getElementById("profile");
    var todos = document.getElementById("todo");

  if (profiles.style.display === "none") 
  {
    timelines.style.display = "none";
    profiles.style.display = "block";
    todos.style.display = "none";

  }
  else
  {

    profiles.style.display = "block";
  }
}




function tod()
{
    var timelines = document.getElementById("timeline");
    var profiles = document.getElementById("profile");
    var todos = document.getElementById("todo");

  if (todos.style.display === "none") 
  {
    timelines.style.display = "none";
    todos.style.display = "block";
    profiles.style.display = "none";

  }
  else
  {

    todos.style.display = "block";
  }
}



</script>


  <script>

     window.load=$(document).ready(function(){
$('#level').change(function(){
        var school_id = $(this).val();
        //alert("ss"+school_id);
        $.ajax({
            url:"main/include/fetch_semester.php",
            method:"POST",
            data:{schoolId:school_id},
            dataType:"text",
            success:function(data)
            {
              //alert("sss"+data);
                $('#semester').html(data);
            }
        });  

});


});

</script>




  <script>

     window.load=$(document).ready(function(){
$('#rlevel').change(function(){
        var school_id = $(this).val();
        //alert("ss"+school_id);
        $.ajax({
            url:"main/include/fetch_semester_result.php",
            method:"POST",
            data:{schoolId:school_id},
            dataType:"text",
            success:function(data)
            {
              //alert("sss"+data);
                $('#rsemester').html(data);
            }
        });  

});


});

</script>


<?php

date_default_timezone_set('America/New_York');


function time_since($since) {
  $time_ago = strtotime($since);
  $current_time = time();
  $time_diff = $current_time - $time_ago;
  $seconds = $time_diff;
  $minutes = round($seconds / 60);
  $hours = round($seconds / 3600);
  $days = round($seconds / 86400);
  $weeks = round($seconds / 604800);
  $months = round($seconds / 2629440);
  $years = round($seconds / 31553280);

  if ($seconds <= 60) 
  {
    
    return "Just Now";

  }
  elseif ($minutes <= 60) 
  {
    
    if ($minutes == 1) 
    {
      return "One minutes ago";
    }
    else
    {

      return "$minutes minutes ago";
    }

  }
  elseif ($hours <=24) 
  {
    if ($hours == 1) 
    {
      return "an hour ago";
    }
    else
    {

      return "$hours hrs ago";
    }

  }elseif ($days <=7) 
  {
    
    if ($days ==1) 
    {
      return 'yesterday';
    }
    else
    {
      return "$days days ago";
    }

  }
  elseif ($weeks <= 4.3) 
  {
    
    if ($weeks ==1) 
    {
      return "a week ago";
    }
    else
    {

      return "$weeks weeks ago";
    }

  }
  elseif ($months <=12) 
  {
    if ($months == 1) {
      
      return "a month ago";
    }
    else
    {
      return "$months months ago";
    }

  }else
  {

    if ($years == 1) {
      
      return "one year ago";

    }
    else{

      return "$years years ago";
    }
  }
    


}

?>
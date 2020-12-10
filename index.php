<?php include("include/header.php");


unset($_SESSION["app_id"]);
unset($_SESSION['pin']);
unset($_SESSION['biodatasession']);
unset($_SESSION['course_id']);
unset($_SESSION["coursedata"]);
unset($_SESSION["courseserial"]);
unset($_SESSION["course_result_id"]);
unset($_SESSION["news_ss"]);



$sql = "SELECT * FROM biodata ";
$qsql = mysqli_query($con,$sql);
$total = mysqli_num_rows($qsql);
while ($rs = mysqli_fetch_array($qsql)) 
{
  $matric=$rs['matric'];

  $matrics = strtoupper($matric);
  //echo "$matric<br/>";
$sqlp="UPDATE biodata SET application_id='$matrics' WHERE matric = '$matric'";//
            if(!$qsqlp=mysqli_query($con,$sqlp))
            {
              echo mysqli_error($con);
            }
}


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

<!--       <section id="basic-carousel">
          
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 col-sm-10">
              <div class="card">
                
                <div class="card-content">
                  <div class="card-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                         <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                      </ol>
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                          <img style="width: 1500px; height: 500px" src="<?php echo"$base_url";?>/app-assets/images/carousel/02.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img style="width: 1500px; height: 500px" src="<?php echo"$base_url";?>/app-assets/images/carousel/03.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img style="width: 1500px; height: 500px" src="<?php echo"$base_url";?>/app-assets/images/carousel/01.jpg" alt="Third slide">
                        </div>

                         <div class="carousel-item">
                          <img style="width: 1500px; height: 500px" src="<?php echo"$base_url";?>/app-assets/images/carousel/01.jpg" alt="Third slide">
                        </div>

                      </div>
                      <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>
        </section> -->
<?php include("include/sidebar.php");?>


      <div class="content-body">


         <section id="basic-carousel">
          
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="card">
                
                <div class="card-content">
                  <div class="card-body">
                  

<?php
$sql = "SELECT * FROM site_settings ORDER BY ID DESC LIMIT 4";
$qsql = mysqli_query($con,$sql);
$row = mysqli_fetch_array($qsql);
$slider = $row['Slider'];


$slider_ex = explode(",", $slider);
$i=0;
foreach ($slider_ex as $slider ) {
  
if ($i++ ==4) break;


?>

                <div class="mySlides fade">
                  <img src="<?php echo"$base_url";?>/images/slider/<?php echo"$slider";?>" style="width: 100%; height: 300px">
                </div>
<?php
}
?>
              
                </div>
                <br>

                <div style="text-align:center; display: none">
                  <span class="dot" onclick="currentSlide(1)"></span> 
                  <span class="dot" onclick="currentSlide(2)"></span> 
                  <span class="dot" onclick="currentSlide(3)"></span>
                  <span class="dot" onclick="currentSlide(4
                  )"></span>
                </div>

                </div>
              </div>
            </div>
           
          </div>
        </section>
        <!-- eCommerce statistic -->
        <div class="row">


         <?php
          if ($obtainform == 'ON' ) {
            ?>

          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                <a href="<?php echo"$base_url";?>/application-form">  
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="info">New Students</h6>
                      <h4>Application Form</h4>
                    </div>
                    <div>
                      <i class="icon-graduation info font-large-2 float-right"></i>
                    </div>
                  </div>
                </a>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 75%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>


           <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                <a href="<?php echo"$base_url";?>/admission-checker-auth"> 
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="success">New Students</h6>
                      <h4>Admission Checker</h4>
                    </div>
                    <div>
                      <i class="icon-book-open success font-large-2 float-right"></i>
                    </div>
                  </div>
                </a>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php
}
?>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                <a href="<?php echo"$base_url";?>/school-bill-checker"> 
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="warning">All Levels</h6>
                      <h4>Check Registration Fee</h4>
                    </div>
                    <div>
                      <i class="icon-docs warning font-large-2 float-right"></i>
                    </div>
                  </div>
                </a>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                <a href="<?php echo"$base_url";?>/login"> 
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">All Levels</h3>
                      <h6>Portal Account Login</h6>
                    </div>
                    <div>
                      <i class="icon-lock danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </a>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ eCommerce statistic -->


                                  
          <br/><br/>
          <section id="btnAnimation" class="btnAnimation">
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body">
                     <center>
                                <h1>Registration Countdown Clock</h1>
                                <div id="demo" class="timeout boxd textd animatedd wobbled">
                                  </div>
                                <div id="clockdiv">
                                  <div>
                                    <span id="days" class="days"></span>
                                    <div class="smalltext">Days</div>
                                  </div>
                                  <div>
                                    <span id="hours" class="hours"></span>
                                    <div class="smalltext">Hours</div>
                                  </div>
                                  <div>
                                    <span id="minutes" class="minutes"></span>
                                    <div class="smalltext">Minutes</div>
                                  </div>
                                  <div>
                                    <span id="seconds" class="seconds"></span>
                                    <div class="smalltext">Seconds</div>
                                  </div>
                                </div>
                                          </center>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


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
        
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("include/footer.php");?>

<link rel="stylesheet" type="text/css" href="<?php echo"$base_url";?>/app-assets/slider.js">


<script type="text/javascript">

  //var t = Date.parse(endtime) - Date.parse(new Date());
  //May 28, 2019"
  //var countDownDate = new Date("29, May 2019").getTime();
  var countDownDate = new Date("<?php echo $coursecloseingdate ?>").getTime();

  // Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;


    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "Days:" + hours + "Hrs:"
    + minutes + "Min:" + seconds + "Sec ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
      document.getElementById("demo").innerHTML = "Course Registration Time Out";
      document.getElementById("clockdiv").style.display="none";
        
    $.ajax({
            url:"close-registration.php",
            method:"POST",
          
        });  

    }
    else
    {
      document.getElementById("demo").style.display="none";
    }
}, 1000);
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

<script type="text/javascript">
  var slideIndex = 0;
showSlides();

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
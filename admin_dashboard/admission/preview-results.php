<?php include("../include/header.php");

$app_id = $_GET["app_id"];
$session =  $_GET["session"];
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

            <form method="get" action="preview-results">
                 <label class="card-title" for="xLargeSelect"><b>Select Session</b></label>
               <fieldset class="form-group position-relative">
                      <select class="form-control input-xl" onchange="location = this.value;" required="" name="session" id="xLargeSelect">
                        <option value="" selected disabled> Select Session</option>
                        <?php
                        $sql = "SELECT Session FROM session_table ORDER BY ID DESC";
                        $qsql = mysqli_query($con,$sql);
                        while($rs = mysqli_fetch_array($qsql))
                        {
                            echo "<option value='preview-results?session=$rs[Session]'>$rs[Session]</option>";
                        }
                        ?>
                      </select>
              </fieldset>

           
              <div class="row py-2">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary btn-md" name="sessionbtn"><i class="ft-search"></i> Proceed</button>
                  
                </div>
              </div>
              </form>
            
              </div>
            </div>
          </div>
        </section>
        <!--/ Description -->
      
    <?php
    if (!empty($app_id)) {

    	 $sql = "SELECT * FROM applicationform where Application_id='$app_id'";
      $qsql = mysqli_query($con,$sql);
      $result = mysqli_num_rows($qsql);

    if ($result > 0) {

    ?>
    <!-- Individual Result -->
        <section id="image-grid" class="card">
          <div class="card-header">
            <h4 class="card-title">Results View</h4>
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
          <div class="card-content">
           
            <div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
             

             
                  
 <?php

$olevelout = array();
$olevelresult = array();



while($row = mysqli_fetch_array($qsql)){
$id = $row['ID']; $passport = $row['Passport']; $olevel = $row['OlevelFirst'];
$jamb = $row['Jamb'];

$olevelout = explode(",", $olevel);
$counts = count($olevelout);

$sqlcourse_id ="SELECT * FROM course where course_id='$row[Department]'";
$qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
$rscourse_id = mysqli_fetch_array($qsqlcourse_id);

$sqlschool ="SELECT * FROM school where school_id='$row[School]'";
$qsqlschool = mysqli_query($con,$sqlschool);
$rsschool = mysqli_fetch_array($qsqlschool);
//foreach ($olevelout as  $olevelresult) {echo($olevelresult);}
//var_dump($olevelresult) ;
echo '<div class="card-deck-wrapper">
                <div class="card-deck">';

  foreach ($olevelout as  $olevelresult) {
?>                 
 
                  <figure class="card card-img-top border-grey border-lighten-2" itemprop="associatedMedia"
                  itemscope itemtype="http://schema.org/ImageObject">

                    <a href="<?php echo"$base_url";?>/images/result_images/<?php echo"$olevelresult";?>" itemprop="contentUrl" data-size="480x360">

                      <img class="gallery-thumbnail card-img-top" style="width: 300px; height: 300px" src="<?php echo"$base_url";?>/images/students_images/<?php echo"$passport";?>"
                      itemprop="thumbnail" alt="Image description" />
                    </a>

                    <div class="card-body px-0">
                      <h4 class="card-title"><?php echo $row["FirstName"];?> <?php echo $row["MiddleName"];?> <?php echo $row["LastName"];?> (<?php echo $row["Application_id"];?>)</h4>
                      <p class="card-text">O'Level Result <br/><?php echo $rsschool["schoolname"];?> || <?php echo $rscourse_id["coursename"];?> </p>
                    </div>
                  </figure>

<?php
}
?>
                

                  <figure class="card card-img-top border-grey border-lighten-2" itemprop="associatedMedia"
                  itemscope itemtype="http://schema.org/ImageObject">

                    <a href="<?php echo"$base_url";?>/images/result_images/<?php echo"$jamb";?>" itemprop="contentUrl" data-size="480x360">

                      <img class="gallery-thumbnail card-img-top" style="width: 300px; height: 300px" src="<?php echo"$base_url";?>/images/students_images/<?php echo"$passport";?>"
                      itemprop="thumbnail" alt="Image description" />
                    </a>

                    <div class="card-body px-0">
                      <h4 class="card-title"><?php echo $row["FirstName"];?> <?php echo $row["MiddleName"];?> <?php echo $row["LastName"];?> (<?php echo $row["Application_id"];?>)</h4>
                      <p class="card-text">Jamb Result <br/><?php echo $rsschool["schoolname"];?> || <?php echo $rscourse_id["coursename"];?> </p>
                    </div>
                  </figure>
                  </div>
              </div>
<?php
}
}
?>

                
             
              
            </div>
            <!-- Root element of PhotoSwipe. Must have class pswp. -->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
              <!-- Background of PhotoSwipe. 
             It's a separate element as animating opacity is faster than rgba(). -->
              <div class="pswp__bg"></div>
              <!-- Slides wrapper with overflow:hidden. -->
              <div class="pswp__scroll-wrap">
                <!-- Container that holds slides. 
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                  <div class="pswp__item"></div>
                  <div class="pswp__item"></div>
                  <div class="pswp__item"></div>
                </div>
                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">
                  <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Download"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader-active when preloader is running -->
                    <div class="pswp__preloader">
                      <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                          <div class="pswp__preloader__donut"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                  </div>
                  <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                  </button>
                  <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                  </button>
                  <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ PhotoSwipe -->
        </section>            

    <?php
    }
    elseif (!empty($session))   
    {
       $sql = "SELECT * FROM applicationform where Session='$session'";
      $qsql = mysqli_query($con,$sql);
      $result = mysqli_num_rows($qsql);

    if ($result > 0) {
      # code...
    
    ?>
    <!-- General Results -->

    <section id="image-grid" class="card">
          <div class="card-header">
            <h4 class="card-title">Results View</h4>
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
          <div class="card-content">
           
            <div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
             

             
                  
 <?php

$olevelout = array();
$olevelresult = array();



while($row = mysqli_fetch_array($qsql)){
$id = $row['ID']; $passport = $row['Passport']; $olevel = $row['OlevelFirst'];
$jamb = $row['Jamb'];

$olevelout = explode(",", $olevel);
$counts = count($olevelout);

$sqlcourse_id ="SELECT * FROM course where course_id='$row[Department]'";
$qsqlcourse_id = mysqli_query($con,$sqlcourse_id);
$rscourse_id = mysqli_fetch_array($qsqlcourse_id);

$sqlschool ="SELECT * FROM school where school_id='$row[School]'";
$qsqlschool = mysqli_query($con,$sqlschool);
$rsschool = mysqli_fetch_array($qsqlschool);
//foreach ($olevelout as  $olevelresult) {echo($olevelresult);}
//var_dump($olevelresult) ;
echo '<div class="card-deck-wrapper">
                <div class="card-deck">';

  foreach ($olevelout as  $olevelresult) {
?>                 
 
                  <figure class="card card-img-top border-grey border-lighten-2" itemprop="associatedMedia"
                  itemscope itemtype="http://schema.org/ImageObject">

                    <a href="<?php echo"$base_url";?>/images/result_images/<?php echo"$olevelresult";?>" itemprop="contentUrl" data-size="480x360">

                      <img class="gallery-thumbnail card-img-top" style="width: 300px; height: 300px" src="<?php echo"$base_url";?>/images/students_images/<?php echo"$passport";?>"
                      itemprop="thumbnail" alt="Image description" />
                    </a>

                    <div class="card-body px-0">
                      <h4 class="card-title"><?php echo $row["FirstName"];?> <?php echo $row["MiddleName"];?> <?php echo $row["LastName"];?> (<?php echo $row["Application_id"];?>)</h4>
                      <p class="card-text">O'Level Result <br/><?php echo $rsschool["schoolname"];?> || <?php echo $rscourse_id["coursename"];?> </p>
                    </div>
                  </figure>

<?php
}
?>
                

                  <figure class="card card-img-top border-grey border-lighten-2" itemprop="associatedMedia"
                  itemscope itemtype="http://schema.org/ImageObject">

                    <a href="<?php echo"$base_url";?>/images/result_images/<?php echo"$jamb";?>" itemprop="contentUrl" data-size="480x360">

                      <img class="gallery-thumbnail card-img-top" style="width: 300px; height: 300px" src="<?php echo"$base_url";?>/images/students_images/<?php echo"$passport";?>"
                      itemprop="thumbnail" alt="Image description" />
                    </a>

                    <div class="card-body px-0">
                      <h4 class="card-title"><?php echo $row["FirstName"];?> <?php echo $row["MiddleName"];?> <?php echo $row["LastName"];?> (<?php echo $row["Application_id"];?>)</h4>
                      <p class="card-text">Jamb Result <br/><?php echo $rsschool["schoolname"];?> || <?php echo $rscourse_id["coursename"];?> </p>
                    </div>
                  </figure>
                  </div>
              </div>
<?php
}
?>

                
             
              
            </div>
            <!-- Root element of PhotoSwipe. Must have class pswp. -->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
              <!-- Background of PhotoSwipe. 
             It's a separate element as animating opacity is faster than rgba(). -->
              <div class="pswp__bg"></div>
              <!-- Slides wrapper with overflow:hidden. -->
              <div class="pswp__scroll-wrap">
                <!-- Container that holds slides. 
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                  <div class="pswp__item"></div>
                  <div class="pswp__item"></div>
                  <div class="pswp__item"></div>
                </div>
                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">
                  <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Download"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader-active when preloader is running -->
                    <div class="pswp__preloader">
                      <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                          <div class="pswp__preloader__donut"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                  </div>
                  <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                  </button>
                  <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                  </button>
                  <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ PhotoSwipe -->
        </section>      
    <?php
    }}
    ?>
        


    </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->


 <footer class="footer footer-static footer-light navbar-border">
     <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; <?php echo date("Y");?> <a class="text-bold-800 grey darken-2" href="https://webtechfit.com"
        target="_blank">WEBTECH </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"> Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/ui/headroom.min.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo"$base_url";?>/app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js"
  type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>

 
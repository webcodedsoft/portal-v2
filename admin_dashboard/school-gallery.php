<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("include/header.php");?>

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
  



  <?php include("include/sidebar.php");?>


      <div class="content-body">
        <!-- Description -->
    <section id="dropzone-examples">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Gallery Image</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">

                  <div class="card-body">
                     <form action="portal-setting" class="dropzone dropzone-area" id="dpz-remove-thumb">

                      <div class="dz-message">Drop Image Here To Upload</div>
                    </form>
                    <small style="color: red">Only png,.jpg,.jpeg is allow</small>
    

                    
    
        <br/><br/>
                <center>
                   <button type="button" id="galleryup" class="btn btn-float btn-float-lg btn-pink"><i class="la la-cloud-upload"></i><span>Upload</span></button>
                </center>

                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
        <!--/ Description -->


        <!-- Image grid -->
          <section id="image-gallery" class="card">
          <div class="card-header">
            <h4 class="card-title">School Gallery History</h4>
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
           <?php 

                    if (isset($_SESSION['ga_id_del'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["ga_id_del"].'
                        </div>

                    ';
                      
                      unset($_SESSION['ga_id_del']);

                    }

                  
                     ?>
            <div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
              <div class="row">
<?php
$sql = "SELECT * FROM site_settings where ID='1' ";
$qsql = mysqli_query($con,$sql);
$row = mysqli_fetch_array($qsql);
$gallery = $row['Gallery'];

$slider_ex = explode(",", $gallery);
foreach ($slider_ex as $gallery ) {


?>                      
                <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                  <a href="<?php echo"$base_url";?>/images/gallery/<?php echo"$gallery";?>" itemprop="contentUrl" data-size="480x360">
                    <img class="img-thumbnail img-fluid" style="width: 100%; height: 200px" src="<?php echo"$base_url";?>/images/gallery/<?php echo"$gallery";?>"
                    itemprop="thumbnail" />
                  </a>
                   <h2><a href="deleting?del_gallery=<?php echo"$gallery";?>">Delete</a></h2>
                 
                </figure>
              
              <?php } ?> 
              </div>
              
            </div>
            <!--/ Image grid -->
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
        <!--/ Image grid -->
    
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("include/footer.php");?>

<script src="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js"
  type="text/javascript"></script>
  <script src="<?php echo"$base_url";?>/app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js"
  type="text/javascript"></script>

   <script src="<?php echo"$base_url";?>/app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js"
  type="text/javascript"></script>
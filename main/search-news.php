<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("include/header.php");

unset($_SESSION["app_id"]);
unset($_SESSION['pin']);
unset($_SESSION['biodatasession']);
unset($_SESSION['course_id']);
unset($_SESSION["coursedata"]);
unset($_SESSION["courseserial"]);
unset($_SESSION["course_result_id"]);



?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
        <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>

   <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Welcome To ASSCOED NCE Portal News</h3>
         
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
        <!-- Search form-->
        <section id="search-website" class="card overflow-hidden">
          <div class="card-header">
            <h4 class="card-title">Website search results</h4>
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
            <div class="card-body pb-0">
           <!--  <form method="post" action="admission-checker-data">
             <fieldset class="form-group position-relative mb-0">
               <input type="text" name="news_search" class="form-control form-control-xl input-xl" id="iconLeft1" placeholder="Explore Asscooed ...">
               <div class="form-control-position">
                 <i class="ft-mic font-medium-4"></i>
               </div>
             </fieldset>
             </form> -->
            </div>
               <!--Search Result-->
            <div id="search-results" class="card-body">
              <div class="row">
                <div class="col-12 col-md-8">

                
                
                    <!--search with list-->
                    <?php
                  
						  $news_s = $_SESSION["news_ss"];

					$sqln = "SELECT * FROM post WHERE Heading LIKE '%".$news_s."%' ORDER BY ID DESC ";
					$qsqln = mysqli_query($con,$sqln);
					$resultsn = mysqli_num_rows($qsqln);
					?>
					 <p class="text-muted font-small-3">About <?php echo number_format((float)$resultsn, 2, '.', ''); ?> results (0.58 seconds) </p>
					<?php

						while($rown = mysqli_fetch_array($qsqln)){
						$id = $rown['ID'];

						$headingn = $rown["Heading"];
						$contentn = $rown["Description"];
						$daten = $rown["Dates"];
						$slugn = $rown["Heading_Slug"];
                    ?>
                	
                <ul class="media-list p-0">
                    <li class="media">
                      <div class="media-body">
                        <p class="lead mb-0">
                          <a href="<?php echo"$base_url";?>/news-in-details/<?php echo"$slugn";?>">
                            <span class="text-bold-600"><?php echo"$headingn";?></span>
                          </a>
                        </p>
                        <p class="mb-0"><a href="<?php echo"$base_url";?>/news-in-details/<?php echo"$slugn";?>" class="teal darken-1"><?php echo"$base_url";?>/news-in-details/<?php echo"$slugn";?>/ <i class="la la-angle-down" aria-hidden="true"></i></a></p>
                       
                        <p>
                          <span class="text-muted"><b><?php echo"$daten";?></b></span>
                           <?php echo"$contentn";?></p>
                       
                      </div>
                    </li>
				</ul>
                    <?php
                    }
                 
                                   ?>
                
                    <!--search with image-->
                   
                    
                   
                  
                </div>
                <div class="col-12 col-md-4">
                  <div class="card border-grey border-lighten-2">
                    <div class="card-body px-0">
                      <h4 class="card-title">ASSCOED Latest News</h4>
                    </div>
                    <img class="img-fluid" src="<?php echo"$base_url";?>/images/news.png">
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>



        <!--/ Search form -->
      </div>
    </div>
  </div>
</div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("include/footer.php");?>
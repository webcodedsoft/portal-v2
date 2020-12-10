<?php 
error_reporting(0);
include_once("../function/dbconfig.php");

include("include/header.php");?>
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
   
      
      
        <!-- Basic Horizontal Timeline -->
        <div class="row match-height">


          <div class="col-xl-12 col-lg-12">
  <form action="portal-setting" class="form-horizontal" enctype="multipart/form-data" method="post">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Post News</h4>
              </div>
              
              <div class="card-content">
                <?php 

                    if (isset($_SESSION['newsmesg'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["newsmesg"].'
                        </div>

                    ';
                      
                      unset($_SESSION['newsmesg']);

                    }

                  
                     ?>
                <div class="card-body">
                  <p class="card-text">
                    <b>News Title</b>
                  </p>
                   <fieldset class="form-group position-relative">
                      <input type="text" class="form-control form-control-xl input-xl" name="heading" id="iconLeft3" placeholder="Input the news title here">
                      <div class="form-control-position">
                        <i class="icon-pencil info font-medium-4"></i>
                      </div>
                    </fieldset>

                    <b>
                      News Content
                    </b>
                    <fieldset class="form-group position-relative">
                      <textarea class="form-control border-primary" name="description" placeholder="Input the news content body here" id="tareaColor2" rows="3"></textarea>
                    </fieldset>
                </div>
              </div>
              <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                <span class="float-right">
                  <div class="form-actions">
                <button type="submit" name="postbtn" class="btn btn-warning"> Post News
                </button>
            </div>
                </span>
              </div>
            </div>
            </form>
          </div>


          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">News Timeline History</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <?php 

                    if (isset($_SESSION['newsdel'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["newsdel"].'
                        </div>

                    ';
                      
                      unset($_SESSION['newsdel']);

                    }

                  
                     ?>
              <div class="card-content">
                <div class="table-responsive">
                  <table id="recent-orders" class="table table-hover table-xl mb-0">
                    <thead>
                        <tr>
                            <th class="border-top-0">S/N</th>
                            <th class="border-top-0">Heading</th>
                            <th class="border-top-0">Description</th>
                            <th class="border-top-0">Date</th>
                            <th class="border-top-0">Status</th>
                            <th class="border-top-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$sn=0;
$sql = "SELECT * FROM post where Status='Active' ORDER BY ID DESC LIMIT 10";
$qsql = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($qsql)){
$id = $row['ID'];

 $description = $row['Description'];

 //$content = strpos($description, ' ', 200);
 $content = substr($description, 0, 100);

$sn++;
?>                        
                     <tr>
                        <td><?php echo $sn;?></td>
                        <td><?php echo $row['Heading'];?></td>
                        <td><?php echo $content ;?>...</td>
                        <td><?php echo $row['Dates'];?></td>
                        <td><?php echo $row['Status'];?></td>

                        <td><a data-toggle="modal" data-target="#wobble<?php echo $row['ID'];?>" data-action="delete"><i class="ft-x"></i></a></td>

                        <div class="modal animated wobble text-left" id="wobble<?php echo"$id";?>" tabindex="-1" role="dialog"
                          aria-labelledby="myModalLabel44" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel44">Question?</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  
                                  <h5>Are you sure you want to delete this?</h5>
                                  <div class="alert alert-success" role="alert">
                                    <span class="text-bold-600"><h3>?</h3></span> Your Selected News Will be Deleted if You continue.
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                                  <button type="button" onclick="location.href='deleting?postid=<?php echo"$id";?>'" class="btn btn-outline-primary">Yes</button>
                                </div>
                              </div>
                            </div>
                          </div>


                    </tr>
                               <?php } ?>                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Basic Horizontal Timeline -->


      </div>
    </div>
  </div>
</div>
</div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("include/footer.php");?>
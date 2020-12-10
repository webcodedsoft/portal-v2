<?php 
error_reporting(0);

include("../include/header.php");

unset($_SESSION["fname"]);
unset($_SESSION["mat"]);
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
        <!-- Dropzone section start -->
        <section id="dropzone-examples">
        
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Tips for results uploading</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <ul class="list-unstyled">
                      <li><i class="ft-circle mr-1"></i> If you  want to compute result make sure your result format merge the below format:<br/>
                        <center><img src="<?php echo"$base_url";?>/images/result_sample.png"></center> 
                        <br/>
                      </li>

                      <li><i class="ft-circle mr-1"></i> And make sure <code>you remove the heading</code> I put the heading their so that you will know what value is inside each column.
                        <br/>
                      </li>

                      <li><i class="ft-circle mr-1"></i> And if students result is not complete for example <code>Student EDU 111 result is not present it's advisable to right ABS in place of the score </code>if you leave it blank it may affect other result.
                      </li>

                      <li><i class="ft-circle mr-1"></i> Make sure you save the excel file in csv extention format as shown in the below image<br/>
                        <center><img style="width: 754px; height: 224px" src="<?php echo"$base_url";?>/images/result_save_smaple.png"></center> 
                        <br/>

                       </li>
                      <li><i class="ft-circle mr-1"></i> After all the above mentioned steps has been follow we are good to upload the result.
                      </li>
                      
                     
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Result</h4>
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
                    

                     <?php 

                    if (isset($_SESSION['resulterr'])) 
                    {
                      
                      echo '
                      <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh snap!</strong> '.$_SESSION["resulterr"].'
                        </div>

                    ';
                      
                      unset($_SESSION['resulterr']);

                    }

                  

                  if (isset($_SESSION['resultsucc'])) 
                    {
                      
                      echo '
                      <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                        role="alert">
                          <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Oh Yeah!</strong> '.$_SESSION["resultsucc"].'
                        </div>

                    ';
                      
                      unset($_SESSION['resultsucc']);

                    }
                     ?>

               
                  
                    <form action="admin-cours-registration" validation="" enctype="multipart/form-data" method="POST">
                        <div class="row">
                          
                            <div class="col-md-10">
                              <fieldset class="form-group">
                                <div class="custom-file">
                                  <input type="file" name="result_file" required="" class="custom-file-input" id="inputGroupFile01">
                                  <label class="custom-file-label" for="inputGroupFile01">Select Result file in CSV format</label>
                                </div>
                              </fieldset>
                            </div>
                          
                          
                            <div class="col-md-2">
                              <center>
                                <button  type="submit" id="upload_result" name="upload_result" class="btn btn-info mb-1"><i class="ft-upload"></i> Upload Result</button>
                              </center>
                            </div> 

                        </div> 
                    </form> 
                            <center><h1><b>OR</b></h1></center>

                            <center><h3><b>Compute Result</b></h3></center>


                            <br/><br/>

                  <center>
                      <div class="col-md-4">
                      <button  type="button" onclick="location.href='course-result-compute'" class="btn btn-info mb-1"><i class="ft-upload"></i> Compute Result</button>
                    </div>
                  </center>



 
                   
                     
                       
                     

                  
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </section>
        <!-- // Dropzone section end -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("../include/footer.php");?>
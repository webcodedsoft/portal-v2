<?php include("../include/header.php");


if (!isset($_SESSION['pin'])) //!isset($_SESSION["app_id"]) && 
{
  header("Location: application-form");
}




//unset($_SESSION["app_id"]);
//unset($_SESSION['pin']);
?>



<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Application Form</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo "$base_url"; ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo "$base_url"; ?>/entry-requirments">Entry Requirment</a>
                  </li>
                  <li class="breadcrumb-item active">Application Form
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
              <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> ASSCOED NCE Portal</button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                <a class="dropdown-item" href="<?php echo "$base_url"; ?>/login">NCE Login Portal</a>
                <a class="dropdown-item" href="<?php echo "$base_url"; ?>/entry-requirments">Registration Instruction </a>
                <?php
                if ($first100 == 'ON' && $semester = 'First') {
                ?>
                  <li><a class="dropdown-item" href="<?php echo "$base_url"; ?>/validate-admission">Bio Data</a>
                  </li>
                <?php
                }

                if ($first100 == 'ON' || $first200 == 'ON' || $first300 == 'ON') {
                ?>
                  <li><a class="dropdown-item" href="<?php echo "$base_url"; ?>/course-form-validation">Create Course Form</a>
                  </li>
                <?php
                }
                ?>

              </div>
            </div>
          </div>
        </div>

        <br />
        <?php include("../include/sidebar.php"); ?>


        <div class="content-body">
          <!-- Form wizard with step validation section start -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="horz-layout-colored-controls">ONLINE APPLICATION FORM</h4>
                  <small>Kindly fill the following application form with valid records...</small>
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

                    <form id="regForm" class="form form-horizontal" action="submit-form" method="post">




                      <!-- Personal Data -->
                      <div class="tab">
                        <div class="form-body">
                          <h4 class="form-section"><i class="la la-eye"></i> Personal Data</h4>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput1">Fist Name<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <input type="text" id="firstname" style="text-transform: capitalize;" value="<?php echo $rsprint['FirstName']; ?>" oninput="this.className = ''" class="form-control border-primary" placeholder="First Name" name="firstname">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput2">Middle Name<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <input type="text" id="middlename" style="text-transform: capitalize;" value="<?php echo $rsprint['MiddleName']; ?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Middle Name" name="middlename">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput3">Last Name<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <input type="text" id="lastname" style="text-transform: capitalize;" value="<?php echo $rsprint['LastName']; ?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Last Name" name="lastname">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput4">Email Address<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <input type="email" id="email" value="<?php echo $rsprint['Email']; ?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Email Address" name="email">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput3">Phone Number<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <input type="text" id="userinput3" required="" readonly="" value="<?php echo $rsprint['PhoneNumber']; ?>" oninput="this.className = ''" class="form-control border-primary" placeholder="Phone Number" name="phonenumber">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput4">Marital Status<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <select onselect="this.className = ''" class="border-primary form-control" required id="marital" name="marital">
                                    <option selected value="<?php echo $rsprint['Marital']; ?>"><?php echo $rsprint['Marital']; ?></option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorce">Divorce</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput3">Gender<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <select onselect="this.className = ''" class="border-primary form-control" required id="gender" name="gender">
                                    <option value="<?php echo $rsprint['Gender']; ?>"><?php echo $rsprint['Gender']; ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput4">Date of Birth<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <div class="position-relative has-icon-left">
                                    <input type="date" id="timesheetinput3" oninput="this.className = ''" value="<?php echo $rsprint['Dob']; ?>" class="border-primary form-control" name="dob">
                                    <div class="form-control-position">
                                      <i class="ft-message-square"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput3">Select Country<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <select name="country" required="" onselect="this.className = ''" class="border-primary form-control countries order-alpha presel-byip" id="countryId">
                                    <option value="<?php echo $rsprint['Country']; ?>"><?php echo $rsprint['Country']; ?></option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput4">Select State<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <select name="state" required="" onselect="this.className = ''" class="border-primary form-control states order-alpha" id="stateId">
                                    <option value="<?php echo $rsprint['State']; ?>"><?php echo $rsprint['State']; ?></option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput3">Select Town<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <select name="city" onselect="this.className = ''" class="border-primary form-control cities order-alpha" id="cityId">
                                    <option value="<?php echo $rsprint['City']; ?>"><?php echo $rsprint['City']; ?></option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput4">Address<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <input type="text" oninput="this.className = ''" style="text-transform: capitalize;" value="<?php echo $rsprint['Address']; ?>" class="border-primary form-control" name="address">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="userinput3">Entry Session<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <select onselect="this.className = ''" class="border-primary form-control" required id="userinput3" name="session">
                                    <!-- <option selected value="<?php echo "$session"; ?>"><?php echo "$session"; ?></option> -->
                                    <?php
                                      $sql_se = "Select * From session_table ORDER BY Session DESC";
                                      $result_se = mysqli_query($con, $sql_se);
                                      while ($row_se = mysqli_fetch_array($result_se)) {
                                        echo '<option value="' . $row_se["Session"] . '">' . $row_se["Session"] . '</option>';
                                      }
                                    ?>
                                  </select>
                                  <!-- <input type="hidden" id="userinput3" oninput="this.className = ''" required="" readonly="" value="<?php echo "$session"; ?>" class="form-control border-primary" placeholder="Current Session" name="session"> -->
                                </div>
                              </div>
                            </div>

                          </div>

                        </div>

                      </div>





                      <!-- Jamb Tab -->

                      <?php

                      if ($rsprint['JambOption'] == 'Jamb') {
                      ?>

                        <div class="tab">
                          <div class="form-body">
                            <h4 class="form-section"><i class="la la-eye"></i> Jamb Data</h4>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput3">Jamb Reg. No<span class="danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" id="utmeno" oninput="this.className = ''" style="text-transform: uppercase;" value="<?php echo $rsprint['Utmeno']; ?>" class="border-primary form-control" placeholder="Jamb Registration Number" name="utmeno">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput4">Jamb Score<span class="danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" id="jambscore" oninput="this.className = ''" value="<?php echo $rsprint['JambScore']; ?>" class="border-primary form-control" onkeypress="return OnlyNumber(event)" placeholder="Jamb Score" name="jambscore">
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput4">College of Choice<span class="danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" oninput="this.className = ''" style="text-transform: capitalize;" placeholder="First College of Choice" value="<?php echo $rsprint['CollegeChoice']; ?>" class="border-primary form-control" name="collegechoice">
                                  </div>
                                </div>
                              </div>

                            </div>

                          </div>
                        </div>

                      <?php
                      }
                      ?>







                      <!-- School Tab -->

                      <div class="tab">
                        <div class="form-body">
                          <h4 class="form-section"><i class="la la-eye"></i> Select School & Department</h4>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput1">Select School<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <select onselect="this.className = ''" class="border-primary form-control" required id="school" name="school">
                                    <option selected value="<?php echo $rsprint['School']; ?>"><?php echo $rsschool['schoolname']; ?></option>
                                    <?php
                                    $sql = "Select * From school";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                      echo '<option value="' . $row["school_id"] . '">' . $row["schoolname"] . '</option>';
                                    }

                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="userinput2">Select Department<span class="danger">*</span></label>
                                <div class="col-md-9">
                                  <select onselect="this.className = ''" class="border-primary form-control" required="" id="department" name="department">
                                    <option selected value="<?php echo $rsprint['Department']; ?>"><?php echo $rscourse_id['coursetype']; ?></option>

                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>


                        </div>

                      </div>





                      <!-- Passport Tab -->
                      <div class="tab">

                        <form></form>
                        <div class="form-body">
                          <h4 class="form-section"><i class="la la-eye"></i> Passport Uploading</h4>
                          <small>NOTE: Any image to be uploaded must not greater than 200KB</small>
                          <div class="card-body col-md-12">

                            <form action="submit-form" class="dropzone dropzone-area" id="dpz-single-file">
                              <div class="dz-message">Drop Passport Here To Upload</div>
                            </form>
                            <small style="color: red">Only png,.jpg,.jpeg is allow</small>

                            <br /><br />
                            <button type="button" id="passportbtn" class="btn btn-float btn-float-lg btn-pink"><i class="la la-cloud-upload"></i><span>Upload</span></button>

                          </div>
                        </div>

                      </div>





                      <!-- Result Tab -->

                      <div class="tab">

                        <form>
                        </form>

                        <div class="form-body">
                          <h4 class="form-section"><i class="la la-eye"></i> Results Uploading</h4>
                          <small>NOTE: Any image to be uploaded must not greater than 200KB</small>
                          <div class="row">
                            <div class="card-body col-md-6">
                              <label class="col-md-6 label-control" for="userinput1"><b>O'Level Sitting Result </b><span class="danger">*</span></label>
                              <form action="submit-form" class="dropzone dropzone-area" id="dpz-multiple-files">
                                <div class="dz-message">Drop O'Level Result Here To Upload</div>
                              </form>
                              <small style="color: red">Only png,.jpg,.jpeg is allow</small>


                              <br /><br />
                              <button type="button" id="olevelbtn" class="btn btn-float btn-float-lg btn-pink"><i class="la la-cloud-upload"></i><span>Upload</span></button>

                            </div>


                            <?php

                            if ($rsprint['JambOption'] == 'Jamb') {
                            ?>
                              <div class="card-body col-md-6">
                                <label class="col-md-6 label-control" for="userinput1"><b>Jamb Result</b><span class="danger">*</span></label>
                                <form action="submit-form" class="dropzone dropzone-area" id="dpz-file-limits">
                                  <div class="dz-message">Drop Jamb Result Here To Upload</div>
                                </form>
                                <small style="color: red">Only png,.jpg,.jpeg is allow</small>


                                <br /><br />
                                <button type="button" id="jambbtnup" class="btn btn-float btn-float-lg btn-pink"><i class="la la-cloud-upload"></i><span>Upload</span></button>

                              </div>
                            <?php
                            }
                            ?>


                          </div>
                        </div>

                      </div>


                      <h4 class="form-section"> </h4>

                      <div style="overflow:auto;">
                        <div style="float:right;">
                          <button type="button" id="prevBtn" class="btn btn-warning mr-1" onclick="nextPrev(-1)">Previous</button>
                          <button type="button" id="nextBtn" name="submitall" class="btn btn-primary" onclick="nextPrev(1)"> <i class="la la-check-square-o"></i> Next</button>
                        </div>
                      </div>

                    </form>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>
                    </div>




                  </div>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("../include/footer.php"); ?>


<script>
  window.load = $(document).ready(function() {
    $('#school').change(function() {
      var school_id = $(this).val();
      //alert("ss"+school_id);
      $.ajax({
        url: "main/include/fetch_course.php",
        method: "POST",
        data: {
          schoolId: school_id
        },
        dataType: "text",
        success: function(data) {
          //alert("sss"+data);
          $('#department').html(data);
        }
      });

    });


  });
</script>


<script>
  $("input#firstname").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");
    }
  });

  $("input#middlename").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");
    }
  });

  $("input#lastname").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");
    }
  });

  $("input#email").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");
    }
  });

  $("input#jambscore").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");
    }
  });

  $("input#utmeno").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");
    }
  });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
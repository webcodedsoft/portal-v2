<?php include("../include/header.php");?>

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


     <?php include("../include/sidebar.php");?>


      <div class="content-body">
        <!--Grid options-->
        <section id="grid-options" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Entry Requirments and Instructions</h4>
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
                <div class="card-body">
                  <div class="bs-callout-primary callout-border-left p-1">
                      <h1 class="text-bold-600"><?php echo"$session";?> ADMISSION EXERCISE | Registration Guidelines</h1>
                      <p>The Admission Exercise for <?php echo"$session";?> ADMISSION into the Assanusiyyah College of Education Odeomu Osun State. Candidates are requested to note the following guidelines:</p>
                    </div>
                  <br/>
                  <p><b style="color: #1E9FF2"> A. PROGRAMME AVAILABLE</b> </p>
                  <p style="color: black">1. NCE </p>
                  <p style="color: black">2. PRE-NCE</p>
                  <br/>

                  <p><b style="color: #1E9FF2"> B. ELIGIBILITY INTO THE PROGRAMMES </b></p>
                  <p style="color: black">1. Candidate(s) who made the Assanusiyyah College of Education Odeomu Osun State. as their choice of institution during the <?php echo"$session";?> UTME.</p>
                  <p style="color: black">2. Candidates who did not choose the College initially are also eligible to apply.</p>
                  <br/>


                  <p><b style="color: #1E9FF2"> PRE-NCE PROGRAMME</b>  </p>
                  <p style="color: black">1. Candidate(s) who score below cutoff marks in <?php echo"$session";?> UTME </p>
                  <p style="color: black">2. Candidate(s) with deficiencies in SSCE/GCE O’ Level (WAEC, NECO, NABTEB), results or equivalent.</p>
                  <br/>


                  <p><b style="color: #1E9FF2"> REQUIREMENTS FOR THE SCREENING EXERCISE</b> </p>
                  <p style="color: black">1. Candidate will be expected to complete the admission screening form on-line.</p>
                  <p style="color: black">2. 2 copies of UTME e-notification of results slip if available. </p>
                  <p style="color: black">3. Original and photocopy of the print-out copy of the on-line completed admission screening application form.</p>
                  <p style="color: black">4. SSCE/GCE O’ Level (WAEC, NECO, NABTEB) results or equivalent.</p>
                  <br/>



                  <p><b style="color: #1E9FF2"> C. METHOD OF APPLICATION</b> </p>
                  <p style="color: black">1. Proceed to any Commercial Bank to make a deposit of non-refundable fee of Three Thousand (N3,000.00) only for the purpose of online registration for the screening through the below bank details:
                    <br/>
                     <hr>
                      <b style="color: black">
                        <b>Account Name: Assanusiyyah College of Education<br>
                        Account Number: 2014841716<br>
                        Bank Name: First Bank of Nigeria<b><br>
                        Amount to Pay (Without Bank Charges): #3000<br><br>
  
                  </b></b></b>
                  </p>

                  <p style="color: red">2. Please note that full payment for these items are required for completion and submission of the application form. </p>
                

                   <div class="bs-callout-danger callout-border-left mt-1 p-1">
                      <strong>NOTE:</strong>
                  <p style="color:black"> i.&nbsp; Please be informed that the candidate's name must be written as the DEPOSITOR'S NAME.</p>
                  <p style="color:black"> ii.&nbsp;Take the teller to the COLLEGE BURSARY for the collection of the PIN to proceed with your application form.</p>
                  <p style="color:black">iii.&nbsp;OR call this Number 08037008251 to verify your payment, for the collection of the PIN to proceed.</p>
                  <p style="color:black">v.&nbsp;After the PIN has been collected, then click on proceed button</p>
                  <p style="color:black">iv.&nbsp;Make sure that your O'LEVEL RESULTS, PASSPORT are available to proceed with your Application Form.</p>
                    </div>

                  <br/>
                  <p style="color:black">3. Carefully complete and submit the online application form; </p>

                  <p style="color: black">4. Upload digital copies of scanned O’level result(s) and passport photograph not more than 200kb which must be in JPEG, JPG or PNG with no eye glasses or veil and</p>

                  <p style="color: black">5. Print out the Online Application Form to ascertain successful registration.</p>
                  


                <center>
                  <button type="button" onclick="location.href='<?php echo"$base_url";?>/application-form'" class="btn mb-1 btn-success btn-icon btn-lg btn-block"><i class="la la-check-circle"></i> Click Here to Apply</button>
                </center>
                
                <br/><br/>
                 <div class="bs-callout-info callout-border-left mt-1 p-1">
                      <strong>Contact Us</strong>
                      <p>For enquiry, contact College Admission and Academic Board unit or the following GSM Numbers:</p>
                      <br/> <?php echo "$contactus";?>
                    </div>
                



                </div>
              </div>
            </div>
          </div>
        </section>
       
       
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include("../include/footer.php");?>
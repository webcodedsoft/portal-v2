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
        
        <div class="row">
                      <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                          <!-- block level buttons -->
                          <button type="button" onclick="timetable()" class="btn btn-outline-info btn-lg btn-glow mr-1 mb-1 btn-block">SCHOOL TIME TABLE</button>
                        
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                          <!-- block level buttons with icon -->
                          <button type="button" onclick="calender()" class="btn btn-outline-success btn-icon btn-glow btn-lg mr-1 mb-1 btn-block">SCHOOL CALENDER</button>
                         
                        </div>
                      </div>
                    </div>


        <!--Grid options-->
        <section id="timetablediv" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">School Time Table</h4>
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
                      <h1 class="text-bold-600"> SCHOOL TIME TABLE</h1>
                    </div>
                  <br/>
                  
                  
                    <img alt="" style="width: 100%; height: 500%" src="<?php echo"$base_url";?>/images/timetable/<?php echo"$time_table";?>">
                      

                     <br/><br/>
                     <center>
                      <?php

                      if (!empty($time_table)) {
                        ?>
                          <a href="<?php echo"$base_url";?>/images/timetable/<?php echo"$time_table";?>" download="<?php echo"$time_table";?>" class="btn btn-float btn-float-lg btn-pink"><i class="la la-cloud-download"></i><span>Download Time Table</span></a>
                      <?php
                      }

                     ?>
                     
                      
                     </center>
                </div>
              </div>
            </div>
          </div>
        </section>
       
       

        <section id="calenderdiv" style="display: none" class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">School Calender</h4>
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
                      <h1 class="text-bold-600"> SCHOOL CALENDER</h1>
                    </div>
                  <br/>
                  
                  
                    <img alt="" style="width: 100%; height: 500%" src="<?php echo"$base_url";?>/images/timetable/<?php echo"$school_calender";?>">
                
                <br/><br/>
                     <center>
                     <?php

                      if (!empty($school_calender)) {
                        ?>
                          <a href="<?php echo"$base_url";?>/images/timetable/<?php echo"$school_calender";?>" download="<?php echo"$school_calender";?>" class="btn btn-float btn-float-lg btn-pink"><i class="la la-cloud-download"></i><span>Download School Calender</span></a>
                      <?php
                      }

                     ?>
                     </center>
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

<script type="text/javascript">
  function timetable()
{
    var timetabledivs = document.getElementById("timetablediv");
    var calenderdivs = document.getElementById("calenderdiv");

  if (timetabledivs.style.display === "none") 
  {
    calenderdivs.style.display = "none";
    timetabledivs.style.display = "block";

  }
 
}




 function calender()
{
    var timetabledivs = document.getElementById("timetablediv");
    var calenderdivs = document.getElementById("calenderdiv");

  if (calenderdivs.style.display === "none") 
  {
    calenderdivs.style.display = "block";
    timetabledivs.style.display = "none";

  }
  
}
</script>
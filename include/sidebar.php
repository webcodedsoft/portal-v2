      <div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          	 
          	 <li class=" nav-item"><a href="<?php echo"$base_url";?>"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.table_jsgrid.main">Home</span></a>
            </li>

            <?php

            if($admission =="ON")
            {
            ?>
              <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Admission</span></a>
                <ul class="menu-content">

                <li><a class="menu-item" href="<?php echo"$base_url";?>/entry-requirments" data-i18n="nav.page_layouts.1_column">Entry Requirments</a>
                </li>

                <?php
                if ($obtainform == 'ON' ) {
                  ?>
                <li><a class="menu-item" href="<?php echo"$base_url";?>/application-form" data-i18n="nav.page_layouts.2_columns">Application Form</a>
                </li>

                  <li><a class="menu-item" href="<?php echo"$base_url";?>/admission-checker-auth" data-i18n="nav.page_layouts.2_columns">Admission Checker</a>
                </li>
                     
                  <?php
                }
                ?>


              
                 
                </ul>
              </li>
            <?php
            }
            ?>
           
           
            <li class=" nav-item"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.navbars.main">NCE Portal</span></a>
              <ul class="menu-content">

              	<li><a class="menu-item" href="<?php echo"$base_url";?>/entry-requirments" data-i18n="nav.navbars.nav_dark">Registration Instruction </a>
                </li>
                

                <li><a class="menu-item" href="<?php echo"$base_url";?>/available-courses" data-i18n="nav.navbars.nav_dark">Available Courses </a>
                </li>

                <li><a class="menu-item" href="<?php echo"$base_url";?>/time-table-school-calender" data-i18n="nav.navbars.nav_dark">TimeTable & Calender </a>
                </li>
                
                <li><a class="menu-item" href="<?php echo"$base_url";?>/login" data-i18n="nav.navbars.nav_light">NCE Portal Login</a>
                </li>
                
                <?php
                if ($first100 == 'ON' && $semester ='First') {
                  ?>
                  <li><a class="menu-item" href="<?php echo"$base_url";?>/validate-admission" data-i18n="nav.navbars.nav_semi">Bio Data</a>
                </li>
                <?php
                }
                
                if ($first100 == 'ON' || $first200 == 'ON' || $first300 == 'ON') {
                  ?>
                  <li><a class="menu-item" href="<?php echo"$base_url";?>/course-form-validation" data-i18n="nav.navbars.nav_semi">Create Course Form</a>
                </li>
                <?php
                }
                ?>
                
               
              </ul>
            </li>
              

              <li class=" nav-item"><a href="<?php echo"$base_url";?>/gallery"><i class="la la-image"></i><span class="menu-title" data-i18n="nav.dash.main">School Gallery</span></a>
              </li>



            
            <li class=" nav-item"><a href="<?php echo"$base_url";?>/about-us"><i class="la la-paste"></i><span class="menu-title" data-i18n="nav.dash.main">About Us</span></a>
              </li>

              <li class=" nav-item"><a href="<?php echo"$base_url";?>/contact-us"><i class="la la-arrows-v"></i><span class="menu-title" data-i18n="nav.dash.main">Contact Us</span></a>
              </li>

           

          
            
           
          
          
          </ul>
        </div>
      </div>
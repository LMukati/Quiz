<div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
              <li class=" nav-item <?php if($this->uri->segment(2) == "Home"){ echo "active" ; } ?>">
                 <a href="<?php echo base_url('administrator/Home') ;  ?>"><i class="fa fa-tachometer"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
              </li>
              
              
              
               <li class="nav-item <?php if($this->uri->segment(2) == "Users"){ echo "active" ; } ?>">
                  <a href="<?php echo base_url('administrator/Users') ;  ?>"><i class="fa fa-user"></i><span data-i18n="" class="menu-title">Users</span></a>
              </li>

              <li class="nav-item <?php if($this->uri->segment(2) == "Plans"){ echo "active" ; } ?>">
                  <a href="<?php echo base_url('administrator/Plans') ;  ?>"><i class="fa fa-list"></i><span data-i18n="" class="menu-title">Plans</span></a>
              </li>
              <li class="nav-item <?php if($this->uri->segment(2) == "Plans2"){ echo "active" ; } ?>">
                  <a href="<?php echo base_url('administrator/Plans2') ;  ?>"><i class="fa fa-list"></i><span data-i18n="" class="menu-title">Extra plans</span></a>
              </li>
             
              <li class="has-sub nav-item <?php if($this->uri->segment(2) == "content"){ echo "active open" ; } ?>"><a href="#"><i class="fa fa-file-code-o"></i><span data-i18n="" class="menu-title">Results Content</span></a>
                <ul class="menu-content">
                  <li><a href="<?php echo base_url('administrator/Content/') ;  ?>" class="menu-item"><i class="fa fa-file-code-o"></i>All Content</a></li>
                  <li><a href="<?php echo base_url('administrator/Content/add') ;  ?>" class="menu-item"><i class="fa fa-plus"></i>Content Add</a></li>
                </ul>
              </li>
              <li class="has-sub nav-item <?php if($this->uri->segment(2) == "Quiz"){ echo "active open" ; } ?>"><a href="#"><i class="fa fa-users"></i><span data-i18n="" class="menu-title">Quiz</span></a>
                <ul class="menu-content">
                  <li><a href="<?php echo base_url('administrator/Quiz/') ;  ?>" class="menu-item"><i class="fa fa-users"></i>All Quiz</a></li>
                  <li><a href="<?php echo base_url('administrator/Quiz/add') ;  ?>" class="menu-item"><i class="fa fa-user-plus"></i>Quiz Add</a></li>
                </ul>
              </li>


              <!--<li class="has-sub nav-item -->
              <!--  <?php if($this->uri->segment(3) == "aboutus"){ echo "active" ; } ?>-->
              <!--  <?php if($this->uri->segment(3) == "faq"){ echo "active" ; } ?>-->
              <!--  <?php if($this->uri->segment(3) == "testimonial"){ echo "active" ; } ?>-->
              <!--  <?php if($this->uri->segment(3) == "terms"){ echo "active" ; } ?>-->
              <!--  <?php if($this->uri->segment(3) == "privacy"){ echo "active" ; } ?>-->
              <!--">-->
              <!--  <a href="#">-->
              <!--    <i class="fa fa-users"></i>-->
              <!--    <span data-i18n="" class="menu-title">Pages</span>-->
              <!--  </a>-->
              <!--  <ul class="menu-content">-->
              <!--    <li >-->
              <!--        <a href="<?php echo base_url('administrator/Home/aboutus') ; ?>" class="menu-item"><i class="fa fa-user-circle"></i>About Us</a>-->
              <!--    </li>-->
              <!--    <li>-->
              <!--        <a href="<?php echo base_url('administrator/Home/faq') ; ?>" class="menu-item"><i class="fa fa-question-circle"></i>FAQ</a>-->
              <!--    </li>-->
              <!--    <li>-->
              <!--        <a href="<?php echo base_url('administrator/Home/terms') ; ?>" class="menu-item"><i class="fa fa-info-circle"></i>Terms & Condition</a>-->
              <!--    </li>-->
              <!--     <li >-->
              <!--        <a href="<?php echo base_url('administrator/Home/privacy') ; ?>" class="menu-item"><i class="fa fa-lock"></i>Privacy policy</a>-->
              <!--    </li>-->
              <!--  </ul>-->
              <!--</li>-->


             
              
              <li class="nav-item <?php if($this->uri->segment(2) == "Transaction"){ echo "active" ; } ?>">
                  <a href="<?php echo base_url('administrator/Transaction') ; ?>"><i class="fa fa-money"></i><span class="menu-title">Transaction</span></a>
              </li>
             

              
              
              <li class="has-sub nav-item 
                <?php if($this->uri->segment(3) == "general_setting"){ echo "active" ; } ?>
                <?php if($this->uri->segment(3) == "profile"){ echo "active" ; } ?>
              ">
                <a href="#">
                  <i class="fa fa-users"></i>
                  <span data-i18n="" class="menu-title">Settings</span>
                </a>
                <ul class="menu-content">
                  
                  <li>
                      <a href="<?php echo base_url('administrator/Home/profile') ; ?>" class="menu-item"><i class="fa fa-question-circle"></i>Site Settings</a>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
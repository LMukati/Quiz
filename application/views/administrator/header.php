<?php if(isset($this->session->userdata["administrator_user"]["username"])){  }else{ redirect('administrator/Login') ;
 } ?>
<!DOCTYPE html>
<html lang="en" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<?php 
  $ad_name = $this->db->get('admin_user')->row()->username ; 
	$ad_logo = $this->db->get('admin_user')->row()->admin_logo ;
  $favicon = $this->db->get('admin_user')->row()->favicon ;
?>
    <title>Administrator - <?php echo $ad_name ; ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url().$favicon ;  ?>">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>vendors/css/chartist.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN Camiony CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>css/app.css">
    <!-- END Camiony CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>
  
 <style>
     input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
 </style> 
  
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div data-active-color="black" data-background-color="white" data-image="" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix" style="background:#28527a">
              <a href="<?php echo base_url('administrator/Home') ;  ?>" class="logo-text float-left">
                <?php if($ad_logo){ ?>
                  <div class="logo-img" style="margin-right: 2px;">
                    <img src="<?php echo base_url().$ad_logo ; ?>" style="width:100px;"/>
                  </div>
                <?php }else{ ?>
                  <span class="text align-middle" style="font-size: 1.4rem;"><?php echo $ad_name; ?></span>
                <?php } ?>
              </a>
              <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
              <i data-toggle="expanded" class="ft-toggle-right toggle-icon" style="color:#fff"></i>
              </a>
              <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a>
           </div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <?php include('menu.php') ; ?>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
      <nav class="navbar navbar-expand-lg navbar-light bg-faded" style="background: #28527a;">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                  <ul class="navbar-nav">
                        <li class="dropdown nav-item">
                             <a id="dropdownBasic3" href="<?php echo base_url('administrator/Home/profile') ?>" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
                                <p class="d-none">User Settings</p>
                            </a>
                                  <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
                                       <a href="<?php echo base_url('administrator/Home/profile') ?>" class="dropdown-item py-1">
                                           <i class="ft-edit mr-2"></i><span>Edit Profile</span>
                                       </a>
                                      <div class="dropdown-divider"></div>
                                      <a href="<?php echo base_url('administrator/Login/logout') ?>" class="dropdown-item">
                                         <i class="ft-power mr-2"></i><span>Logout</span>
                                      </a>
                                  </div>
                        </li>                
                  </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- Navbar (Header) Ends-->      
       
       
       
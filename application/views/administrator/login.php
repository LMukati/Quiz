<!DOCTYPE html>
<html lang="en" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?php echo $name ; ?>">
    <title>Login - Administrator</title>
    
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url().$favicon ;  ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>/vendors/css/prism.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ;  ?>/css/app.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>

  <body data-col="1-column" class=" 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel" style="margin-top: 0;">
        <div class="main-content">
          <div class="content-wrapper"><!--Login Page Starts-->
     <section id="login" style="background: url('<?php echo base_url() ?>/assets/img/back.jpg');background-size: 100% 100%;">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="card gradient-indigo-purple text-center width-400" style="background: #000000b5;">
                    <div class="card-img" style="padding-top: 25px;">
                       <?php if($logo){ ?>
                        <img alt="element 06" class="mb-1" src="<?php echo base_url().$logo ;  ?>" width="190">
                       <?php }else{ ?>
                        <h2 style="line-height: 23px;"><?php echo $name ; ?></h2>
                       <?php } ?> 
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <h2 class="white" style="line-height: 50px;">Administrator Login</h2>
                             <?php if($this->session->flashdata("login_failed")){ ?>
                                <div class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert" style="margin: 0 15px;font-size: 12px;">
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   <?php echo  $this->session->flashdata("login_failed") ; ?>
                                </div>
                            <?php } ?> 
                            <form action="<?php echo base_url('administrator/Login/log') ?>" method="post">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" required >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password" id="inputPass" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" name="userSubmit" value="Submit" class="btn btn-primary btn-block btn-raised" >Submit</button>
                                     </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login Page Ends-->
          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('assets/') ;  ?>/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/') ;  ?>/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/') ;  ?>/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/') ;  ?>/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/') ;  ?>/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/') ;  ?>/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/') ;  ?>/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/') ;  ?>/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?php echo base_url('assets/') ;  ?>/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/') ;  ?>/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/') ;  ?>/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->

  </body>

</html>
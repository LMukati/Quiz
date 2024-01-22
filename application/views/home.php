<?php 
$sitename = $this->Home_model->detail("admin_user",1)->username ;
$logo = $this->Home_model->detail("admin_user",1)->admin_logo ;
$favicon = $this->Home_model->detail("admin_user",1)->favicon ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $sitename ; ?></title>
<!-- Favicon -->
<link rel="icon" href="<?php echo base_url().$favicon ; ?>">
<meta name="description" content="">
<meta name="author" content="">


<script src="<?php echo base_url('frontend/'); ?>js/jquery.min.js"></script>
<link href="<?php echo base_url('frontend/'); ?>css/style.css" rel="stylesheet">
<!-- icon -->
<link href="<?php echo base_url('frontend/'); ?>css/font-awesome.min.css" rel="stylesheet">

<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



</head>
<body>
    <?php if($this->session->flashdata("success")){ ?>
        <div class="alert alert-icon-left alert-success alert-dismissible mb-2" style="margin:20px 0px" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
           <?php echo  $this->session->flashdata("success") ; ?>
        </div>
      <?php } ?> 
<div class="padding-80">
<div class="wrapper loding text-center">
  <div class="loding-text">
  <p><strong>20 questions with growing difficulty.</strong></p>
<p><strong>Check the right answer out of the 4 options.</strong></p>
<p><strong>You can skip questions and return back to them later. </strong></p>
<a href="<?php echo base_url('test/') ?>" class="btn-red">Start the Test</a>
</div>
</div>
</div>
</body>
</html>
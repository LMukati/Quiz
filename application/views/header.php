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
<title>Smart IQ</title>
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
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500;1,700&display=swap" rel="stylesheet">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NV285D5');</script>
<!-- End Google Tag Manager -->


</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NV285D5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header class="top-bar">			
		<div class="top-bar-wrapper">
			<div class="top-bar-box">
		<div class="logo"><a href="https://www.smartiq.org/"><img  style="height: 40px;" src="<?php echo base_url().$logo ; ?>"></a></div>
		<div class="top-link"><a href="mailto:contact@smartiq.com">Help</a></div></div>
		</div>	
	</header>
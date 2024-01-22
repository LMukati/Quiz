<?php include("header.php") ?>
<?php if($this->session->flashdata("success")){ ?>
        <div class="alert alert-icon-left alert-success alert-dismissible mb-2" style="margin:20px 0px" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
           <?php echo  $this->session->flashdata("success") ; ?>
        </div>
      <?php } ?> 
<div class="wrapper loding text-center" id="continueform" style="margin-top: 30px;">

	

  <div class="loding-text">
    <p><strong>Your Result Detail is sended on your email. Please check it in your given email. Some times it goes to spam please check there also.</strong></p>
    <p><a href="<?php echo base_url() ?>" id="selectplan" class="btn-red">Get New Exam</a></p>
    
  </div>
</div>


<?php include("footer.php"); ?>

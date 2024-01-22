<?php include("header.php") ; ?>
<div class="main-panel">
<div class="main-content">
   <div class="content-wrapper"><!--Statistics cards Starts-->
        
      <div class="row">
    <div class="col-12">
        <div class="content-header">Manage AboutUs
        </div>
        <p class="content-sub-header">All web About website .</p>
        
        <?php if($this->session->flashdata("message")){ ?>
        <div class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		   <?php echo  $this->session->flashdata("message") ; ?>
        </div>
       <?php } ?> 
       <?php if($this->session->flashdata("successmessage")){ ?>
        <div class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		   <?php echo  $this->session->flashdata("successmessage") ; ?>
        </div>
       <?php } ?> 
        
    </div>
</div>



<section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                         <form class="form" action="" method="post" enctype="multipart/form-data">
							<div class="form-body">
                                <h4 class="form-section"><i class="fa fa-bullhorn" aria-hidden="true"></i> Update About</h4>
                                
                                <div class="col-md-12"  style="float:left">
                                    <div class="form-group">
                                        <label >About</label>
                                        <textarea class="form-control" name="about" id="description" required rows="10"><?php echo $view->about ; ?></textarea>
                                    </div>
                                </div>
                            </div>

							<div class="form-actions center">
								<button type="submit" name="userSubmit" value="save" class="btn btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Save Changes
								</button>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>


  </div>
</div>
        
<?php include("footer.php") ; ?> 


            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ;  ?>/vendors/css/tables/datatable/datatables.min.css">
        <script src="<?php echo base_url('assets') ;  ?>/js/data-tables/datatable-basic.js" type="text/javascript"></script>
         <script src="<?php echo base_url('assets') ;  ?>/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>



<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script>
CKEDITOR.replace('description');
CKEDITOR.replace('edc');
</script>

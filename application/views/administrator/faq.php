<?php include("header.php") ; ?>
<style>
    .modal-header{
        display:block;
        background: #009da0;
        color: #fff;
    }
</style>
<div class="main-panel">
<div class="main-content">
   <div class="content-wrapper"><!--Statistics cards Starts-->
        
      <div class="row">
    <div class="col-12">
        <div class="content-header">Manage FAQ
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
                                <h4 class="form-section"><i class="fa fa-file" aria-hidden="true"></i> Add Faq</h4>
                                
                                <div class="col-md-12"  style="float:left">
                                    <div class="form-group">
                                        <label >Question</label>
                                        <input type="text" class="form-control" name="question" required>
                                    </div>
                                    <div class="form-group">
                                        <label >Answer</label>
                                        <textarea class="form-control" name="answer" id="description" required rows="5"></textarea></textarea>
                                    </div>
                                </div>
                            </div>

							<div class="form-actions center">
							    
								<button type="submit" name="userSubmit" value="save" class="btn btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Save
								</button>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    
     <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                            <div class="form-body">
                                <h4 class="form-section"><i class="fa fa-bullhorn" aria-hidden="true"></i> All Faq</h4>
                            </div>   
                       
                        <?php foreach($userf as $usf){ ?>
                            <div class="row" style="padding: 10px; margin:15px 5px; box-shadow: 3px 2px 3px #009da0;">
                                <div class="col-md-10">
                                    <h6><b><?php echo $usf->question ;  ?></b></h6>
                                    <hr style="margin: 8px 0;">
                                    <p><?php echo $usf->answer ;  ?></p>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-info form-control" onclick="editfaq('<?php echo $usf->id ;  ?>','<?php echo $usf->question ;  ?>','<?php echo $usf->answer ;  ?>')"><i class="fa fa-pencil"></i> Edit </button>
                                    <form action="" method="post" style="color:#FFF">
                                      <input type="hidden" name="id" value="<?php echo $usf->id ; ?>" >    
                                      <button class="btn btn-danger form-control" type="submit" name="delete" value="delete"><i class="fa fa-trash"></i> Delete </button>  
                                    </form>
                                    
                                </div>
                            </div>
                        <?php } ?> 
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



<!--<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>-->
<script> /*
CKEDITOR.replace('description');
CKEDITOR.replace('edc'); */
</script>

<script>
    function editfaq(id,question,answer)
    {
        $('#myModal').modal() ;
        $('#id1').val(id);
        $('#question1').val(question);
        $('#answer1').val(answer);
    }
</script>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit FAQ</h4>
      </div>
      <form action="" method="post">
      <div class="modal-body">
           <div class="col-md-12">
               <div class="form-group">
                   <label>Question</label>
                   <input type="text" name="question" value="" id="question1" required class="form-control">
                   <input type="hidden" name="id" id="id1" >
               </div>
               <div class="form-group">
                   <label>Answer</label>
                   <textarea type="text" name="answer" value="" id="answer1" required class="form-control" row="10" ></textarea>
               </div>
           </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="update" value="update"> Update </button>
      </div>
      </form>
    </div>

  </div>
</div>


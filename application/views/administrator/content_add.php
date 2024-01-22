<?php include("header.php") ; ?>


<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper"><!--Statistics cards Starts-->
    
      <section id="simple-table">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title f-left">Result Content</h4>
              </div>
              <div class="card-body">
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
                    
                    <div class="card-block">
                     
                        <form class="form" action="" id="fromview" method="post" enctype="multipart/form-data" >
                          <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >From Score</label>
                                         <select class="form-control" name="from" required>
                                                        <option value="">Select From Score</option>
                                                        <option value="0">0</option>
                                                        <option value="20">20</option>
                                                        <option value="40">40</option>
                                                        <option value="60">60</option>
                                                        <option value="80">80</option>
                                                        <option value="100">100</option>
                                                        <option value="120">120</option>
                                                        <option value="140">140</option>
                                                        <option value="140+">140+</option>
                                            </select>
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >To Score</label>
                                         <select class="form-control" name="to" required>
                                                        <option value="">Select To Score</option>
                                                        <option value="0">0</option>
                                                        <option value="20">20</option>
                                                        <option value="40">40</option>
                                                        <option value="60">60</option>
                                                        <option value="80">80</option>
                                                        <option value="100">100</option>
                                                        <option value="120">120</option>
                                                        <option value="140">140</option>
                                                        <option value="140+">140+</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Content Data</label>
                                        <textarea name="include" class="form-control" required id="textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-actions center mt-2">
                                    <button type="submit" name="userSubmit" value="save" class="btn btn-raised btn-primary btn-lg" style="width:100%">
                                        <i class="fa fa-check-square-o"></i> Save Content
                                    </button>
                                </div>
                            </div>
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
</div>       
    
        
        
<?php include("footer.php") ; ?> 
<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script>
CKEDITOR.replace('textarea');
</script>
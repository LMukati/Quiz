<?php include("header.php") ; ?>
<style type="text/css">
.form{ display:none;  }    
</style>

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
                      <?php $j=1; foreach($content as $view){ ?>
                        <form class="form" action="" id="fromview<?php echo $view->id; ?>" method="post" enctype="multipart/form-data" >
                          <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <label >From Score</label>
                                         <select class="form-control" name="from" required>
                                                        <option value="">Select From Score</option>
                                                        <option value="0" <?php if($view->from == "0"){ echo "selected" ; }  ?>>0</option>
                                                        <option value="20" <?php if($view->from == "20"){ echo "selected" ; }  ?>>20</option>
                                                        <option value="40" <?php if($view->from == "40"){ echo "selected" ; }  ?>>40</option>
                                                        <option value="60" <?php if($view->from == "60"){ echo "selected" ; }  ?>>60</option>
                                                        <option value="80" <?php if($view->from == "80"){ echo "selected" ; }  ?>>80</option>
                                                        <option value="100" <?php if($view->from == "100"){ echo "selected" ; }  ?>>100</option>
                                                        <option value="120" <?php if($view->from == "120"){ echo "selected" ; }  ?>>120</option>
                                                        <option value="140" <?php if($view->from == "140"){ echo "selected" ; }  ?>>140</option>
                                                        <option value="140+" <?php if($view->from == "140+"){ echo "selected" ; }  ?>>140+</option>
                                            </select>
                                       
                                        <input type="hidden" name="id" value="<?php echo $view->id; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >To Score</label>
                                        <select class="form-control" name="to" required>
                                                        <option value="">Select To Score</option>
                                                        <option value="0" <?php if($view->to == "0"){ echo "selected" ; }  ?>>0</option>
                                                        <option value="20" <?php if($view->to == "20"){ echo "selected" ; }  ?>>20</option>
                                                        <option value="40" <?php if($view->to == "40"){ echo "selected" ; }  ?>>40</option>
                                                        <option value="60" <?php if($view->to == "60"){ echo "selected" ; }  ?>>60</option>
                                                        <option value="80" <?php if($view->to == "80"){ echo "selected" ; }  ?>>80</option>
                                                        <option value="100" <?php if($view->to == "100"){ echo "selected" ; }  ?>>100</option>
                                                        <option value="120" <?php if($view->to == "120"){ echo "selected" ; }  ?>>120</option>
                                                        <option value="140" <?php if($view->to == "140"){ echo "selected" ; }  ?>>140</option>
                                                        <option value="140+" <?php if($view->to == "140+"){ echo "selected" ; }  ?>>140+</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Content Data</label>
                                        <textarea name="include" class="form-control" required id="textarea<?php echo $view->id ?>"><?php echo $view->result_data; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-actions center mt-2">
                                    <button type="submit" name="userSubmit" value="save" class="btn btn-raised btn-primary btn-lg" style="width:100%">
                                        <i class="fa fa-check-square-o"></i> Update Content
                                    </button>
                                </div>
                            </div>
                          </div> 
                        </form>
                      <?php $j++; } ?>
                    </div>
                </div>
            </div>



            <div class="card">
              <div class="card-header">
                <h4 class="card-title f-left">Result Content List</h4>
              </div>
              <div class="card-body">
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Score Heading</th>
                                    <th>Data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Score Heading</th>
                                    <th>Data</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i=1; foreach($content as $vw){ ?>
                                <tr>
                                    <td><?php echo $i ; ?></td>
                                    <td><?php echo $vw->from.'-'.$vw->to ; ?></td>
                                    <td><?php echo $vw->result_data ; ?></td>
                                    <td>
                                          <a href="#" style="background: green;
            color: #fff;
            padding: 2px 10px;
            border-radius: 35px;
            text-decoration: none;" onclick="$('.form').hide()&&$('#fromview<?php echo $vw->id; ?>').show()">Edit</a>
                                          
                                      </td>
                                  </tr>
                                  <?php $i++; } ?>
                              </tbody>
                          </table>
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
<?php foreach($content as $cont){ ?>
<script>
CKEDITOR.replace('textarea<?php echo $cont->id ?>');
</script>
<?php } ?>
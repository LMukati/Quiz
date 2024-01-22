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
                <h4 class="card-title f-left">Plans detail</h4>
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
                                        <label >Plan name</label>
                                        <input type="text" name="name" class="form-control" required value="<?php echo $view->name; ?>">
                                        <input type="hidden" name="plan_id" value="<?php echo $view->id; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Price</label>
                                        <input type="text" name="price" class="form-control" required value="<?php echo $view->price; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Include</label>
                                        <textarea name="include" class="form-control" required id="textarea<?php echo $view->id ?>"><?php echo $view->include; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-actions center mt-2">
                                    <button type="submit" name="userSubmit" value="save" class="btn btn-raised btn-primary btn-lg" style="width:100%">
                                        <i class="fa fa-check-square-o"></i> Update Plan
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
                <h4 class="card-title f-left">Plans List</h4>
              </div>
              <div class="card-body">
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Include</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Include</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i=1; foreach($content as $vw){ ?>
                                <tr>
                                    <td><?php echo $i ; ?></td>
                                    <td><?php echo $vw->name ; ?></td>
                                    <td><?php echo $vw->price ; ?></td>
                                    <td><?php echo $vw->include ; ?></td>
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
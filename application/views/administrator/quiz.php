<?php include("header.php") ; ?>
<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper"><!--Statistics cards Starts-->
    
      <section id="simple-table">
        <div class="row">
          <div class="col-sm-12">
            <div class="card mb-4">
              <div class="card-header">
                <h4 class="card-title f-left">Users detail</h4>
              </div>
              <div class="card-body">
                <div class="card-block">
                  <table class="table">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>No of Questions</th>
                              <th>Created on</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>No of Questions</th>
                              <th>Created on</th>
                              <th>Action</th>
                          </tr>
                      </tfoot>
                      <tbody>
                          <?php $i=1; foreach($view as $vw){ ?>
                          <tr>
                              <td><?php echo $i ; ?></td>
                              <td><?php echo $vw->title ; ?></td>
                              <td><?php echo count($this->Home_model->wheredata("quiz_questions","quiz_id",$vw->id)) ?></td>
                              <td><?php echo date('d-M-y',strtotime($vw->created_on)) ; ?></td>
                              <td>
                                  
                                  <a href="<?php echo base_url('quiz_edit/').$vw->id ?>" style="    background: green;
    color: #fff;
    padding: 2px 10px;
    border-radius: 35px;
    text-decoration: none;">Edit</a>
                                  <a href="<?php echo base_url('quiz_delete/').$vw->id ?>" style="    background: red;
    color: #fff;
    padding: 2px 10px;
    border-radius: 35px;
    text-decoration: none;" onclick="return confirm('Are you sure?')">Delete</a>
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
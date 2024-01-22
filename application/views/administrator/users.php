<?php include("header.php") ; ?>
 <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!--Statistics cards Starts-->
			<!--Basic Table Starts-->
			<section id="simple-table">
			    <div class="row">
			        <div class="col-sm-12">
			            <div class="card">
			                <div class="card-header">
                                  <h4 class="card-title f-left">Users detail</h4>
                                  
                              </div>
			                <div class="card-body">
			                    <div class="card-block">
			                        <table class="table">
			                            <thead>
			                                <tr>
		                                    <th>#</th>
		                                    <th>Name</th>
		                                    <th>Email</th>
                                        <th>Phone number</th>
                                        <!-- <th>Action</th> -->
                                      </tr>
			                            </thead>
			                            <tbody>
			                               <?php $i = 1 ; foreach($view as $ad){ ?>
                                <tr>
                                    <td><?php echo $i ; ?></td>
                                    <td><?php echo $ad->name ; ?></td>
                                    <td><?php echo $ad->email ; ?></td>
                                    <td><?php echo $ad->phone ; ?></td>
                                    <!-- <td>
                                      <a class="info p-0" data-original-title="" title="" href="<?php echo base_url('administrator/Users/view/').$ad->id ; ?>">
                                          <button type="button" class="btn btn-outline-success">  View</button></a>
                                         <a class="info p-0" data-original-title="" title="" href="<?php echo base_url('administrator/Users/desable/').$ad->id ; ?>">
                                          <button type="button" class="btn btn-outline-warning">  Delete</button></a>
                                      </a>
                                    </td> -->
                                </tr>
                              <?php $i++ ; } ?>   
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</section>
			<!--Basic Table Ends-->
		</div>
			</div>
<!--Statistics cards Ends-->
        
<?php include("footer.php") ; ?> 


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
                          <h4 class="card-title f-left">Slider</h4>
                      </div>
			                <div class="card-body">
			                    <div class="card-block">
			                        <table class="table">
			                            <thead>
			                                <tr>
		                                    <th>#</th>
		                                    <th>Image</th>
		                                    <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
			                            </thead>
			                            <tbody>
			                               <?php $i = 1 ; foreach($view as $ad){ ?>
				                                <tr>
				                                    <td><?php echo $i ; ?></td>
				                                    <td><img src="<?php echo base_url($ad->image) ; ?>" style="height: 100px;"></td>
				                                    <td><?php echo $ad->title ; ?></td>
				                                    <td><?php echo $ad->sub_title ; ?></td>
				                                    <td><?php if($ad->status == 1){echo "active"; }else{ echo "Inactive"; } ?></td>
				                                    <td>
				                                      <a class="info p-0" >
				                                          <button type="button" class="btn btn-success btn-sm" onclick="$('.dcard').hide()&&$('#c<?php echo $ad->id ?>').show()&&$.scrollTo($('#c<?php echo $ad->id ?>'), 1000);">  Edit</button></a>
				                                    </td>
				                                </tr>
				                              <?php $i++ ; } ?>   
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			            </div>

			          <?php foreach($view as $cd){ ?>
			            <div class="card dcard" id="c<?php echo $cd->id ; ?>" style="display: none;">
			                <div class="card-header">
                          <h4 class="card-title f-left">Edit Slider</h4>
                      </div>
			                <div class="card-body">
		                    <div class="card-block">
		                    	<form action="" method="post" enctype="multipart/form-data">
		                    		<div class="form-group">
		                    			<label>Image</label>
		                    			<input type="file" name="image" class="form-control">
		                    			<input type="hidden"name="old_image" value="<?php echo $cd->image; ?>">
		                    			<img src="<?php echo base_url($cd->image); ?>" style="height: 75px;">
		                    		</div>
		                    		<div class="form-group">
		                    			<label>Title</label>
		                    			<input type="hidden" name="id" value="<?php echo $cd->id; ?>">
		                    			<input type="text" name="title" value="<?php echo $cd->title; ?>" class="form-control">
		                    		</div>
		                    		<div class="form-group">
		                    			<label>Subtitle</label>
		                    			<input type="text" name="sub_title" value="<?php echo $cd->sub_title; ?>" class="form-control">
		                    		</div>
		                    		<div class="form-group">
		                    			<label>Description</label>
		                    			<textarea name="description" class="form-control"><?php echo $cd->description ; ?></textarea>
		                    		</div>
		                    		<div class="form-group">
		                    			<label>Button 1 Link</label>
		                    			<input type="text" name="button1_link" value="<?php echo $cd->button1_link; ?>" class="form-control">
		                    		</div>
		                    		<div class="form-group">
		                    			<label>Button 1 Text</label>
		                    			<input type="text" name="button1_text" value="<?php echo $cd->button1_text ; ?>" class="form-control">
		                    		</div>
		                    		<div class="form-group">
		                    			<label>Buttton 2 Link</label>
		                    			<input type="text" name="button2_link" value="<?php echo $cd->button2_link; ?>" class="form-control">
		                    		</div>
		                    		<div class="form-group">
		                    			<label>Button 2 text</label>
		                    			<input type="text" name="button2_text" value="<?php echo $cd->button2_text; ?>" class="form-control">
		                    		</div>
		                    		<div class="form-group">
		                    			<label>Status</label>
		                    			<select name="status" class="form-control">
		                    				<option value="1" <?php if($cd->status == 1){ echo "selected"; } ?>>enable</option>
		                    				<option value="0" <?php if($cd->status == 0){ echo "selected"; } ?>>Disable</option>
		                    			</select>	
		                    		</div>
		                    		<div class="form-group">
		                    			<button type="submit" name="userSubmit" value="yes" class="btn btn-success">Save Changes</button>
		                    		</div>
		                    	</form>    
		                    </div>
			                </div>
			            </div>
			          <?php } ?>

			        </div>
			    </div>
			</section>
			<!--Basic Table Ends-->
		</div>
			</div>
<!--Statistics cards Ends-->
        
<?php include("footer.php") ; ?> 


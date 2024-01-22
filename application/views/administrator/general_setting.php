<?php include("header.php") ; ?>
<div class="main-panel">
<div class="main-content">
   <div class="content-wrapper"><!--Statistics cards Starts-->
        
      <div class="row">
    <div class="col-12">
    </div>
</div>


<section id="extended">

    <div class="row">
         <div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-colored-form-control">General Setting</h4>
					<p class="mb-0">You can Manage your website and change your setting from here.</p>
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
				<div class="card-body">
					<div class="px-3">						

						<form class="form" action="" method="post" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section"><i class="ft-info"></i> Footer</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="userinput1">Aboutus</label>
                                    <div class=" position-relative ">
                                       <textarea id="userinput1" class="form-control border-primary" name="info"><?php echo $view->info ; ?></textarea>
                                    </div>
										</div>
										<div class="form-group">
											<label for="userinput1">Powered By text</label>
                                             <div class=" position-relative ">
                                                <input type="text" id="userinput1" class="form-control border-primary" name="powered_by" value="<?php echo $view->powered_by ; ?>" >
                                             </div>
										</div>
										<div class="form-group">
											<label for="userinput1">Copyright text</label>
                                             <div class=" position-relative ">
                                                <input type="text" id="userinput1" class="form-control border-primary" name="copyright" value="<?php echo $view->copyright ; ?>" >
                                 </div>
										</div>
									</div>
									
								</div>
							
							
							
							<h4 class="form-section"><i class="ft-envalope"></i> Contact Detail</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="userinput1">Contact Email</label>
                                             <div class=" position-relative ">
                                                <input type="text" id="userinput1" class="form-control border-primary" name="contact_email" value="<?php echo $view->contact_email ; ?>" >
                                             </div>
										</div>
										<div class="form-group">
											<label for="userinput1">Contact Phone</label>
                                             <div class=" position-relative ">
                                                <input type="text" id="userinput1" class="form-control border-primary" name="contact_phone" value="<?php echo $view->contact_phone ; ?>" >
                                             </div>
										</div>
										<div class="form-group">
											<label for="searchInput">Contact Address</label>
                                             <div class=" position-relative ">
                                                <input type="text" id="searchInput" class="form-control border-primary" name="contact_address" value="<?php echo $view->contact_address ; ?>" >
                                             </div>
										</div>
									</div>
									
								</div>
								
								
								
								<h4 class="form-section"><i class="ft-info"></i> Social Share</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="userinput1">Facebook</label>
                                             <div class=" position-relative ">
                                                <input type="text" id="userinput1" class="form-control border-primary" name="facebook" value="<?php echo $view->facebook ; ?>" >
                                             </div>
										</div>
										<div class="form-group">
											<label for="userinput1">Google-plus</label>
                                             <div class=" position-relative ">
                                                <input type="text" id="userinput1" class="form-control border-primary" name="google" value="<?php echo $view->google ; ?>" >
                                             </div>
										</div>
										<div class="form-group">
											<label for="userinput1">Twitter</label>
                                             <div class=" position-relative ">
                                                <input type="text" id="userinput1" class="form-control border-primary" name="twitter" value="<?php echo $view->twitter ; ?>" >
                                             </div>
										</div>
										<div class="form-group">
											<label for="userinput1">Instagram</label>
                                             <div class=" position-relative ">
                                                <input type="text" id="userinput1" class="form-control border-primary" name="instagram" value="<?php echo $view->instagram ; ?>" >
                                             </div>
										</div>
										<div class="form-group">
											<label for="userinput1">Linkedin</label>
                                 <div class=" position-relative ">
                                    <input type="text" id="userinput1" class="form-control border-primary" name="linkedin" value="<?php echo $view->linkedin ; ?>" >
                                 </div>
										</div>
									</div>
									
								</div>
							
								
								
								
								
							</div>
							
							

							<div class="form-actions right">
								<button type="submit" class="btn btn-raised btn-primary" name="userSubmit" value="Save">
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


     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxbrEt7UDOfSjVC8ErCSDGm1iZE0u2NjE&libraries=places&callback=initAutocomplete"

        async defer></script>

 <script>

            function initAutocomplete() {

    

    var address = document.getElementById('searchInput');

    var options = {

      componentRestrictions: { 'country':['it','es' ]

     }

    };

    var auto = new google.maps.places.Autocomplete(address, options);

     google.maps.event.addListener(auto, 'place_changed', function () {

            var place = auto.getPlace();

            

            document.getElementById('lat').value = place.geometry.location.lat();

            document.getElementById('lng').value = place.geometry.location.lng();

           



        });

    

            }



            google.maps.event.addDomListener(window, 'load', initAutocomplete);

        </script>


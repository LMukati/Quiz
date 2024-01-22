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
					<h4 class="card-title" id="basic-layout-colored-form-control">Profile Setting</h4>
					<p class="mb-0">You can Manage your profile and change your setting from here.</p>
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
								<h4 class="form-section"><i class="ft-info"></i> About User</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="userinput1">User Name</label>
                                 <input type="text" id="userinput1" class="form-control border-primary" name="username" value="<?php echo $view->username ; ?>" required>
										</div>
									</div>
								</div>

								<h4 class="form-section"><i class="ft-mail"></i> Contact Info </h4>

								<div class="form-group">
									<label for="userinput5">Email</label>
									<input class="form-control border-primary" type="email" id="userinput5" name="email" value="<?php echo $view->email ; ?>" required>
								</div>
                                
                        <div class="form-group">
									<label for="userinput5">Web mail</label>
									<input class="form-control border-primary" type="email" id="userinput5" name="web_email" value="<?php echo $view->web_email ; ?>" required>
								</div>

								<div class="form-group">
									<label for="userinput5">Stripe SK</label>
									<input class="form-control border-primary" type="text" id="userinput5" name="stripe_sk" value="<?php echo $view->stripe_sk ; ?>" required>
								</div>

								<div class="form-group">
									<label for="userinput5">Stripe PK</label>
									<input class="form-control border-primary" type="text" id="userinput5" name="stripe_pk" value="<?php echo $view->stripe_pk ; ?>" required>
								</div>
                                
                        <h4 class="form-section"><i class="ft-lock"></i> password </h4>

								<div class="form-group">
									<label for="userinput5">Old Password</label>
									<input class="form-control border-primary" type="text" name="old_password" id="oldpass" >
								</div>
								<div class="form-group">
								  <label>New password</label>
								  <input class="form-control border-primary" type="password" name="password" id="newpass">
								</div>
                                
                        <h4 class="form-section"><i class="ft-lock"></i> Logo </h4>

								<div class="form-group">
									<label for="userinput5">Website Logo</label>
									<input class="form-control border-primary" type="file" name="image" >
                                    <input class="form-control border-primary" type="hidden" name="old_image" value="<?php echo $view->admin_logo ; ?>">
								</div>

								<div class="form-group">
									<label for="userinput5">Website Favicon/Icon</label>
									<input class="form-control border-primary" type="file" name="favicon" >
                           <input class="form-control border-primary" type="hidden" name="old_favicon" value="<?php echo $view->favicon ; ?>">
								</div>
								
							</div>

							<div class="form-actions right">
								<button type="submit" class="btn btn-primary" name="userSubmit" value="Save" onClick="return vonf()">
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

<script>
function vonf()
{
	var oldpass = $('#oldpass').val() ;
	var newpass = $('#newpass').val() ;
	
	if(oldpass > ""){  if(newpass > ""){ }else{  alert("please fill new password field*") ;  return false ; }  }
	else if(newpass > ""){  if(oldpass > ""){ }else{  alert("please fill old password field*") ;  return false ; } }
	
	
}
</script>

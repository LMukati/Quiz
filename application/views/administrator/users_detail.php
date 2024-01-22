<?php include("header.php") ; ?>

<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper"><!--User Profile Starts-->
            <!--Basic User Details Starts-->
            <section id="user-profile">
                <div class="row">
                    <div class="col-12">
                        <div class="card profile-with-cover">
                            <div class="card-img-top img-fluid bg-cover height-300" style="background: url('<?php echo base_url('assets/') ; ?>img/photos/14.jpg') 50%;"></div>
                            <div class="media profil-cover-details row">
                                <div class="col-5">
                                    <div class="align-self-start halfway-fab pl-3 pt-2">
                                        <div class="text-left">
                                            <h3 class="card-title white"><?php echo $view->name ; ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="align-self-center halfway-fab text-center">
                                        <a class="profile-image">
                                              <?php if($view->image){ ?>
                                                 <img src="<?php echo base_url().$view->image ; ?>" class="rounded-circle img-border gradient-summer width-100" style="    height: 100px;">
                                                <?php }else{ ?>
                                                 <img src = "<?php echo base_url('assets/')."img/portrait/avatars/avatar-08.png" ?>" class="rounded-circle img-border gradient-summer width-100"> 
                                                <?php } ?>  
                                        </a>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="media-body halfway-fab align-self-end">
                                    </div>
                                </div>
                            </div>
                            <div class="profile-section">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 ">
                                        <ul class="profile-menu no-list-style">
                                            <li>
                                                <a href="#about" class="primary font-medium-2 font-weight-600">About</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-2 col-md-2 text-center">
                                        <span class="font-medium-2 text-uppercase"><?php echo $view->name ; ?></span>
                                        <!-- <p class="grey font-small-2">Ninja Developer</p> -->
                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                        <ul class="profile-menu no-list-style">
                                            <li>
                                                <a href="#booking" class="primary font-medium-2 font-weight-600">Requests</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Basic User Details Ends-->

            <!--About section starts-->
            <section id="about">
                <div class="row">
                    <div class="col-12">
                        <div class="content-header">About</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header padding-set">
                                <h5>Personal Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-block">
                                    <hr style="margin-top: 0;">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <ul class="no-list-style">
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-monitor font-small-3"></i> UserName:</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $view->name ; ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $view->email ; ?></span>
                                                </li>
                                                 <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email verification status:</a></span>
                                                    <span class="display-block overflow-hidden"><?php if($view->status==0){ echo "<span style='color:red'>Not verified</span>  <a href='".base_url('administrator/Home/verifym/'.$view->id)."'><span style='color:#009da0'>Verify now?</span></a> "; }else{ echo "<span style='color:green'>Email verified</span>";} ; ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <ul class="no-list-style">
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i>Phone number:</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $view->phone ; ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-home font-small-3"></i>Address:</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $view->address ; ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--About section ends-->

            <!--Booking section starts-->
            <section id="booking">
                <div class="row">
                    <div class="col-12">
                        <div class="content-header">Requests</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>All Service Request Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="card-body">
                                      <div class="card-block">
                                          <table class="table">
                                             <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Service</th>
                                                      <th>category</th>
                                                      <th>message</th>
                                                      <th>Amount</th>
                                                      <th>Status</th>
                                                      <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                              <?php foreach($mybooking as $book){ ?>
                                                  <tr>
                                                      <th scope="row">1</th>
                                                      <td><?php echo $this->db->get_where("services",array("id"=>$book->service_id))->row()->name ; ?></td>
                                                      <td><?php echo $this->db->get_where("category",array("id"=>$book->category_id))->row()->name ; ?></td>
                                                      <td><?php echo $book->message ; ?></td>
                                                      <td><?php echo $book->payment_amount ; ?></td>
                                                      <td><?php 
            										         if($book->status == 0){ echo "Requested"; }
            												 elseif($book->status == 1){ echo "Accepted"; }
            												 elseif($book->status == 2){  echo "Booked";}
            												 elseif($book->status == 3){ echo "Arriving"; }
            												 elseif($book->status == 4){ echo "Started"; }
            												 elseif($book->status == 5){ echo "Finished"; }
            												 else{ echo "Rejected"; }
            											   ?>
                                                      </td>
                                                      <td>
                                                         <a href="<?php echo base_url('administrator/Requests/view/').$book->id ; ?>">
                                                            <button class="btn btn-raised btn-primary">View</button>
                                                          </a>
                                                      </td>
                                                  </tr>
                                               <?php } ?>   
                                              </tbody>
                                          </table>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Booking section ends-->
        </div>
        <!--Statistics cards Ends-->  
    </div>
</div>        
 
                        
        
<?php include("footer.php") ; ?> 
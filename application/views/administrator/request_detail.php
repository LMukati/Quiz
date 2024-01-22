<?php include("header.php") ; ?>

  <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!--Statistics cards Starts-->
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
                              <div class="col-12 col-md-5 col-lg-5 f-left">
                                <h5>Booking</h5></div>
                                <div class="col-12 col-md-7 col-lg-7 f-left">
                                        <?php if($view->status == 0){ ?>
                                            <a class="warning p-0">Status : <i class="fa fa-circle"></i> Pending</a>      
                                        <?php }elseif($view->status == 1){ ?>
                                            <a class="info p-0">Status : <i class="fa fa-circle"></i> Accept</a>    
                                        <?php }elseif($view->status == 2){ ?>
                                        <a class="success p-0">Status : <i class="fa fa-circle"></i> Booked</a>
                                        <?php }elseif($view->status == 3){ ?>
                                        <a class="warning p-0">Status : <i class="fa fa-circle"></i> Ariving</a>
                                        <?php }elseif($view->status == 4){ ?>
                                        <a class="info p-0">Status : <i class="fa fa-circle"></i> Started</a>
                                        <?php }elseif($view->status == 5){ ?>
                                        <a class="success p-0">Status : <i class="fa fa-trophy"></i> Finished</a>
                                        <?php }else{ ?>
                                        <a class="warning p-0">Status : <i class="fa fa-circle"></i>  Unverified</a>
                                        <?php } ?>
                                  <!--<div class="col-12 col-md-2 col-lg-2 f-left">
                                         <button class="btn btn-outline-success">Submit</button>
                                     </div>-->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-block">
                                    <hr style="margin-top: 0;">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <ul class="no-list-style">
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-monitor font-small-3"></i> Project Title</a></span>
                                                    <span class="display-block overflow-hidden"> <?php echo $view->project_title ; ?> </span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-navigation-2 font-small-3"></i> What You Need:</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $view->whatyouneed ; ?></span>
                                                </li>
                                                 <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-navigation-2 font-small-3"></i> Address:</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $view->address ; ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                           <ul class="no-list-style">
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-calendar font-small-3"></i> User:</a></span>
                                                    <a class="display-block overflow-hidden"><?php echo $this->db->get_where("users",array("id"=>$view->user_id))->row()->username ; ?></a>
                                                </li>
                                           
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-navigation font-small-3"></i> Provider :</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $this->db->get_where("service_provider",array("id"=>$view->provider_id))->row()->username ; ?></span>
                                                </li>
                                                 <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="fa fa-shopping-bag font-small-3"></i>Category :</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $this->db->get_where("category",array("id"=>$view->category))->row()->name ; ?></span>
                                                </li>
                                                <?php if($view->status > 1){ ?>
                                                 <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="fa fa-shopping-bag font-small-3"></i> Subcategory :</a></span>
                                                    <span class="display-block overflow-hidden"><?php if($view->service_subcategory){ echo $this->db->get_where("category",array("id"=>$view->service_subcategory))->row()->name ; }else{  echo "All" ; } ?></span>
                                                </li>
                                               <?php } ?> 
                                           </ul>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <ul class="no-list-style">
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-clock font-small-3"></i> Work type:</a></span>
                                                    <span class="display-block overflow-hidden"><?php if($view->work_on == 1){ echo "current" ; }else{ echo  "schadule on".$view->schadule_time ; }  ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Task Duration :</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $view->task_duration ; ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="fa fa-money font-small-3"></i> Task Type :</a></span>
                                                    <span class="display-block overflow-hidden"><?php if($view->task_type == 1){ echo "Fixed" ; }else{ echo  "Hourly for ".$view->hours ; }  ?></span>
                                                </li>
                                              </ul>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-4">
                                            <ul class="no-list-style">      
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="fa fa-money font-small-3"></i> Price :</a></span>
                                                    <span class="display-block overflow-hidden">€ <?php echo $view->price ;  ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="fa fa-money font-small-3"></i> Start on :</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $view->start_on ;  ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="fa fa-money font-small-3"></i> Finish on :</a></span>
                                                    <span class="display-block overflow-hidden"><?php echo $view->finish_on ;  ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="text-bold-500 primary"><a><i class="fa fa-money font-small-3"></i> Duration :</a></span>
                                                    <span class="display-block overflow-hidden"><?php if($view->task_type == 1){ echo "fixed" ;  }else{ echo $view->duration ; } ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div> 
                       <div class="card">
                            <div class="card-header padding-set">
                              <div class="col-12 col-md-5 col-lg-5 f-left">
                                  <h5>Transaction</h5>
                              </div>
                             </div>     
                            <div class="card-body">
                                <div class="card-block">
                                    <hr style="margin-top: 0;">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                          <table class="table table-responsive-md-md" id="mytable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Amount</th>
                                                        <th>Txn_id</th>
                                                        <th>Payment Method</th>
                                                        <th>Type</th>
                                                        <th>Payment date</th>
                                                        <th>Status</th>
                                                     </tr>
                                                </thead>
                                                <tbody>
                                                <?php if($transaction){ ?>
                                                  <tr>
                                                        <td> 1 </td>
                                                        <td><?php echo number_format($transaction->amount,2) ; ?></td>
                                                        <td><?php echo $transaction->transaction_id ; ?></td>
                                                        <td><?php echo $transaction->payment_method ; ?></td>
                                                        <td>Advance</td>
                                                        <td><?php echo $transaction->created_on ; ?></td>
                                                        <td>
                                                            <?php if($transaction->payment_status == 1){ ?>
                                                            <a class="success p-0"><i class="fa fa-check"></i> Complete</a>
                                                            <?php }elseif($transaction->payment_status == 2){ ?>
                                                            <a class="danger p-0"><i class="fa fa-times"></i> Declined</a>
                                                            <?php }else{ ?>
                                                            <a class="warning p-0"><i class="fa fa-circle"></i> Unverified</a>
                                                            <?php } ?>
                                                        </td>
                                                     </tr>
                                                 <?php } ?> 
                                                 <?php if($provider_transaction){ ?>
                                                  <tr>
                                                        <td> 1 </td>
                                                        <td><?php echo number_format($provider_transaction->amount,2) ; ?></td>
                                                        <td><?php echo $provider_transaction->transaction_id ; ?></td>
                                                        <td><?php echo $provider_transaction->payment_method ; ?></td>
                                                        <td>Booking</td>
                                                        <td><?php echo $provider_transaction->created_on ; ?></td>
                                                        <td>
                                                            <?php if($provider_transaction->payment_status == 1){ ?>
                                                            <a class="success p-0"><i class="fa fa-check"></i> Complete</a>
                                                            <?php }elseif($provider_transaction->payment_status == 2){ ?>
                                                            <a class="danger p-0"><i class="fa fa-times"></i> Declined</a>
                                                            <?php }else{ ?>
                                                            <a class="warning p-0"><i class="fa fa-circle"></i> Unverified</a>
                                                            <?php } ?>
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
                 
<style>
div#panallocation {
    width: 100% !important;
	height: 500px;
    overflow-y: scroll;
}
</style>
                <!-- Map Events -->
                
            </section>
            <!--About section ends-->

  
    </div>
  </div>


<?php include("footer.php") ; ?> 


 <script>
 $(document).ready(function(e) {
   get_rout() ; 
});
   </script> 
  

  <?php if($view->status == 3){ ?>
     <?php $trc = $this->db->get_where("transporter",array("id"=>$view->transporter_id))->row() ;  ?>
     <script type="text/javascript">
        var source, destination;
        var darection = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
    /*    google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('source'));
            new google.maps.places.SearchBox(document.getElementById('destination'));
            
        });*/

        function get_rout() {
          alert('xvcx') ;

            var mapOptions = {
                mapTypeControl: false,
                center: {lat: <?php echo $trc->current_lat ?>, lng: <?php echo $trc->current_lon ?>},
				travelMode: 'DRIVING',
				zoom: 13
            };
            
            map = new google.maps.Map(document.getElementById('maplocation'), mapOptions);
            darection.setMap(map);
            darection.setPanel(document.getElementById('panallocation'));


            source = document.getElementById("source").value;
            destination = document.getElementById("destination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING,
			};
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    darection.setDirections(response);
                }
            });


            
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    
                    distancefinel = distance.split(" ");
                    $('.distance').val(distancefinel[0]);
                   
				   
				   <?php $flp = $this->db->get_where("booking_current",array("booking_id"=>$view->id))->result() ; ?>
				   <?php foreach($flp as $fl){ ?>
				   <?php } ?>
       
				   
				       
	                        
                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
        
        
        
        
    </script>
  <?php }else{ ?>  

<script type="text/javascript">
        var source, destination;
        var darection = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
    /*    google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('source'));
            new google.maps.places.SearchBox(document.getElementById('destination'));
            
        });*/

        function get_rout() {


            var mapOptions = {
                mapTypeControl: false,
                center: {lat: <?php echo $view->pickup_lat ?>, lng: <?php echo $view->pickup_lon ?>},
				zoom: 13
            };
            
            map = new google.maps.Map(document.getElementById('maplocation'), mapOptions);
            darection.setMap(map);
            darection.setPanel(document.getElementById('panallocation'));


            source = document.getElementById("source").value;
            destination = document.getElementById("destination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    darection.setDirections(response);
                }
            });


            
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    
                    distancefinel = distance.split(" ");
                    $('.distance').val(distancefinel[0]);
                    
					var lp = $('#lp').val() ;
	   var jl = distancefinel[0]*lp ;
	//  alert(jl) ;
	  $('.tprice').val(jl) ;
                    
                    
                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
        
        
        
        
    </script>
    
    <?php } ?>
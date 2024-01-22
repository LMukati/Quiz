<?php include("header.php") ; ?>

                           
 
  <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!--User Profile Starts-->
            
            
            <section class="invoice-template">
    <div class="card"  id="invoicet">
        <div class="card-body p-3">
            <div id="invoice-template" class="card-block">
                <!-- Invoice Company Details -->
                <div id="invoice-company-details" class="row">
                    <div class="col-6 text-left">
                        <img src="<?php echo base_url() ?>frontend/images/late-logo.png" alt="company logo" class="mb-2" width="250">
                        <ul class="px-0 list-unstyled">
                            <li class="text-bold-800">Latetask</li>
                            <li>USA</li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <h2>INVOICE</h2>
                        <p class="pb-3"># INV-001001</p>
                        <ul class="px-0 list-unstyled">
                            <li>Amount</li>
                            <li class="lead text-bold-800">$ <?php echo $booking->price ; ?></li>
                        </ul>
                    </div>
                </div>
                <!--/ Invoice Company Details -->
                <!-- Invoice Customer Details -->
                <div id="invoice-customer-details" class="row pt-2">
                    <div class="col-sm-12 text-left">
                        <p class="text-muted">Bill To</p>
                    </div>
                    <div class="col-6 text-left">
                        <ul class="px-0 list-unstyled">
                            <li class="text-bold-800"><?php echo $user->username ?></li>
                            <?php   $addr = explode(',',$booking->address) ;  ?>
                            <?php if($addr){ ?>
                            <li><?php if(isset($addr[0])){ echo $addr[0] ;  }  if(isset($addr[1])){ echo ",". $addr[1] ;  }  ; ?></li>
                            <li><?php if(isset($addr[2])){ echo $addr[2]."," ;  } ?></li>
                            <li><?php if(isset($addr[3])){ echo $addr[3] ;  } if(isset($addr[4])){ echo ",".$addr[4] ;  } ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <p><span class="text-muted">Invoice Date :</span><?php echo date("d/m/Y",strtotime($booking->finish_on)) ; ?></p>
                        <p><span class="text-muted">Terms :</span> Task Complete</p>
                    </div>
                </div>
                <!--/ Invoice Customer Details -->
                <!-- Invoice Items Details -->
                <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                        <div class="table-responsive col-sm-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item &amp; Description</th>
                                        <th class="text-right">Rate</th>
                                        <th class="text-right">Hours</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($transaction){ ?>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <p><?php echo $booking->project_title ; ?></p>
                                            <p class="text-muted"><?php echo substr($booking->whatyouneed,50) ; ?></p>
                                        </td>
                                        <td class="text-right"><?php if($booking->task_type == 1){ echo "Fixed" ;  }else{ echo '$ '.$booking->price."/hr"; } ?></td>
                                        <td class="text-right"><?php if($booking->task_type == 1){ echo "Fixed" ;  }else{ echo  $booking->duration ; } ?></td>
                                        <td class="text-right">$ <?php if($booking->task_type == 1){ echo $booking->price ;  }else{ echo $booking->price* $booking->duration; } ?></td>
                                    </tr>
                                    <?php } ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-left">
                            <p class="lead">Payment Methods:</p>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                                <td>Payment Method :</td>
                                                <td class="text-right"><?php echo $booking->payment_method ; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Payment_date :</td>
                                                <td class="text-right"><?php echo $booking->payment_date ; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Payment amount :</td>
                                                <td class="text-right"><?php echo number_format($transaction->amount + $provider_transaction->amount,2) ; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="lead">Total due</p>
                            <div class="table-responsive">
                                <?php if($booking->task_type == 1){  $total_amount = $booking->price ;  }else{ $total_amount = $booking->price*$booking->duration ;  }  ?>
                                
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Admin Commission</td>
                                            <td class="text-right">$ <?php $commi =  (($total_amount * $commission)/100) ; echo number_format($commi,2) ;  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Provider Payment</td>
                                            <td class="text-right">$ <?php echo number_format($total_amount - $commi,2) ;  ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-800">Total</td>
                                            <td class="text-bold-800 text-right"> $ <?php echo number_format($total_amount,2) ; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Payment Made</td>
                                            <td class="pink text-right">$ <?php echo number_format($transaction->amount + $provider_transaction->amount,2) ; ?></td>
                                        </tr>
                                        <tr class="bg-grey bg-lighten-4">
                                            <td class="text-bold-800">Balance Due</td>
                                            <td class="text-bold-800 text-right">$ <?php echo number_format((($transaction->amount + $provider_transaction->amount) - $total_amount ),2) ; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Invoice Footer -->
                <div id="invoice-footer">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <h6>Terms &amp; Condition</h6>
                            <p>You know, being a test pilot isn't always the healthiest business in the world. We predict too
                                much for the next year and yet far too little for the next 10.</p>
                        </div>
                        
                    </div>
                </div>
                <!--/ Invoice Footer -->
            </div>
        </div>
    </div>
</section>
          <!---<button class="btn btn-success" onclick="print_specific_div_content()">Print</button> -->
            
            <!--About section starts-->
            <section id="about">
                <div class="row">
                    <div class="col-12">
                        <div class="content-header">	<a href="javascript:window.print()" onclick="$(this).hide()" class="btn theme-btn-trans">Print this invoice</a></div>
                    </div>
                </div>
               
            </section>
            <!--About section ends-->


            <!--Booking section starts-->

            



            </div>
            <!--Statistics cards Ends-->
 
                        
        
<?php include("footer.php") ; ?> 

<script>


    
    function printDiv() 
{

  var divToPrint=document.getElementById('invoicet');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}

   $(document).ready(function(){
        $('.wrapper').addClass('nav-collapsed') ;
        $('.wrapper').addClass('menu-collapsed') ; 
        $('.sidebar-header').parent().css('display','none') ;
        $('title').html('Booking Invoice') ;
        $('footer').remove() ;
            
   }) ;
  
    
</script>



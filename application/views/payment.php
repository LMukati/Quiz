<?php include("header.php") ?>


<main>
  <div class="padding-15" style="padding-bottom:80px;">
    <div class="payment-wrapper">
      <?php if(isset($_GET['msg']) && $this->input->get('msg') !== ''){ ?>
        <div class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
           <?php echo  $this->input->get('msg') ; ?>
        </div>
      <?php } ?>  
      <?php if($this->session->flashdata("danger")){ ?>
        <div class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
           <?php echo  $this->session->flashdata("danger") ; ?>
        </div>
      <?php } ?> 
      <?php if($this->session->flashdata("success")){ ?>
        <div class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
           <?php echo  $this->session->flashdata("success") ; ?>
        </div>
      <?php } ?> 


     <form action="" id="payment-form" method="post" style="padding-top: 30px;">
      <div class="payment-row">
          
        <div class="payment-col">
          <!-- -->
          <div class="payment-field-row">
            <div class="payment-field-col-half field-border border-redius flex align-center gap-10">
              <i class="fa fa-user" aria-hidden="true"></i>
              <input type="text" id="name" name="name" required value="<?php if(isset($_GET['role'])){ echo $result->name; }?>" <?php if(isset($_GET['role'])){ echo "readonly"; }?> placeholder="First Name*">
            </div>
            <div class="payment-field-col-half field-border border-redius flex align-center gap-10">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <input type="text" id="contact" name="contact" required value="<?php if(isset($_GET['role'])){ echo $result->phone; }?>" <?php if(isset($_GET['role'])){ echo "readonly"; }?> placeholder="Phone no.">
            </div>
          </div>
          <!-- -->
          <!-- -->
          <div class="payment-field-row">
            <div class="payment-field-col-full field-border border-redius flex align-center gap-10">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <input type="text" id="uemail" name="email" required  value="<?php if(isset($_GET['role'])){ echo $result->email; }?>" <?php if(isset($_GET['role'])){ echo "readonly"; }?> placeholder="Email*">
            </div>      
          </div>
          <!-- -->

        </div>
        <div class="payment-col border-left-pay">
          <div>
          <!-- -->
          <div class="payment-field-row flex-wrap">   
            <div class="payment-field-col-full">
              <label>Card number</label>
              <div class=" field-border border-redius flex align-center gap-10">    
              <input type="text" data-stripe="number" class="card-number" name="cardnumber" maxlength="16" minlength="16" placeholder="1234 1234 1234 1234"  >
              <img src="<?php echo base_url('frontend/') ?>images/cards.jpg" class="mobile-small">
              </div>
            </div>      
          </div>
          <!-- -->
          <!-- -->
          <div class="payment-field-row flex">    
            <div class="payment-field-col-half">
              <label>Expiration</label>
              <div class=" field-border border-redius flex align-center gap-10">    
                <select class="form-control card-expiry-month" name="month" data-stripe="exp_month">
                  <option>Month</option>
                  <option value="01">Jan (01)</option>
                  <option value="02">Feb (02)</option>
                  <option value="03">Mar (03)</option>
                  <option value="04">Apr (04)</option>
                  <option value="05">May (05)</option>
                  <option value="06">June (06)</option>
                  <option value="07">July (07)</option>
                  <option value="08">Aug (08)</option>
                  <option value="09">Sep (09)</option>
                  <option value="10">Oct (10)</option>
                  <option value="11">Nov (11)</option>
                  <option value="12" >Dec (12)</option>
                </select>
              </div>
            </div>  
            <div class="payment-field-col-half">
              <div class=" field-border border-redius flex align-center gap-10" style="margin-top: 22px;">    
                <select class="form-control card-expiry-year" data-stripe="exp_year" name="year">
                    <option value="">Year</option>
                    <option value="23">2023</option>
                    <option value="24">2024</option>
                    <option value="25">2025</option>
                    <option value="26">2026</option>
                    <option value="27">2027</option>
                    <option value="28">2028</option>
                    <option value="29">2029</option>
                    <option value="30">2030</option>
                </select>
              </div>
            </div>    
          </div>
          <!-- -->
          <!-- -->
          <div class="payment-field-row flex-wrap">   
            <div class="payment-field-col-full">
              <label>CVC</label>
              <div class=" field-border border-redius flex align-center gap-10">    
                <input type="text" maxlength="3" id="inputPassword3" name="cvv" placeholder="CVV" data-stripe="cvc" class="card-cvc" >
                <img src="<?php echo base_url('frontend/') ?>images/cvc.jpg">
              </div>
            </div>      
          </div>

          <div class="payment-field-row flex-wrap">   
            <div class="payment-field-col-full">
              <label>Postal Code</label>
              <div class=" field-border border-redius flex align-center gap-10">    
              <input type="text" size="6" class="form-control" data-stripe="address_zip" placeholder="Postal Code">
              </div>
            </div>      
          </div>

          <!-- -->
        </div>
        <?php if(!isset($_GET['role'])){ ?>
        <div class="padding-top-50">
           <h3>Have a Coupon?</h3>
          
          <div class="payment-field-row">
            <div class="payment-field-col-full field-border border-redius flex align-center gap-10">
              <i class="fa fa-eraser" aria-hidden="true"></i>
              <input type="text" id="coupons" name="coupons" value="" placeholder="Coupon code">
            </div>      
          </div> 
          
        <?php }else{ ?> 
          <input type="hidden" id="coupons" name="coupons" value="" placeholder="Coupon code">
          <input type="hidden" id="role" name="role" value="<?php if(isset($_GET['role'])){ echo $_GET['role']; } ?>" placeholder="Coupon code">
        <?php } ?>
          <!-- -->
          <div class="total-box-payment">
            <h3>Total</h3>
            <h2>$<?php echo $plan->price ?></h2>
          </div>
          <!-- -->
          <div class="payment-errors" style="color:red;"></div>
          <input type="hidden" name="bookingSubmit" value="1">
          <button class="submit btn-blue full-width" name="bookingSubmit" type="submit" value="Submit">Get access to my results</button>
        </div>

        </div>
      </div>
     </form>
    </div>
  </div>
</main>

<?php include("footer.php") ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- TO DO : Place below JS code in js file and include that JS file -->

<script type="text/javascript">

  Stripe.setPublishableKey('<?php echo $store->stripe_pk ; ?>');
    //Stripe.setPublishableKey('pk_live_1B0lqmm8XY2kSQN0n0EmoYiA');
  //Stripe.setPublishableKey('pk_test_51LoeCLSAQZSYt1m5DjWDXj4CZBRZHT41z21MWrAFKLbeFqQMqWiwQ7kRHdoqXFKt8JBEsZAnSzSlmAx3Nh4e3Z5700aFe5pc67');
  
  $(function() {
    var $form = $('#payment-form');
    $form.submit(function(event) {
      // Disable the submit button to prevent repeated clicks:
      var $coupons = $('#coupons').val();
      
      if($coupons !=""){
          $.ajax({
            type: 'post',
            url: '<?php echo base_url('Home/payment') ?>',
            data: $('#payment-form').serialize(),
            success: function (data) {
             
           	}
          });
      }else{
      $form.find('.submit').prop('disabled', true);
    
      // Request a token from Stripe:
      Stripe.card.createToken($form, stripeResponseHandler);
            
      // Prevent the form from being submitted:
      return false;
      }
    });
  });

  function stripeResponseHandler(status, response) {
    // Grab the form:
    var $form = $('#payment-form');

    if (response.error) { // Problem!
            
      // Show the errors on the form:
      $form.find('.payment-errors').text(response.error.message);
      $form.find('.submit').prop('disabled', false); // Re-enable submission

    } else { // Token was created!

      // Get the token ID:
      var token = response.id;
            
      // Insert the token ID into the form so it gets submitted to the server:
      $form.append($('<input type="hidden" name="stripeToken">').val(token));
           // alert($form.get(0));
      // Submit the form:
      //$('#payment-form').submit();
      $form.get(0).submit();
      
      //return false ;
    }
  };
</script>  


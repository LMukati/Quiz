<style>
.coupon {
  border: 5px dotted #28527a; /* Dotted border */
  width: 80%;
  border-radius: 15px; /* Rounded border */
  margin: 0 auto; /* Center the coupon */
  max-width: 600px;
}

.container {
  padding: 2px 16px;
  background-color: #f1f1f1;
}

.promo {
  background: #ccc;
  padding: 3px;
}

.expire {
  color: red;
}</style>
<div class="coupon">
  
  <img src="https://www.smartiq.org/test/upload/logo/logo-blue.png" style="align:center" alt="Avatar">
  <div class="container" style="background-color:white">
    <h2><b>Get 1 extra IQ test</b></h2>
    <p>Want to challenge your friends and family, So you have code share with friends and family and chalange to him/her.</p>
  </div>
  <div class="container">
    <p>Use Promo Code: <span class="promo"><?php echo $coupon; ?></span></p>
    <p class="expire">Wnen your friend or family use this code that expire.</p>
  </div>
</div>
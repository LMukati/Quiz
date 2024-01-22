<?php include("header.php") ?>

<main>
  <div class="padding-15 light-blue" style="padding-bottom:50px;">
<style>
    .btn-light-red {
    background: #e6115c !important;
    color: #fff !important;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    border-radius: 5px;
    display: inline-block;
    line-height: 27px;
    padding: 10px 40px;
    text-decoration: none !important;
    border: 0;
    transition: all 0.2s ease-out;
    letter-spacing: 0px;
    text-align: center;
    border: 0px;
    font-weight: 600;
</style>
    <div class="checkout-wrapper">
      <!-- -->
      <div class="alert-success text-center margin-btm-15">
        <p><strong>Congratulations!</strong></p>
        <p>You completed the test faster than <?php echo rand(0,95) ?>% of people. Remarkable performance in "cognitive ability".</p>
      </div>
      <!-- -->

      <!-- -->
      <div class="secure-box margin-btm-15">
        <div class="secure-box-row">
          <div class="secure-box-col-left">
            <ul>
              <li><img src="<?php echo base_url('frontend/'); ?>images/check-circle.svg">100% Secure 🔒</li>
              <li><img src="<?php echo base_url('frontend/'); ?>images/check-circle.svg">One-time assessment fee</li>
              <li><img src="<?php echo base_url('frontend/'); ?>images/check-circle.svg">Instant Access and Lifetime Customer Support</li>
            </ul>
          </div>
          <div class="secure-box-col-right text-center">
            <p>IQ TEST RESULTS SAVED</p>
            <p>Find out your IQ score!</p>
            <p>Your answers have been saved for the next 15 minutes.
            Time Remaining</p>
            <h3><span id="timer"></span></h3>
          </div>
        </div>
      </div>
      <!-- -->

      <!-- -->
      <div class="desktop-show">
      <div class="price-box-row ">
        <?php $plans = $this->db->get_where("plans",array("id"=>1))->result() ; ?>  
        <?php foreach($plans as $plan){ ?>
        <div class="price-box-col">
          <div class="price-header text-center">
            <h3><?php echo $plan->name ?></h3>
          </div>
          <div class="price-img text-center">
            <?php if($plan->id == 1){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/iq-report.jpg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 2){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/quiz-report.jpeg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 3){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/report-certificate.jpeg" >
            <?php } ?>
          </div>
          <div class="price-btn text-center">
            <p>BEST VALUE</p>
             
            <a href="<?php echo base_url('payment/'.$plan->id.'/'.$result_id) ?>" class="btn-light-blue">Get my results</a>
           
            
            
          </div>
          <div class="price-body text-center">
            <h3 class=" ">$<?php echo $plan->price ?></h3>
            <ul>
              <li>
                <h4 class="text-center" style="display: block;"><img src="<?php echo base_url('frontend/') ?>images/check.png">Your IQ Score</h4>
                <p><?php echo $plan->include ; ?></p>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>
        
        <?php $plans = $this->db->get_where("plans",array("id"=>3))->result() ; ?>  
        <?php foreach($plans as $plan){ ?>
        <div class="price-box-col">
          <div class="price-header text-center">
            <h3><?php echo $plan->name ?></h3>
          </div>
          <div class="price-img text-center">
            <?php if($plan->id == 1){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/iq-report.jpg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 2){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/quiz-report.jpeg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 3){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/report-certificate.jpeg">
            <?php } ?>
          </div>
          <div class="price-btn text-center">
            <p>BEST VALUE</p>
             <a href="<?php echo base_url('payment/'.$plan->id.'/'.$result_id) ?>" class="btn-light-red" >Get my results</a>
          </div>
          <div class="price-body text-center">
            <h3 class=" ">$<?php echo $plan->price ?></h3>
            <ul>
              <li>
                <h4 class="text-center" style="display: block;"><img src="<?php echo base_url('frontend/') ?>images/check.png">Your IQ Score</h4>
                <p><?php echo $plan->include ; ?></p>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>
        
        <?php $plans = $this->db->get_where("plans",array("id"=>2))->result() ; ?>  
        <?php foreach($plans as $plan){ ?>
        <div class="price-box-col">
          <div class="price-header text-center">
            <h3><?php echo $plan->name ?></h3>
          </div>
          <div class="price-img text-center">
            <?php if($plan->id == 1){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/iq-report.jpg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 2){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/quiz-report.jpeg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 3){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/report-certificate.jpeg">
            <?php } ?>
          </div>
          <div class="price-btn text-center">
            <p>BEST VALUE</p>
            <a href="<?php echo base_url('payment/'.$plan->id.'/'.$result_id) ?>" class="btn-light-blue">Get my results</a>
          </div>
          <div class="price-body text-center">
            <h3 class=" ">$<?php echo $plan->price ?></h3>
            <ul>
              <li>
                <h4 class="text-center" style="display: block;"><img src="<?php echo base_url('frontend/') ?>images/check.png">Your IQ Score</h4>
                <p><?php echo $plan->include ; ?></p>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>
        
        
      </div>
      </div>
      <!-- -->
      <div class="mobile-show">
<div class="price-box-row ">
  <?php $plans = $this->db->get_where("plans",array("id"=>3))->result() ; ?>  
        <?php foreach($plans as $plan){ ?>
        <div class="price-box-col">
          <div class="price-header text-center">
            <h3><?php echo $plan->name ?></h3>
          </div>
          <div class="price-img text-center">
            <?php if($plan->id == 1){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/iq-report.jpg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 2){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/quiz-report.jpeg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 3){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/report-certificate.jpeg">
            <?php } ?>
          </div>
          <div class="price-btn text-center">
            <p>BEST VALUE</p>
             <a href="<?php echo base_url('payment/'.$plan->id.'/'.$result_id) ?>" class="btn-light-red" >Get my results</a>
          </div>
          <div class="price-body text-center">
            <h3 class=" ">$<?php echo $plan->price ?></h3>
            <ul>
              <li>
                <h4 class="text-center" style="display: block;"><img src="<?php echo base_url('frontend/') ?>images/check.png">Your IQ Score</h4>
                <p><?php echo $plan->include ; ?></p>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>
        <?php $plans = $this->db->get_where("plans",array("id"=>1))->result() ; ?>  
        <?php foreach($plans as $plan){ ?>
        <div class="price-box-col">
          <div class="price-header text-center">
            <h3><?php echo $plan->name ?></h3>
          </div>
          <div class="price-img text-center">
            <?php if($plan->id == 1){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/iq-report.jpg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 2){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/quiz-report.jpeg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 3){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/report-certificate.jpeg" >
            <?php } ?>
          </div>
          <div class="price-btn text-center">
            <p>BEST VALUE</p>
             
            <a href="<?php echo base_url('payment/'.$plan->id.'/'.$result_id) ?>" class="btn-light-blue">Get my results</a>
           
            
            
          </div>
          <div class="price-body text-center">
            <h3 class=" ">$<?php echo $plan->price ?></h3>
            <ul>
              <li>
                <h4 class="text-center" style="display: block;"><img src="<?php echo base_url('frontend/') ?>images/check.png">Your IQ Score</h4>
                <p><?php echo $plan->include ; ?></p>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>
        
        
        
        <?php $plans = $this->db->get_where("plans",array("id"=>2))->result() ; ?>  
        <?php foreach($plans as $plan){ ?>
        <div class="price-box-col">
          <div class="price-header text-center">
            <h3><?php echo $plan->name ?></h3>
          </div>
          <div class="price-img text-center">
            <?php if($plan->id == 1){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/iq-report.jpg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 2){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/quiz-report.jpeg" style="width: auto;height: 90px; margin: auto;">
            <?php } ?>
            <?php if($plan->id == 3){ ?>  
                <img src="<?php echo base_url('frontend/'); ?>images/report-certificate.jpeg">
            <?php } ?>
          </div>
          <div class="price-btn text-center">
            <p>BEST VALUE</p>
            <a href="<?php echo base_url('payment/'.$plan->id.'/'.$result_id) ?>" class="btn-light-blue">Get my results</a>
          </div>
          <div class="price-body text-center">
            <h3 class=" ">$<?php echo $plan->price ?></h3>
            <ul>
              <li>
                <h4 class="text-center" style="display: block;"><img src="<?php echo base_url('frontend/') ?>images/check.png">Your IQ Score</h4>
                <p><?php echo $plan->include ; ?></p>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>
        
        
      </div>
      </div>
      <!-- -->
      <!-- -->
      <div class="text-center padding-top-30">
        <img src="<?php echo base_url('frontend/'); ?>images/credit-cards.png">
        <p>100% secure 🔒</p>
      </div>
      <!-- -->


    </div>
  </div>
</main>


<?php include("footer.php") ?>

<script>
document.getElementById('timer').innerHTML =
  14 + ":" + 59;
startTimer();


function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m<0){
    window.location.assign('<?php echo base_url(); ?>');
  }
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  console.log(m)
  setTimeout(startTimer, 1000);
  
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}

</script>
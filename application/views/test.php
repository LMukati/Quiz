<?php include("header.php") ?>
<style type="text/css">
	.qesq{ display:none;  }
	/*#loading {*/
 /*   background: url('https://www.smartiq.org/test/frontend/images/loading-waiting.gif') no-repeat center center;*/
 /*   position: absolute;*/
 /*   top: 0;*/
 /*   left: 0;*/
 /*   height: 100%;*/
 /*   width: 100%;*/
 /*   z-index: 9999999;*/
/*}*/
</style>
<main id="mainform">
    <!--<div id="loading"></div>-->
<div class="padding-15">
	<div class="time-box-wrapper">
		<div class="time-box">
			<div class="time-box-col"><p><?php //echo $quiz->title; ?></p></div>
			<div class="time-box-col text-center">
				<div class="time-bg"><p><span id="timer"></span></p></div>
			</div>
			<div class="time-box-col text-right">
				<div class="tooltip"><img src="<?php echo base_url('frontend/') ?>images/question-mark.png">
		  <span class="tooltiptext">Select the option that will correctly replace the question mark (?) in the given series</span>
		</div>
	</div>
</div>


<div class="wrapper">
  	<div class="main-top-bar">
  		<div class="main-top-bar-col">
  			<h2><span id="currentq">1</span>/<?php echo count($questions);  ?></h2>
  		</div>
  		<div class="main-top-bar-col">
  			<div class="next-buttons">
  				<div class="pre-btn"><a href="#" onclick="Prev()" ><i class="fa fa-chevron-left" aria-hidden="true"></i>Previous</a></div>
  				<div class="skip-btn"><a href="#" onclick="Next()">Skip<i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
  			</div>
  		</div>
  	</div>
  	<div class="main-body">
  		<form action="" method="post" id="qform">
  			<input type="hidden" name="quiz_id" value="<?php echo $quiz->id; ?>">
  		<?php $qno = 1; foreach($questions as $que){ ?>
  			<input type="hidden" name="qid[]" value="<?php echo $que->id ; ?>">
  			<input type="hidden" name="category[]" value="<?php echo $que->category ; ?>">
  			<div id="qdiv<?php echo $qno ?>" class="allques <?php if($qno == 1){ echo "show" ; } ?>">
		  		<div class="main-body-left">
		  			<!--<p>Q. <?php $que->question_text ; ?></p>-->
		  			<?php if($que->question_image){ ?>
		  			<img src="<?php echo base_url().$que->question_image ; ?>">
		  			<?php } ?>
		  		</div>
		  		<div class="main-body-right">
		  			<div class="main-body-col">
		  				<input type="radio" id="q<?php echo $qno; ?>a1" name="question<?php echo $que->id ; ?>" class="qesq" value="1" onchange="submitans(<?php echo $qno ?>,<?php echo $que->id; ?>)">
		  				<label for="q<?php echo $qno; ?>a1" id="q<?php echo $qno; ?>ans1" class="qans<?php echo $qno; ?>">
			  				<h3>A. <?php $que->option1text; ?></h3>
			  				<?php if($que->option1image){ ?>
			  				<img src="<?php echo base_url().$que->option1image ; ?>">
			  				<?php } ?>
		  				</label>
		  			</div>
		  			<div class="main-body-col">
		  				<input type="radio" id="q<?php echo $qno; ?>a2" class="qesq" name="question<?php echo $que->id; ?>" value="2" onchange="submitans(<?php echo $qno ?>,<?php echo $que->id; ?>)">
		  				<label for="q<?php echo $qno; ?>a2" id="q<?php echo $qno; ?>ans2" class="qans<?php echo $qno; ?>">
			  				<h3>B. <?php $que->option2text; ?></h3>
			  				<?php if($que->option2image){ ?>
			  				<img src="<?php echo base_url().$que->option2image ; ?>">
			  				<?php } ?>
		  				</label>
		  			</div>
		  			<div class="main-body-col">
		  				<input type="radio" id="q<?php echo $qno; ?>a3" class="qesq" name="question<?php echo $que->id; ?>" value="3" onchange="submitans(<?php echo $qno ?>,<?php echo $que->id; ?>)">
		  				<label for="q<?php echo $qno; ?>a3" id="q<?php echo $qno; ?>ans3" class="qans<?php echo $qno; ?>">
			  				<h3>C. <?php $que->option3text; ?></h3>
			  				<?php if($que->option3image){ ?>
			  				<img src="<?php echo base_url().$que->option3image ; ?>">
			  				<?php } ?>
		  				</label>
		  			</div>
		  			<div class="main-body-col">
		  				<input type="radio" id="q<?php echo $qno; ?>a4" class="qesq" name="question<?php echo $que->id; ?>" value="4" onchange="submitans(<?php echo $qno ?>,<?php echo $que->id; ?>)">
		  				<label for="q<?php echo $qno; ?>a4" id="q<?php echo $qno; ?>ans4" class="qans<?php echo $qno; ?>">
			  				<h3>D. <?php $que->option4text; ?></h3>
			  				<?php if($que->option4image){ ?>
			  				<img src="<?php echo base_url().$que->option4image ; ?>">
			  				<?php } ?>
		  				</label>
		  			</div>
		  		</div>
  			</div>
  		<?php $qno++; } ?>
  		</form>
  	</div>
</div>
<div class="pagination-box">
	<ul>
		<?php for($c = 1; $c <= count($questions); $c++){ ?>
		<li id="pg<?php echo $c ?>" class="allpg <?php if($c==1){ echo "active-pgn" ; }  ?>" onclick="gotoques(<?php echo $c ?>)" ><?php echo $c; ?></li>
		<?php } ?>	
	</ul>
</div>

</main>


<div class="wrapper loding text-center" id="continueform" style="display:none;">
  <div class="loding-text">
    <p><strong>Do you want to confirm your answers? <br>You will not be able to edit them after validation.</strong></p>
    <p><a href="" id="selectplan" class="btn-red">Get my results</a></p>
    <p><strong><a href="#" onclick="removecontinue()"><i class="fa fa-chevron-left" aria-hidden="true"></i> Edit My Answers</a></strong></p>
  </div>
</div>


<?php include("footer.php"); ?>

<input type="hidden" id="totalquestion" value="<?php echo count($questions); ?>">
<input type="hidden" id="currentquestion" value="1">
<!--<script src="https://cdn.jsdelivr.net/gh/AmagiTech/JSLoader/amagiloader.js"></script>-->
<script>
const AmagiLoader = {
    __loader: null,
    show: function () {

        if (this.__loader == null) {
            var divContainer = document.createElement('div');
            divContainer.style.position = 'fixed';
            divContainer.style.left = '0';
            divContainer.style.top = '0';
            divContainer.style.width = '100%';
            divContainer.style.height = '100%';
            divContainer.style.zIndex = '9998';
            divContainer.style.backgroundColor = 'rgba(250, 250, 250, 0.80)';

            var div = document.createElement('div');
            div.style.position = 'absolute';
            div.style.left = '50%';
            div.style.top = '50%';
            div.style.zIndex = '9999';
            div.style.height = '64px';
            div.style.width = '64px';
            div.style.margin = '-76px 0 0 -76px';
            div.style.border = '8px solid #e1e1e1';
            div.style.borderRadius = '50%';
            div.style.borderTop = '8px solid #28527a';
            div.animate([
                { transform: 'rotate(0deg)' },
                { transform: 'rotate(360deg)' }
              ], {
                duration: 2000,
                iterations: Infinity
              });
            divContainer.appendChild(div);
            this.__loader = divContainer
            document.body.appendChild(this.__loader);
        }
        this.__loader.style.display="";
    },
    hide: function(){
        if(this.__loader!=null)
        {
            this.__loader.style.display="none";
        }
    }
}

 AmagiLoader.show();
 setTimeout(() => {
    AmagiLoader.hide();
 }, 10000);

// function hideLoader() {
//     $('#loading').hide();
// }

// $(window).ready(hideLoader);

// // Strongly recommended: Hide loader after 20 seconds, even if the page hasn't finished loading
// setTimeout(hideLoader, 20 * 1000);
document.getElementById('timer').innerHTML =
  19 + ":" + 59;
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

function submitans(qno,qid)
{
	var  totalquestion = $('#totalquestion').val();
	if(qno == totalquestion)
	{
	    
	    var qval = $('input[name="question'+qid+'"]:checked').val() ;
	    //alert('#q'+qno+'ans'+qval);
	    $('.qans'+qno).css("display","contents");
	    $('.qans'+qno).css("box-shadow","none");
	    $('.qans'+qno).css("padding","0");
	    $('#q'+qno+'ans'+qval).css("display","grid");
	    $('#q'+qno+'ans'+qval).css("box-shadow","1px 2px 9px #28527a");
	    $('#q'+qno+'ans'+qval).css("padding","2px");
	    $('#q'+qno+'ans'+qval).css("border","2px solid rgb(20, 9, 230)");
	    
		$.ajax({
            type: 'post',
            url: '<?php echo base_url('Home/submitquestion') ?>',
            data: $('#qform').serialize(),
            success: function (data) {
            	$('#mainform').hide();
            	$('#continueform').show();
            	$('#selectplan').attr("href",data);
           	}
          });
	}	
	else
	{
	Nextqno = parseInt(1) + parseInt(qno) ;
	$('#qdiv'+qno).removeClass('show');
	$('#qdiv'+Nextqno).addClass('show');
	$('#currentquestion').val(Nextqno);
	$('.allpg').removeClass('active-pgn');
	$('#pg'+Nextqno).addClass('active-pgn'); 
	$('#pg'+qno).addClass('selected-pgn'); 
	$('#currentq').html(Nextqno);
	
	    var qval = $('input[name="question'+qid+'"]:checked').val() ;
	    //alert('#q'+qno+'ans'+qval);
	    $('.qans'+qno).css("display","contents");
	    $('.qans'+qno).css("box-shadow","none");
	    $('.qans'+qno).css("padding","0");
	    $('#q'+qno+'ans'+qval).css("display","grid");
	    $('#q'+qno+'ans'+qval).css("box-shadow","1px 2px 9px #28527a");
	    $('#q'+qno+'ans'+qval).css("padding","2px");
	    $('#q'+qno+'ans'+qval).css("border","2px solid rgb(20, 9, 230)");
	}
} 


function Next()
{
	var qno = $('#currentquestion').val();
	var  totalquestion = $('#totalquestion').val();
	if(qno == totalquestion)
	{
		$.ajax({
            type: 'post',
            url: '<?php echo base_url('Home/submitquestion') ?>',
            data: $('#qform').serialize(),
            success: function (data) {
            	$('#mainform').hide();
            	$('#continueform').show();
            	$('#selectplan').attr("href",data);
           	}
          });
	}	
	else
	{
	Nextqno = parseInt(1) + parseInt(qno) ;
	$('#qdiv'+qno).removeClass('show');
	$('#qdiv'+Nextqno).addClass('show');
	$('#currentquestion').val(Nextqno);
	$('.allpg').removeClass('active-pgn');
	$('#pg'+Nextqno).addClass('active-pgn'); 
	$('#currentq').html(Nextqno);
	}
} 

function Prev()
{

	var qno = $('#currentquestion').val();
	var  totalquestion = $('#totalquestion').val();
	if(qno == 1)
	{

	}	
	else
	{
	Nextqno = parseInt(qno) -  parseInt(1) ;
	$('#qdiv'+qno).removeClass('show');
	$('#qdiv'+Nextqno).addClass('show');
	$('#currentquestion').val(Nextqno);
	$('.allpg').removeClass('active-pgn');
	$('#pg'+Nextqno).addClass('active-pgn'); 
	$('#currentq').html(Nextqno);
	}
} 


function gotoques(qno)
{
    $('.allques').removeClass('show');
    $('#qdiv'+qno).addClass('show');
    $('#currentq').html(qno);
    $('.allpg').removeClass('active-pgn');
	$('#pg'+qno).addClass('active-pgn'); 
}


function removecontinue()
{
	$('#continueform').hide();
	$('#mainform').show();
}


</script>
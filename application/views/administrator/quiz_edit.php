<?php include("header.php") ; ?>
<style type="text/css">
    .nmf {
    background: #e5e5e5;
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 10px;
}
</style>
<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper"><!--Statistics cards Starts-->
    
      <section id="simple-table">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
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
                    <div class="card-block">
                        
                            <div class="form-body">
                                <div class="col-md-12"  style="float:left">
                                    <div class="form-group">
                                        <label >Quiz Title</label>
                                        <input type="text" name="title" class="form-control" required value="<?php echo $view->title; ?>">
                                    </div>

                                    <?php $j=1; foreach($content as $con){ ?>
                                    <form class="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="nmf">
                                    <h4 class="section heading mt-2">Question <?php echo $j; ?></h4>
                                        <div class="form-group">
                                            <label >Question category</label>
                                            <!--<input type="text" name="category" value="<?php echo $con->category ; ?>" class="form-control" required>-->
                                            <select class="form-control" name="category" required>
                                                        <option value="">Select Question Category</option>
                                                        <option value="abstract_resoning" <?php if($con->category == "abstract_resoning"){ echo "selected" ; }  ?>>Abstract resoning</option>
                                                        <option value="pattern_recognition" <?php if($con->category == "pattern_recognition"){ echo "selected" ; }  ?>>Pattern recognition</option>
                                                        <option value="deductive_reasoning" <?php if($con->category == "deductive_reasoning"){ echo "selected" ; }  ?>>Deductive reasoning</option>
                                                        <option value="numerical_reasoning" <?php if($con->category == "numerical_reasoning"){ echo "selected" ; }  ?>>Numerical reasoning</option>
                                                        <option value="cognitive_ability" <?php if($con->category == "cognitive_ability"){ echo "selected" ; }  ?>>Cognitive ability</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Question text and image</label>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <input type="hidden" name="questionid" value="<?php echo $con->id; ?>" >
                                                    <input type="text" name="questiontext" class="form-control" value="<?php echo $con->question_text ; ?>" >
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="file" name="questionimage" class="form-control">
                                                    <input type="hidden" name="questionimageold" value="<?php echo $con->question_image ; ?>">
                                                    <?php if($con->question_image){
                                                        echo '<img src="'.base_url().$con->question_image.'" style="height:50px" >';
                                                    } ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <select class="form-control" name="correctanswer" required>
                                                        <option value="">Select Correct Answer</option>
                                                        <option value="1" <?php if($con->correct_answer == 1){ echo "selected" ; }  ?>>Option 1</option>
                                                        <option value="2" <?php if($con->correct_answer == 2){ echo "selected" ; }  ?>>Option 2</option>
                                                        <option value="3" <?php if($con->correct_answer == 3){ echo "selected" ; }  ?>>Option 3</option>
                                                        <option value="4" <?php if($con->correct_answer == 4){ echo "selected" ; }  ?>>Option 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Option 1</label>
                                                        <input type="text" name="option1text" class="form-control" value="<?php echo $con->option1text ; ?>">
                                                        <input type="file" name="option1file" class="form-control">
                                                        <input type="hidden" name="option1fileold" value="<?php echo $con->option1image ; ?>"> 
                                                        <?php if($con->option1image){
                                                        echo '<img src="'.base_url().$con->option1image.'" style="height:50px" >';
                                                    } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Option 2</label>
                                                        <input type="text" name="option2text" class="form-control" value="<?php echo $con->option2text ; ?>">
                                                        <input type="file" name="option2file" class="form-control">
                                                        <input type="hidden" name="option2fileold" value="<?php echo $con->option2image ; ?>"> 
                                                        <?php if($con->option2image){
                                                        echo '<img src="'.base_url().$con->option2image.'" style="height:50px" >';
                                                    } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Option 3</label>
                                                        <input type="text" name="option3text" class="form-control" value="<?php echo $con->option3text ; ?>">
                                                        <input type="file" name="option3file" class="form-control">
                                                        <input type="hidden" name="option3fileold" value="<?php echo $con->option3image ; ?>
                                                        "> 
                                                        <?php if($con->option3image){
                                                        echo '<img src="'.base_url().$con->option3image.'" style="height:50px" >';
                                                    } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Option 4</label>
                                                        <input type="text" name="option4text" class="form-control" value="<?php echo $con->option4text ; ?>">
                                                        <input type="file" name="option4file" class="form-control">
                                                        <input type="hidden" name="option4fileold" value="<?php echo $con->option4image ; ?>"> 
                                                        <?php if($con->option4image){
                                                        echo '<img src="'.base_url().$con->option4image.'" style="height:50px" >';
                                                    } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-success btn-block" name="update" value="1">Update Question</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-danger btn-block" name="delete" value="1" onclick="return confirm('Sure to delete?')">Delete Question</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <?php $j++; } ?>
                                    

                                </div>

                                

                            </div> 


                            <div class="form-actions center mt-5">
                                <div class="row" >
                                    <div class="col-md-12">
                                        <button type="button" onclick="addtextfield()" class="btn btn-success btn-block btn-lg"  data-toggle="modal" data-target="#myModal" style="width:100%">Add New Question</button>
                                    </div> 
                                </div>
                                
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
</div>       
    
        
        
<?php include("footer.php") ; ?> 

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Add Question</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div id="moresection"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="insert" value="1">Add Question</button>
        </div>
      </form>
    </div>

  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<input type="hidden" id="secno" value="<?php echo count($content); ?>">
<script type="text/javascript">
    function addtextfield()
    {
        $('#secno').val(parseInt(1)+parseInt($('#secno').val())) ;
       var count = $("#secno").val();

        var text = '';
        text += '<div class="nmf">';
        text += '   <h4 class="section heading mt-2">Question '+count+'</h4>';
        text +='    <div class="form-group">';
        text +='        <label >Question category</label>';
        text +='        <select class="form-control" name="category" required>';
        text +='                    <option value="">Select Question Category</option>';
        text +='                    <option value="abstract_resoning">Abstract resoning</option>';
        text +='                    <option value="pattern_recognition">Pattern recognition</option>';
        text +='                    <option value="deductive_reasoning">Deductive reasoning</option>';
        text +='                    <option value="numerical_reasoning">Numerical reasoning</option>';
        text +='                    <option value="cognitive_ability">Cognitive ability</option>';
        text +=        '</select>';
        text += '   </div>';
        text += '   <div class="form-group">';
        text += '       <label >Question text and image</label>';
        text += '       <div class="row">';
        text += '       <div class="col-md-6">';
        text += '       <input type="text" name="questiontext" class="form-control" >';
        text += '       <input type="hidden" name="questionid" value="" >';
        text += '       </div>';
        text += '       <div class="col-md-6">';
        text += '       <input type="file" name="questionimage" class="form-control" >';
        text += '       </div>';
        text += '       <div class="col-md-12">';
        text += '            <select class="form-control" name="correctanswer" required>';
        text += '               <option value="">Select Correct Answer</option>';
        text += '               <option value="1">Option 1</option>';
        text += '               <option value="2">Option 2</option>';
        text += '               <option value="3">Option 3</option>';
        text += '               <option value="4">Option 4</option>';
        text += '             </select>';
        text += '       </div>';
        text += '       </div>';
        text += '   </div>';
        text += '<div class="row">';
        text += '   <div class="col-md-6">';
        text += '   <div class="form-group">';
        text += '       <label>Option 1</label>';
        text += '       <input type="text" name="option1text" class="form-control">';
        text += '       <input type="file" name="option1file" class="form-control">';
        text += '   </div>';
        text += '   </div>';
        text += '   <div class="col-md-6">';
        text += '   <div class="form-group">';
        text += '       <label>Option 2</label>';
        text += '       <input type="text" name="option2text" class="form-control">';
        text += '       <input type="file" name="option2file" class="form-control">';
        text += '   </div>';
        text += '   </div>';
        text += '   <div class="col-md-6">';
        text += '   <div class="form-group">';
        text += '       <label>Option 3</label>';
        text += '       <input type="text" name="option3text" class="form-control">';
        text += '       <input type="file" name="option3file" class="form-control">';
        text += '   </div>';
        text += '   </div>';
        text += '   <div class="col-md-6">';
        text += '   <div class="form-group">';
        text += '       <label>Option 4</label>';
        text += '       <input type="text" name="option4text" class="form-control">';
        text += '       <input type="file" name="option4file" class="form-control">';
        text += '   </div>';
        text += '   </div>';
        text += '</div>';

       text += '</div>';

        $('#moresection').append(text);
       
    }

    
</script>
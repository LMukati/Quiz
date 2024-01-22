<?php include("header.php") ; ?>
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
                        <form class="form" action="" method="post" enctype="multipart/form-data">
                            
                            <div class="form-body">
                                
                                <div class="col-md-12"  style="float:left">
                                    <div class="form-group">
                                        <label >Quiz Title</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    

                                    <div class="nmf">
                                    <h4 class="section heading mt-2">Question 1</h4>
                                    <div class="form-group">
                                        <label >Question category</label>
                                        <!--<input type="text" name="category[]" class="form-control" required>-->
                                        <select class="form-control" name="category[]" required>
                                                        <option value="">Select Question Category</option>
                                                        <option value="abstract_resoning">Abstract resoning</option>
                                                        <option value="pattern_recognition">Pattern recognition</option>
                                                        <option value="deductive_reasoning">Deductive reasoning</option>
                                                        <option value="numerical_reasoning">Numerical reasoning</option>
                                                        <option value="cognitive_ability">Cognitive ability</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label >Question text and image</label>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <input type="hidden" name="questionno[]" value="1" >
                                                <input type="text" name="questiontext[]" class="form-control" >
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" name="questionimage[]" class="form-control" >
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-control" name="correctanswer[]" required>
                                                    <option value="">Select Correct Answer</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                    <option value="4">Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Option 1</label>
                                                    <input type="text" name="Q1option1text" class="form-control">
                                                    <input type="file" name="Q1option1file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Option 2</label>
                                                    <input type="text" name="Q1option2text" class="form-control">
                                                    <input type="file" name="Q1option2file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Option 3</label>
                                                    <input type="text" name="Q1option3text" class="form-control">
                                                    <input type="file" name="Q1option3file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Option 4</label>
                                                    <input type="text" name="Q1option4text" class="form-control">
                                                    <input type="file" name="Q1option4file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div id="moresection"></div>

                                </div>

                                <div class="row" >
                                    <div class="col-md-12">
                                        <button type="button" onclick="addtextfield()" class="btn btn-success btn-block btn-lg" style="width:100%">Add New Question</button>
                                    </div>   
                                </div>

                            </div> 


                            <div class="form-actions center mt-2">
                                <button type="submit" name="userSubmit" value="save" class="btn btn-raised btn-primary btn-lg" style="width:100%">
                                    <i class="fa fa-check-square-o"></i> Add Question
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
</div>   

    
        
        
<?php include("footer.php") ; ?> 
    
<input type="hidden" id="secno" value="1">
<script type="text/javascript">
    function addtextfield()
    {
        $('#secno').val(parseInt(1)+parseInt($('#secno').val())) ;
       var count = $("#secno").val();

        var text = '';
        text += '<div class="nmf">';
        text += '   <h4 class="section heading mt-2">Question '+count+'</h4>';
        text +='   <div class="form-group">';
        text +='        <label >Question category</label>';
        text +='        <select class="form-control" name="category[]" required>';
        text +='                    <option value="">Select Question Category</option>';
        text +='                    <option value="abstract_resoning">Abstract resoning</option>';
        text +='                    <option value="pattern_recognition">Pattern recognition</option>';
        text +='                    <option value="deductive_reasoning">Deductive reasoning</option>';
        text +='                    <option value="numerical_reasoning">Numerical reasoning</option>';
        text +='                    <option value="cognitive_ability">Cognitive ability</option>';
        text +=        '</select>';
        text += '       <label >Question text and image</label>';
        text += '       <div class="row">';
        text += '       <div class="col-md-6">';
        text += '       <input type="text" name="questiontext[]" class="form-control" >';
        text += '       <input type="hidden" name="questionno[]" value="'+count+'" >';
        text += '       </div>';
        text += '       <div class="col-md-6">';
        text += '       <input type="file" name="questionimage[]" class="form-control" >';
        text += '       </div>';
        text += '       <div class="col-md-12">';
        text += '            <select class="form-control" name="correctanswer[]" required>';
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
        text += '       <input type="text" name="Q'+count+'option1text" class="form-control">';
        text += '       <input type="file" name="Q'+count+'option1file" class="form-control">';
        text += '   </div>';
        text += '   </div>';
        text += '   <div class="col-md-6">';
        text += '   <div class="form-group">';
        text += '       <label>Option 2</label>';
        text += '       <input type="text" name="Q'+count+'option2text" class="form-control">';
        text += '       <input type="file" name="Q'+count+'option2file" class="form-control">';
        text += '   </div>';
        text += '   </div>';
        text += '   <div class="col-md-6">';
        text += '   <div class="form-group">';
        text += '       <label>Option 3</label>';
        text += '       <input type="text" name="Q'+count+'option3text" class="form-control">';
        text += '       <input type="file" name="Q'+count+'option3file" class="form-control">';
        text += '   </div>';
        text += '   </div>';
        text += '   <div class="col-md-6">';
        text += '   <div class="form-group">';
        text += '       <label>Option 4</label>';
        text += '       <input type="text" name="Q'+count+'option4text" class="form-control">';
        text += '       <input type="file" name="Q'+count+'option4file" class="form-control">';
        text += '   </div>';
        text += '   </div>';
        text += '</div>';

        text += '    <button type="button" class="btn btn-danger btn-block mb-2" onclick="$(this).parent().remove()">Remove</button>';
        text += '</div>';

        $('#moresection').append(text);
    }

    
</script>
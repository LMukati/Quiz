<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
	
function __construct()
{
	parent::__construct();
	$this->load->helper(array('form','url'));
	$this->load->library(array('form_validation', 'email'));
	$this->load->database();
	$this->load->model('administrator/Login_administrator_model','',TRUE);
	$this->load->model('administrator/Home_model');
	//Load session library
  $this->load->library('session');
}

public function index()
{
	$data['view']=$this->Home_model->selectdata("quiz") ; 
	$this->load->view('administrator/quiz',$data);
} 

public function add()
{
  if($this->input->post('userSubmit'))
	{
		$remove = array(' ','-','?','(',')','[',']','/',',');
		$slug= str_replace($remove,'-',$this->input->post('title'));

		$exist = $this->Home_model->wheredetail("quiz","slug",$slug);
		if($exist){ $slug = $slug.'-'.rand(0,99); }
		$slug =  strtolower($slug);

		$blogarr = array("title"=>$this->input->post('title'),
										"slug"=>$slug,
										"created_on"=>date("Y-m-d H:i:s"));

		$quizid = $this->Home_model->insert("quiz",$blogarr);

		foreach($_POST["questionno"] as $key => $qno)
		{
			$contentarr = array("quiz_id"=>$quizid,
			                                        "category" => $_POST["category"][$key]?:'',
													"question_text"=>$_POST["questiontext"][$key]?:'',
													"question_image"=>$this->image('question_image')?:'',
													"option1text"=>$_POST["Q".$qno."option1text"]?:'',
													"option1image"=>$this->image("Q".$qno."option1file")?:'',
													"option2text"=>$_POST["Q".$qno."option2text"]?:'',
													"option2image"=>$this->image("Q".$qno."option2file")?:'',
													"option3text"=>$_POST["Q".$qno."option3text"]?:'',
													"option3image"=>$this->image("Q".$qno."option3file")?:'',
													"option4text"=>$_POST["Q".$qno."option4text"]?:'',
													"option4image"=>$this->image("Q".$qno."option4file")?:'',
													"correct_answer"=>$_POST['correctanswer'][$key]);

			$this->Home_model->insert("quiz_questions",$contentarr);
			$this->session->set_flashdata("successmessage","Quiz added successfully");
			//redirect(base_url('blogadd'));
				
		}	
	} 
	$data["page"]= "add Quiz";
  $this->load->view('administrator/quiz_add',$data);
} 



public function edit($id='')
{
	  if($this->input->post('userSubmit'))
		{
				$remove = array(' ','-','?','(',')','[',']','/',',');
				$slug= str_replace($remove,'-',$this->input->post('title'));

				$exist = $this->Home_model->wheredetail("quiz","slug",$slug);
				if($exist){ if($exist->id != $id){ $slug = $slug.'-'.rand(0,99); } }
				$slug =  strtolower($slug);

				$blogarr = array("title"=>$this->input->post('title'),
												 "slug"=>$slug,
												);

				$quizid = $this->Home_model->update("quiz",$id,$blogarr);
    }  
        $quizid = $id ; 

			

				if($this->input->post("delete"))
				{
					 $qid = $this->input->post('questionid') ;
					 $this->Home_model->delete("quiz_questions","id",$qid);
					 $this->session->set_flashdata("successmessage","Question deleted successfully");
					 redirect(base_url('administrator/Quiz/edit/'.$id));
				}
				
				if($this->input->post("update"))
				{
						$qid = $this->input->post('questionid') ;            
						$contentarr = array("quiz_id"=>$quizid,
						                                        "category" => $_POST["category"]?:'',
																"question_text"=>$_POST["questiontext"]?:'',
																"question_image"=>$this->updimage('questionimage')?:'',
																"option1text"=>$_POST["option1text"]?:'',
																"option1image"=>$this->updimage("option1file")?:'',
																"option2text"=>$_POST["option2text"]?:'',
																"option2image"=>$this->updimage("option2file")?:'',
																"option3text"=>$_POST["option3text"]?:'',
																"option3image"=>$this->updimage("option3file")?:'',
																"option4text"=>$_POST["option4text"]?:'',
																"option4image"=>$this->updimage("option4file")?:'',
																"correct_answer"=>$_POST["correctanswer"]?:'');
					  $this->Home_model->update("quiz_questions",$qid,$contentarr);
						
						$this->session->set_flashdata("successmessage","Question updated successfully");
						redirect(base_url('administrator/Quiz/edit/'.$id));
				}

				if($this->input->post("insert"))
				{
						
            $contentarr = array("quiz_id"=>$quizid,
																"category" => $_POST["category"]?:'',
																"question_text"=>$_POST["questiontext"]?:'',
																"question_image"=>$this->image('questionimage')?:'',
																"option1text"=>$_POST["option1text"]?:'',
																"option1image"=>$this->image("option1file")?:'',
																"option2text"=>$_POST["option2text"]?:'',
																"option2image"=>$this->image("option2file")?:'',
																"option3text"=>$_POST["option3text"]?:'',
																"option3image"=>$this->image("option3file")?:'',
																"option4text"=>$_POST["option4text"]?:'',
																"option4image"=>$this->image("option4file")?:'',
																"correct_answer"=>$_POST["correctanswer"]?:'');
					  $this->Home_model->insert("quiz_questions",$contentarr);

					  $this->session->set_flashdata("successmessage","Question Added successfully");
						redirect(base_url('administrator/Quiz/edit/'.$id));
						
				}
				
		
		$data["page"]= "edit quiz";
		$data["view"]= $this->Home_model->detail("quiz",$id);
		$data["content"]= $this->Home_model->wheredata("quiz_questions","quiz_id",$id);
	  $this->load->view('administrator/quiz_edit',$data);
} 



public function delete($id="")
{
	  if($id)
		{
				$this->Home_model->delete("quiz","id",$id);
				$this->Home_model->delete("quiz_questions","quiz_id",$id);
				?><script> window.location.assign('<?php echo base_url("quizarea") ?>') </script><?php 
		} 
		else
		{
			redirect(base_url('quizarea'));
		}	
} 



public function image($key)
{
		if(!empty($_FILES[$key]['name']))
		{

			$tmp=$_FILES[$key]["tmp_name"];
      $extension = explode("/", $_FILES[$key]["type"]);
      $name = "quiz_".time().rand(0,99999) ;
      move_uploaded_file($tmp, "upload/quiz/" . $name.".".$extension[1]);
      return "upload/quiz/".$name.".".$extension[1] ;
/*exit;
			$_FILES['file']['name'] = $_FILES[$key]['name'];
			$_FILES['file']['tmp_name'] = $_FILES[$key]['tmp_name'] ;
			$_FILES['file']['size'] = $_FILES[$key]['size'] ;
			$config['upload_path'] = 'upload/quiz/';
			$config['allowed_types'] = 'png|gif|jpg|jpeg|webp';
			$config['mime_in'] = 'png|gif|jpg|jpeg|webp';
		 	$config['file_name'] = $_FILES['file']['name'];
			
			
			$photo=explode('.',$_FILES['file']['name']); 
			$ext = strtolower($photo[count($photo)-1]); 
			if(!empty($_FILES['file']['name']))
				{ 
					$curr_time = time(); 
					$filename= "quiz_".time().".".$ext; 
				} 
			$config['file_name'] = $filename; 
			
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('file'))
			{
				$uploadData = $this->upload->data();
			  return $deal2image = "upload/quiz/".$uploadData['file_name'];
			}else{
			  return $deal2image = '';
			}
			*/
		}else{
			return $deal2image = '' ;
		}
					 
}


public function updimage($key)
{
		if(!empty($_FILES[$key]['name']))
		{
			$tmp=$_FILES[$key]["tmp_name"];
      $extension = explode("/", $_FILES[$key]["type"]);
      $name = "quiz_".time().rand(0,99999) ;
      move_uploaded_file($tmp, "upload/quiz/" . $name.".".$extension[1]);
      return "upload/quiz/".$name.".".$extension[1] ;
		}else{
		     //echo "false111";exit;
			return $deal2image = $this->input->post($key.'old')?:'' ;
		} 
}


					 
} 
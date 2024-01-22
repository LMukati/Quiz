<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
	
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
	$data['content']=$this->Home_model->selectdata("content") ; 
	$this->load->view('administrator/content',$data);
	if($this->input->post('userSubmit'))
		{
			$userarr = array("from"=>$this->input->post("from"),
												"to"=>$this->input->post("to"),
												"result_data"=>$this->input->post("include")?:'');
				$this->Home_model->update("content",$this->input->post('id'),$userarr);
				$this->session->set_flashdata("successmessage","content Updated successfully");
				 redirect('administrator/content', 'refresh');
		}
} 

public function add()
{
  if($this->input->post('userSubmit'))
	{
		$userarr = array("from"=>$this->input->post("from"),
												"to"=>$this->input->post("to"),
												"result_data"=>$this->input->post("include")?:'');
		$this->session->set_flashdata("successmessage","content inserted successfully");

		$quizid = $this->Home_model->insert("content",$userarr);
        $data['content']=$this->Home_model->selectdata("content") ; 
        //$this->load->view('administrator/content',$data);
        redirect('administrator/content', 'refresh');
	
	} 
	$data["page"]= "add Content";
 // $this->load->view('administrator/quiz_add',$data);
  $this->load->view('administrator/content_add',$data);
} 



public function delete($id="")
{
	  if($id)
		{
				$this->Home_model->delete("content","id",$id);
				
				?><script> window.location.assign('<?php echo base_url("administrator/content", 'refresh') ?>') </script><?php 
		} 
		else
		{
			redirect(base_url('quizarea'));
		}	
} 






					 
} 
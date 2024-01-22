<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans2 extends CI_Controller {
	
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
		if($this->input->post('userSubmit'))
		{
				$userarr = array("name"=>$this->input->post("name"),
												"price"=>$this->input->post("price"),
												"include"=>$this->input->post("include")?:'');
				$this->Home_model->update("plans2",$this->input->post('plan_id'),$userarr);
				$this->session->set_flashdata("successmessage","Plan Updated successfully");
		}

	  $data['content']=$this->Home_model->selectdata("plans2") ; 
	  $this->load->view('administrator/plans2',$data);
} 
} 
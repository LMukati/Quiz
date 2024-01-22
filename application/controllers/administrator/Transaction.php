<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
        function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form','url'));
    $this->load->library(array('form_validation', 'email'));
    $this->load->database();
    $this->load->model('administrator/Home_model','',TRUE);
    $this->load->library('session');
  }
  
public function index()
  {
	$data['view']=$this->Home_model->selectdata("transaction");
	$this->load->view('administrator/transaction',$data);
  }
  
  
}


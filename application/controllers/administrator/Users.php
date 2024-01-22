<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
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
	$data['view']=$this->Home_model->wheredata("user_result",'status',1);
	$this->load->view('administrator/users',$data);
  }
 

    
  
public function view($id)
  {
	$data['view']=$this->Home_model->detail("users",$id); 
	$data['myrequest']=$this->Home_model->wheredata("requests","user_id",$id); 
	$this->load->view('administrator/users_detail',$data);
  }
  
public function comment()
  {
	  
	$data['view'] = $this->Home_model->selectdata("comment"); 
    $this->load->view('administrator/comment',$data);
  }  
  
  
  
  
public function add(){
        if($this->input->post('userSubmit')){
			
			$today = date('Y-m-d h:i:s') ;
            if(!empty($_FILES['image']['name']))
					{
						$_FILES['file']['name'] = $_FILES['image']['name'];
						$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'] ;
						$_FILES['file']['size'] = $_FILES['image']['size'] ;
						$config['upload_path'] = 'upload/birds/';
						$config['allowed_types'] = 'png|gif|jpg|jpeg';
					 	$config['file_name'] = $_FILES['file']['name'];
						
						
						$photo=explode('.',$_FILES['image']['name']); 
						$ext = strtolower($photo[count($photo)-1]); 
						if (!empty($_FILES['image']['name'])) { 
						
							$curr_time = time(); 
							$filename= $this->input->post('name')."_image_".time().".".$ext; 
							} 
						 $config['file_name'] = $filename; 
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
							if($this->upload->do_upload('image'))
							{
								$uploadData = $this->upload->data();
								 $deal1image = "upload/birds/".$uploadData['file_name'];
							}else{
								$deal1image = '';
							}
					}else{
						$deal1image = '' ;
					}
			 
			$userData = array(
                'name' => $this->input->post('name'),
				'muturity' => $this->input->post('muturity'),
				'gender' => $this->input->post('gender'),
				'location' => $this->input->post('location')?: '',
				'lat' => $this->input->post('lat')?: '',
				'lon' => $this->input->post('lon')?: '',
				'image' => $deal1image,
				'created_on'=>$today
			 );
            
			
			
            //Pass user data to model
			$this->load->model('Home_model');
            $insertUserData = $this->Home_model->insert("birds",$userData);
            
            //Storing insertion status message.
           if($insertUserData)
		   {
                $this->session->set_flashdata('message', 'birds have been added successfully*');
				redirect('administrator/birds/add') ;
            }else{
                $this->session->set_flashdata('message', 'Some problems occured, please try again.');
            }
        }
        //Form for adding user data
		$data["records"] = '' ;
		$data["users"] = $this->Home_model->selectdata("users") ;
        $this->load->view('administrator/birds_edit',$data);
    }
	
	
	
	//update row data
public function edit($id){
	    
	   
        if($this->input->post('userSubmit')){
			  
			   if(!empty($_FILES['document']['name']))
					{
						$_FILES['file']['name'] = $_FILES['document']['name'];
						$_FILES['file']['tmp_name'] = $_FILES['document']['tmp_name'] ;
						$_FILES['file']['size'] = $_FILES['document']['size'] ;
						$config['upload_path'] = 'upload/birds/';
						$config['allowed_types'] = 'png|gif|jpg|jpeg|doc|txt|docx|pdf|csv';
					 	$config['file_name'] = $_FILES['file']['name'];
						
						
						$photo=explode('.',$_FILES['document']['name']); 
						$ext = strtolower($photo[count($photo)-1]); 
						if (!empty($_FILES['document']['name'])) { 
						
							$curr_time = time(); 
							$filename= $this->input->post('name')."_document_".time().".".$ext; 
							} 
						 $config['file_name'] = $filename; 
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
							if($this->upload->do_upload('document'))
							{
								$uploadData = $this->upload->data();
								 $deal1doc = "upload/birds/".$uploadData['file_name'];
							}else{
								$deal1doc = '';
							}
					}else{
						$deal1doc = $this->input->post('olddoc') ;
					}
			 
			 if(!empty($_FILES['image']['name']))
					{
						$_FILES['file']['name'] = $_FILES['image']['name'];
						$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'] ;
						$_FILES['file']['size'] = $_FILES['image']['size'] ;
						$config['upload_path'] = 'upload/user/';
						$config['allowed_types'] = 'png|gif|jpg|jpeg';
					 	$config['file_name'] = $_FILES['file']['name'];
						
						
						$photo=explode('.',$_FILES['image']['name']); 
						$ext = strtolower($photo[count($photo)-1]); 
						if (!empty($_FILES['image']['name'])) { 
						
							$curr_time = time(); 
							$filename= $this->input->post('name')."_image_".time().".".$ext; 
							} 
						 $config['file_name'] = $filename; 
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
							if($this->upload->do_upload('image'))
							{
								$uploadData = $this->upload->data();
								 $deal1image = "upload/user/".$uploadData['file_name'];
							}else{
								$deal1image = '';
							}
					}else{
						$deal1image = $this->input->post('oldimage') ;
					}
			 
			$userData = array(
               'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'due_date' => $this->input->post('due_date'),
				'assign_user' => $this->input->post('assign_user')?: '',
				'document' => $deal1doc,
				'image' => $deal1image,
			 );
            
			
			
            //Pass user data to model
			 $insertUserData = $this->Home_model->update("birds",$id,$userData);
            
			;
            //Storing insertion status message.
            if($insertUserData){
				$this->session->set_flashdata('success_msg', 'User have been updated successfully*');
				//redirect(base_url().'administrator/User/edit/'.$id."/789") ;
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        //Form for adding user data
		$data["users"] = $this->Home_model->selectdata("users") ;
		$data["records"] = $this->Home_model->detail("birds",$id) ;
        $this->load->view('administrator/birds_edit',$data);
    }	
	

 public function delete($id){
	 $this->Home_model->delete("birds","id",$id);
	 $this->Home_model->delete("comment","birds_id",$id);
	 redirect('administrator/birds') ;
 }	
 
 public function desable($id){
     $arr = array('disabled'=>1);
     $this->Home_model->update("users",$id,$arr);
     redirect('administrator/Users') ;
 } 
	
}


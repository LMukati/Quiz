<?php
class Login_model extends CI_Model{

  public function login_user($email){
    
	    $this->load->database();
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$query=$this->db->get();
		return $query->row();				   
		  
      }
	  
  public function user_data($email,$password){
    
	    $this->load->database();
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query=$this->db->get();
		return $query->row();
	 }
	 
   	 public function user_($id){
    
	    $this->load->database();
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row();
	 }
	 
	  public function user_up($data,$id){
    
	    $this->db->where('id',$id);
		$this->db->update("users",$data) ;
		return true ;
	 }	 

	
}
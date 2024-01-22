<?php
class Login_administrator_model extends CI_Model{

  public function login_user($email,$password){
    
	    $this->load->database();
		$this->db->select('*');
		$this->db->from('admin_user');
		$where = '(username ="'.$email.'" or email = "'.$email.'")' ;
        $this->db->where($where);
		$this->db->where('password',$password);
		$query=$this->db->get();
		return $query->result();				   
					   
					   
					   
    if($result->num_rows() == 1)  {
      return $result->row(0)->ID;
    }else{
      return false;
    }   
      }
    
	 public function user_data($email,$password){
    
	    $this->load->database();
		$this->db->select('*');
		$this->db->from('admin_user');
		$where = '(username ="'.$email.'" or email = "'.$email.'")' ;
        $this->db->where($where);
		$this->db->where('password',$password);
		$query=$this->db->get();
		return $query->row();
	 }
	 
	 public function user_(){
    
	    $this->load->database();
		$this->db->select('*');
		$this->db->from('admin_user');
		$this->db->where('id',1);
		$query=$this->db->get();
		return $query->row();
	 }
	 
	  public function user_up($data){
    
	    $this->db->where('id',1);
		$this->db->update("admin_user",$data) ;
		return true ;
	 }
	
}
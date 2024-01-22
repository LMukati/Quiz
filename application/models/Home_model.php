 <?php 
class Home_model extends CI_Model
{
 public function selectdata($tablename)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	$this->db->order_by('id','DESC');
  	$query=$this->db->get();
  	return $query->result();
  }


  public function selectlimitdata($tablename,$limit)
  {
    $this->load->database();
    $this->db->select('*');
    $this->db->limit($limit); 
    $this->db->from($tablename);
  $this->db->order_by('id','DESC');
    $query=$this->db->get();
    return $query->result();
  } 
 
 
 public function fetch_data($tablename,$limit, $id) {
	      $this->load->database();
        $star = $tablename.'.*' ;
	      $this->db->select($star);
		    $this->db->limit($limit,$id); 
        $this->db->from($tablename);
        $this->db->order_by($tablename.'.id','DESC');
		    $query = $this->db->get();

      	if ($query->num_rows() > 0) {
      	     return $query->result() ;
      	}
      	else
      	{
               return false;
      	}
}


 public function fetch_auction_data($tablename,$limit, $id) {
      $this->load->database();
      $star = $tablename.'.*' ;
        $this->db->select($star);
      $this->db->limit($limit,$id); 
      $this->db->from($tablename);
      $this->db->join('users', 'users.id = '.$tablename.'.user_id');
      $where = $tablename.".end_time > '".date('Y-m-d H:i:s')."'AND users.status = 1" ;
      $this->db->where($where) ;
      $query = $this->db->get();
  if ($query->num_rows() > 0) {
       return $query->result() ;
  }
  else
  {
         return false;
  }
}
  
  
   public function wheredata($tablename,$where,$id)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	$this->db->where($where,$id);
	$this->db->order_by('id','DESC');
  	$query=$this->db->get();
  	return $query->result();
  }
  
  
  
   public function detail($tablename,$id)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	$this->db->where('id',$id);
  	$query=$this->db->get();
  	return $query->row();
  }
  
  public function wheredetail($tablename,$where,$id)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	//$where = "'".$where."' = ".$id ;
	$this->db->where($where,$id);
  	$query=$this->db->get();
  	return $query->row();
  }
  
  
  public function insert($tablename,$data)
       {
        
        $insert = $this->db->insert($tablename,$data);
        if($insert)
		{
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }  
	
//update query
  public function update($tablename,$id,$data)
  {
    $this->db->where('id',$id);
    $this->db->update($tablename,$data);
  }	
  
  public function updatewhere($tablename,$where,$id,$data)
  {
    $this->db->where($where,$id);
    $this->db->update($tablename,$data);
  }	
  
  
    public function delete($tablename,$where,$services_id) 
      { 
         if ($this->db->delete($tablename, $where."= ".$services_id)) 
		 { 
            return true; 
         } 
      }
	  
  
  
}


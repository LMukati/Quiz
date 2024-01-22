 <?php 
class Home_model extends CI_Model
{
 public function selectdata($tablename)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	$this->db->order_by('id','desc');
  	$query=$this->db->get();
  	return $query->result();
  }
  
    public function wheredata($tablename,$where,$id)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	//$where = "'".$where."' = ".$id ;
	$this->db->where($where,$id);
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


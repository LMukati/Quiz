<?php
class Login extends CI_Controller{

      function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form','url'));
    $this->load->library(array('form_validation', 'email'));
    $this->load->database();
    $this->load->model('administrator/Login_administrator_model','',TRUE);
     //Load session library
   $this->load->library('session');
    
  }


	public function index()
	  {
		$data["name"] = $this->db->get('admin_user')->row()->username ; 
		$data["logo"] = $this->db->get('admin_user')->row()->admin_logo ;  
		$data["favicon"] = $this->db->get('admin_user')->row()->favicon ;  
	    $this->load->view('administrator/login',$data);  
	  }


	public function log() {
	        
	    $email = $this->input->post('email');
	    $password = $this->input->post('password');
	    $password = $password ;
		            $user_id = $this->Login_administrator_model->login_user($email,$password);
	            	$user_d = $this->Login_administrator_model->user_data($email,$password);
		
	    if($user_id){
	                    //create array of data
	            $user_data =array(
	                    'user_id'=>$user_d->id,
	                    'username'=>$user_d->username,
					    'email'=>$user_d->email,
						'logo'=>$user_d->admin_logo,
	                    'logged_in'=> TRUE
	                   );
	           //ser session userdata
	           $logged_in = $this->session->set_userdata('administrator_user',$user_data);
	           ?>
	           <script>  location.assign('<?php echo base_url("adminhome") ; ?>') ; </script>
	           <?php
	    }else{
	                    //set error
	            $this->session->set_flashdata('login_failed','Invalid Username or Password');
	            ?>
	           <script>  location.assign('<?php echo base_url("adminlogin") ; ?>') ; </script>
	           <?php
	    }
	       
	}

    public function logout() {
            $this->session->sess_destroy();
            ?>
           <script>  location.assign('<?php echo base_url("adminlogin") ; ?>') ; </script>
           <?php
    }
}


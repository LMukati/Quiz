<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
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
	  $data["user"] = $this->Home_model->wheredata("user_result",'status',1) ;
	  $data["quiz"] =  $this->Home_model->selectdata("quiz") ;
	  $data['view']= '' ;
	  $this->load->view('administrator/home',$data);
 }

public function role()
  {
	     if($this->input->post('userSubmit') == "save")
		{
			 if($this->Home_model->wheredetail("user_role","user_role",$this->input->post('user_role')))
			 {
				$this->session->set_flashdata("message","User Role already exist") ;
			 }
			 else
			 {
			   $cdata = array("user_role"=>$this->input->post('user_role'));
			   $this->Home_model->insert("user_role",$cdata) ;
			 }
		} 
		 if($this->input->post('userSubmit') == "Update")
		{
		   $cdata = array("user_role"=>$this->input->post('user_role'));
		   $this->Home_model->update("user_role",$this->input->post('id'),$cdata) ;
		}
		
	    $this->load->model('administrator/Home_model');
	    $data['view']=$this->Home_model->selectdata("user_role") ;
	    $this->load->view('administrator/user_role',$data);
 }
  
  
public function profile()
{
	  $this->load->model('administrator/Login_administrator_model') ;
	  $administratorc = $this->Login_administrator_model->user_() ;
	  if($this->input->post('userSubmit'))
	  {
        if(!empty($_FILES['image']['name']))
					{
						$_FILES['file']['name'] = $_FILES['image']['name'];
						$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'] ;
						$_FILES['file']['size'] = $_FILES['image']['size'] ;
						$config['upload_path'] = 'upload/logo/';
						$config['allowed_types'] = 'png|gif|jpg|jpeg|svg';
					 	$config['file_name'] = $_FILES['file']['name'];
						
						
						$photo=explode('.',$_FILES['image']['name']); 
						$ext = strtolower($photo[count($photo)-1]); 
						if (!empty($_FILES['image']['name'])) { 
						
							$curr_time = time(); 
							$filename= $this->input->post('username')."_logo_".time().".".$ext; 
							} 
						 $config['file_name'] = $filename; 
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
							if($this->upload->do_upload('image'))
							{
								$uploadData = $this->upload->data();
								 $deal1image = "upload/logo/".$uploadData['file_name'];
							}else{
								$deal1image = '';
							}
					}else{
						$deal1image = $this->input->post('old_image') ;
					}



					if(!empty($_FILES['favicon']['name']))
					{
						$_FILES['file']['name'] = $_FILES['favicon']['name'];
						$_FILES['file']['tmp_name'] = $_FILES['favicon']['tmp_name'] ;
						$_FILES['file']['size'] = $_FILES['favicon']['size'] ;
						$config['upload_path'] = 'upload/logo/';
						$config['allowed_types'] = 'png|gif|jpg|jpeg|svg|webp';
					 	$config['file_name'] = $_FILES['file']['name'];
						
						
						$photo=explode('.',$_FILES['favicon']['name']); 
						$ext = strtolower($photo[count($photo)-1]); 
						if (!empty($_FILES['favicon']['name'])) { 
						
							$curr_time = time(); 
							$filename= $this->input->post('username')."_favicon_".time().".".$ext; 
							} 
						 $config['file_name'] = $filename; 
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
							if($this->upload->do_upload('favicon'))
							{
								$uploadData = $this->upload->data();
								 $faviconimage = "upload/logo/".$uploadData['file_name'];
							}else{
								$faviconimage = '';
							}
					}else{
						$faviconimage = $this->input->post('old_favicon') ;
					}	




					if(!empty($_FILES['footer_logo']['name']))
					{
						$_FILES['file']['name'] = $_FILES['footer_logo']['name'];
						$_FILES['file']['tmp_name'] = $_FILES['footer_logo']['tmp_name'] ;
						$_FILES['file']['size'] = $_FILES['footer_logo']['size'] ;
						$config['upload_path'] = 'upload/logo/';
						$config['allowed_types'] = 'png|gif|jpg|jpeg|svg|webp';
					 	$config['file_name'] = $_FILES['file']['name'];
						
						
						$photo=explode('.',$_FILES['footer_logo']['name']); 
						$ext = strtolower($photo[count($photo)-1]); 
						if (!empty($_FILES['footer_logo']['name'])) { 
						
							$curr_time = time(); 
							$filename= $this->input->post('username')."_footer_logo_".time().".".$ext; 
							} 
						 $config['file_name'] = $filename; 
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
							if($this->upload->do_upload('footer_logo'))
							{
								$uploadData = $this->upload->data();
								 $footerlogoimage = "upload/logo/".$uploadData['file_name'];
							}else{
								$footerlogoimage = '';
							}
					}else{
						$footerlogoimage = $this->input->post('old_footer_logo') ;
					}	


					 
		 if($this->input->post('old_password'))
		{ 
		     if($this->input->post('old_password') == $administratorc->password)
			 {
			 $user_ar = array('username' => $this->input->post('username'),
							 'email' => $this->input->post('email'),
							 'web_email' => $this->input->post('web_email'),
							 'admin_logo' => $deal1image,
							 'favicon'=>$faviconimage,
							 'footer_logo'=>$footerlogoimage,
							 'stripe_pk'=>$this->input->post('stripe_pk'),
							 'stripe_sk'=>$this->input->post('stripe_sk'),
							 'password' => $this->input->post('password')
							 );
							 
				  $this->Login_administrator_model->user_up($user_ar) ;	
				  $this->session->set_flashdata("successmessage","Data Updated") ;
				  
			 }
			 else
			 {
		       $this->session->set_flashdata("message","Old password is wrong") ;
			 }
		}
		else
		{
		 $user_ar = array('username' => $this->input->post('username'),
						 'email' => $this->input->post('email'),
						 'web_email' => $this->input->post('web_email'),
						 'admin_logo' => $deal1image,
						 'favicon'=>$faviconimage,
							'footer_logo'=>$footerlogoimage,
							'stripe_pk'=>$this->input->post('stripe_pk'),
							 'stripe_sk'=>$this->input->post('stripe_sk'),
						  ) ;
        	 $this->Login_administrator_model->user_up($user_ar) ;
			 $this->session->set_flashdata("successmessage","Data Updated") ;	
			 
		}
	  }
	  $data["page"] = "profile" ;
	  $data["view"] = $this->Login_administrator_model->user_() ;
      $this->load->view('administrator/profile_setting',$data) ;
  }
  

public function homepage()
{
	  if($this->input->post('userSubmit'))
	  {
        if(!empty($_FILES['image']['name']))
					{
						$_FILES['file']['name'] = $_FILES['image']['name'];
						$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'] ;
						$_FILES['file']['size'] = $_FILES['image']['size'] ;
						$config['upload_path'] = 'upload/img/';
						$config['allowed_types'] = 'png|gif|jpg|jpeg|webp';
					 	$config['file_name'] = $_FILES['file']['name'];
						
						
						$photo=explode('.',$_FILES['image']['name']); 
						$ext = strtolower($photo[count($photo)-1]); 
						if (!empty($_FILES['image']['name'])) { 
						
							$curr_time = time(); 
							$filename= "homebanner_".time().".".$ext; 
							} 
						 $config['file_name'] = $filename; 
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
							if($this->upload->do_upload('image'))
							{
								$uploadData = $this->upload->data();
								 $deal1image = "upload/img/".$uploadData['file_name'];
							}else{
								$deal1image = '';
							}
					}else{
						$deal1image = $this->input->post('home_banner') ;
					}

					if(!empty($_FILES['mobileimage']['name']))
					{
						$_FILES['file']['name'] = $_FILES['mobileimage']['name'];
						$_FILES['file']['tmp_name'] = $_FILES['mobileimage']['tmp_name'] ;
						$_FILES['file']['size'] = $_FILES['mobileimage']['size'] ;
						$config['upload_path'] = 'upload/img/';
						$config['allowed_types'] = 'png|gif|jpg|jpeg|webp';
						$config['mime_in'] = 'png|gif|jpg|jpeg|webp';
					 	$config['file_name'] = $_FILES['file']['name'];
						
						
						$photo=explode('.',$_FILES['mobileimage']['name']); 
						$ext = strtolower($photo[count($photo)-1]); 
						if (!empty($_FILES['mobileimage']['name'])) { 
						
							$curr_time = time(); 
							$filename= "homebanner_".time().".".$ext; 
							} 
						 $config['file_name'] = $filename; 
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
							if($this->upload->do_upload('mobileimage'))
							{
								$uploadData = $this->upload->data();
								 $deal2image = "upload/img/".$uploadData['file_name'];
							}else{
								$deal2image = '';
							}
					}else{
						$deal2image = $this->input->post('mobile_banner') ;
					}
					 
			 
			 	$user_ar = array('home_banner' => $deal1image,
												 'home_banner_mobile' => $deal2image,
												 'banner_heading'=>$this->input->post('banner_heading'),
												 'banner_text'=> $this->input->post('banner_text')
												) ;
			 	
	      $this->Home_model->update("homepage",1,$user_ar) ;
				$this->session->set_flashdata("success","Data Updated") ;					  
			
	  }
	  $data["page"] = "profile" ;
	  $data["view"] = $this->Home_model->detail("homepage",1) ;
    $this->load->view('administrator/homepage',$data) ;
}




public function aboutus()
  {
	     if($this->input->post('userSubmit') == "save")
		{
			    $cdata = array("about_eng"=>$this->input->post('about_eng'),"about_frn"=>$this->input->post('about_frn'));
			    $this->Home_model->update("about",1,$cdata) ;
			    $this->session->set_flashdata("successmessage","About updated..!") ;	
			
		} 
		 
		$this->load->model('administrator/Home_model');
	    $data['view']=$this->Home_model->detail("about",1) ;
	    $this->load->view('administrator/about',$data);
 } 


 
public function footer_info()
  {
	     if($this->input->post('userSubmit') == "save")
		{
			    $cdata = array("address"=>$this->input->post('address'),
				               "email"=>$this->input->post('email'),
							   "contact"=>$this->input->post('contact'),
							   "facebook"=>$this->input->post('facebook'),
							   "twitter"=>$this->input->post('twitter'),
							   "instagram"=>$this->input->post('instagram'),
							   "linkedin"=>$this->input->post('linkedin'),
							   );
			    $this->Home_model->update("footer_info",1,$cdata) ;
			    $this->session->set_flashdata("successmessage","Footer Info updated..!") ;	
			
		} 
		 
		$this->load->model('administrator/Home_model');
	    $data['view']=$this->Home_model->detail("footerinfo",1) ;
	    $this->load->view('administrator/footerinfo',$data);
 }  


public function newslatter()
{
 	    $data['view']=$this->Home_model->selectdata("newslatter") ;
	    $this->load->view('administrator/newslatter',$data);
}


 public function contact_request()
 {
 	     $data['view']=$this->Home_model->selectdata("contact_request") ;
	    $this->load->view('administrator/contact_request',$data);
 }

public function enquiry()
 {
 	    $data['view']=$this->Home_model->selectdata("enquiry") ;
	    $this->load->view('administrator/enquiry',$data);
 }
 

public function calculation_report()
 {
 	    $data['view']=$this->Home_model->selectdata("calculation") ;
	    $this->load->view('administrator/calculation_report',$data);
 } 


public function brochure_report()
 {
 	    $data['view']=$this->Home_model->selectdata("brochure_download") ;
	    $this->load->view('administrator/brochure_report',$data);
 } 

public function faq()
{
		if($this->input->post('userSubmit'))
		{
			foreach($this->input->post("title") as $titlekey => $title)
			{
				$arr = array("title"=>$title,"description"=>$_POST['description'][$titlekey])	;
				if($_POST["id"][$titlekey] > "")
				{	
					$this->Home_model->update("faq",$_POST["id"][$titlekey],$arr);
				}
				else{
					$this->Home_model->insert("faq",$arr);
				}	
			}
		}
		$data['userf']=$this->db->get("faq")->result() ;
	  $this->load->view('administrator/faq',$data);
}

public function faq_delete($key = "")
{
	if($key)
	{	
		$this->Home_model->delete("faq","id",$key);
		?><script> window.location.assign('<?php echo base_url('admin_gallery') ?>'); </script><?php 
	}
}


public function gallery()
{
	if($this->input->post('userSubmit'))
	{
		foreach($this->input->post("title") as $titlekey => $title)
		{
			$arr = array("title"=>$title,"banner"=>$this->gallery_upload($titlekey))	;
			if($_POST["id"][$titlekey] > "")
			{	
				$this->Home_model->update("gallery",$_POST["id"][$titlekey],$arr);
			}
			else{
				$this->Home_model->insert("gallery",$arr);
			}	
		}
	}	
	$data['view']=$this->Home_model->selectdata("gallery") ;
  $this->load->view('administrator/gallery',$data);
}

public function gallery_upload($key)
{
		if(!empty($_FILES['featured_image']['name'][$key]))
					{
						$_FILES['file']['name'] = $_FILES['featured_image']['name'][$key];
						$_FILES['file']['tmp_name'] = $_FILES['featured_image']['tmp_name'][$key] ;
						$_FILES['file']['size'] = $_FILES['featured_image']['size'][$key] ;
						$config['upload_path'] = 'upload/gallery/';
						$config['allowed_types'] = 'png|gif|jpg|jpeg|webp';
					 	$config['file_name'] = $_FILES['file']['name'][$key];
						
						
						$photo=explode('.',$_FILES['featured_image']['name'][$key]); 
						$ext = strtolower($photo[count($photo)-1]); 
						if (!empty($_FILES['featured_image']['name'][$key])) { 
						
							$curr_time = time(); 
							$filename= "homebanner_".time().".".$ext; 
							} 
						 $config['file_name'] = $filename; 
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
							if($this->upload->do_upload('file'))
							{
								$uploadData = $this->upload->data();
							return	 $deal1image = "upload/gallery/".$uploadData['file_name'];
							}else{
							return	$deal1image = '';
							}
					}else{
					return	$deal1image = $_POST["old_featured_image"][$key] ;
					}

}

public function terms(){
     
     if($this->input->post('userSubmit')){
       $termdata = $this->Home_model->get_single_row('terms',array());     
       if(empty($termdata)){
         $arr = array('terms'=>$this->input->post('terms'));
         $insert = $this->Home_model->insert('terms',$arr);
         $this->session->set_flashdata("successmessage","Terms & conditions inserted..!") ;
       }else{
         $arr = array('terms'=>$this->input->post('terms'));
         $update = $this->Home_model->update('terms',1,$arr);
         $this->session->set_flashdata("successmessage","Terms & conditions updated..!") ;  
           
       }
       redirect('administrator/Home/terms');
       
    }
    $data["view"] = $this->Home_model->detail('terms',1);
   
    $this->load->view('administrator/terms',$data);
  }




   public function privacy(){
     
     if($this->input->post('userSubmit')){
       $termdata = $this->Home_model->get_single_row('privacy',array());     
       if(empty($termdata)){
         $arr = array('privacy'=>$this->input->post('privacy'));
         $insert = $this->Home_model->insert('privacy',$arr);
         $this->session->set_flashdata("successmessage","Privacy inserted..!") ;
       }else{
         $arr = array('privacy'=>$this->input->post('privacy'));
         $update = $this->Home_model->update('privacy',1,$arr);
         $this->session->set_flashdata("successmessage","Privacy updated..!") ;  
           
       }
       redirect('administrator/Home/privacy');
       
    }
    $data["view"] = $this->Home_model->detail('privacy',1);
   
    $this->load->view('administrator/privacy',$data);
  }



  public function general_setting()
  {  
         if($this->input->get('id'))
         {
              $data['edit']=$this->Home_model->detail("page_seo",$this->input->get('id')) ; 
         }
         else
         {
              $data['edit']= '';
         }
	     if($this->input->post('userSubmit'))
		{
			    $cdata = array("info"=>$this->input->post('info'),
			    							"powered_by"=>$this->input->post('powered_by'),
			                   "copyright"=>$this->input->post('copyright'),
			                   "contact_phone"=>$this->input->post('contact_phone'),
			                   "contact_email"=>$this->input->post('contact_email'),
			                   "contact_address"=>$this->input->post('contact_address'),
			                   "facebook"=>$this->input->post('facebook'),
			                   "google"=>$this->input->post('google'),
			                   "twitter"=>$this->input->post('twitter'),
			                   "instagram"=>$this->input->post('instagram'),
			                   "linkedin"=>$this->input->post('linkedin'),
			                   );
			    $this->Home_model->update("admin_user",1,$cdata) ;
			    $this->session->set_flashdata("successmessage","Setting updated..!") ;	
			    redirect('administrator/Home/general_setting') ;
			
		} 
		 
		$this->load->model('administrator/Home_model');
	    $data['view']=$this->Home_model->detail("admin_user",1) ;
	    $this->load->view('administrator/general_setting',$data);
 } 


public function invoice($id='')
{
	if($id)
	{
			$rid = $id ;

			$admin = $this->Home_model->detail("admin_user",1);
            $result = $this->Home_model->detail("user_result",$rid);
            $total='150';
            $score1 = ($total) - ($result->wrong_answer * 7.5) ;
            $score=round($score1);
            $other_plan = $this->Home_model->wheredetail("transaction","result_id",$result->id);
            $plan = $this->Home_model->detail("plans",$other_plan->plan_id);
            $price = $plan->price ;
           
$cdate = date("m/d/Y", strtotime($result->created_on));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Report</title>
<!-- Favicon -->
<link rel="icon" href="https://www.smartiq.org/test/upload/logo/Quiz_favicon_1676900989.jpg">

<meta name="description" content="">
<meta name="author" content="">
<style type="text/css">
body,td,th {
  font-size: 16px;
  line-height:22px;
  color: #333;
  font-family:Arial, Helvetica, sans-serif;
}
body {
 padding: 0px; margin: 0px;
}
img { display:block; }

/* new */
.users-row { display: flex; }
.users-col-left { width: 18%; background: #fff; }
.users-col-right { width: 82%; background: #dee7ea; padding: 50px;min-height: 900px;  }
.users-col-logo { padding: 30px 15px; }
.users-col-logo h3 { margin: 0px; font-size: 14px; }
.users-col-menu ul { padding-left: 0px; margin: 0px; }
.users-col-menu li { list-style: none; cursor: pointer; display: flex; grid-gap: 10px; color: rgba(118,63,249,.6); text-decoration: none; align-items: center; padding: 15px; font-weight: 600; font-size: 14px;  }
.users-col-menu li:hover { background: #f1f1f1;color: rgba(118,63,249,1) !important;  }
.current-menu { background: #f1f1f1; color: rgba(118,63,249,1) !important;  }
.current-menu a {  color: rgba(118,63,249,1) !important; }
.user-show-mobile { display: none; }
.mobile-menu-u { display: flex; justify-content: space-between; align-items: center;
padding: 15px; background: #00b386; cursor: pointer; } 
.mobile-menu-u h3 { margin: 0px; font-size: 15px; color: #fff; font-weight: 600;  }
.mobile-menu-toggle { display: none; }
.tab-box2, .tab-box3, .tab-box4, .tab-box5, .tab-box6 { display:none;}



@media only screen and (max-width : 990px) {

.user-show-desktop { display: none; }
.users-row { flex-wrap: wrap; }
.users-col-left { width: 100%; }
.users-col-right { flex-grow:2;}
.users-col-logo { text-align: center; padding: 15px; }
.user-show-mobile { display: block; }
.users-col-right { padding: 15px;  }
table tr td {  width: 97% !important;  max-width: 100%; display: block; }


}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".mobile-menu-u").click(function(){
    $(".mobile-menu-toggle").slideToggle();
  });
});
</script>
</head>
<body>
<script type="text/javascript">
$(document).ready(function(){
 $(".tab-box1").show();  $(".tab-box2").hide();  $(".tab-box3").hide();  $(".tab-box4").hide();  $(".tab-box5").hide();  $(".tab-box6").hide(); 
  $(".tab-btn1").click(function(){ 
    $(".tab-box1").show();  $(".tab-box2").hide();  $(".tab-box3").hide();  $(".tab-box4").hide();  $(".tab-box5").hide();  $(".tab-box6").hide();   
    $(".tab-btn1").addClass("current-menu");   
    $(".tab-btn2").removeClass("current-menu");  
    $(".tab-btn3").removeClass("current-menu");  
   $(".tab-btn4").removeClass("current-menu"); 
   $(".tab-btn5").removeClass("current-menu"); 
   $(".tab-btn6").removeClass("current-menu");
  });
  $(".tab-btn2").click(function(){
    $(".tab-box1").hide();  $(".tab-box2").show();  $(".tab-box3").hide();  $(".tab-box4").hide();  $(".tab-box5").hide();  $(".tab-box6").hide(); 
    $(".tab-btn2").addClass("current-menu");   
    $(".tab-btn1").removeClass("current-menu");  
    $(".tab-btn3").removeClass("current-menu"); 
  $(".tab-btn4").removeClass("current-menu"); 
  $(".tab-btn5").removeClass("current-menu"); 
  $(".tab-btn6").removeClass("current-menu");
  });
  $(".tab-btn3").click(function(){
    $(".tab-box1").hide();  $(".tab-box2").hide();  $(".tab-box3").show();  $(".tab-box4").hide();  $(".tab-box5").hide();  $(".tab-box6").hide(); 
    $(".tab-btn3").addClass("current-menu");   
    $(".tab-btn1").removeClass("current-menu");  
    $(".tab-btn2").removeClass("current-menu");
  $(".tab-btn4").removeClass("current-menu"); 
  $(".tab-btn5").removeClass("current-menu"); 
  $(".tab-btn6").removeClass("current-menu");
  }); 
  $(".tab-btn4").click(function(){
    $(".tab-box1").hide();  $(".tab-box2").hide();  $(".tab-box3").hide();  $(".tab-box4").show();  $(".tab-box5").hide();  $(".tab-box6").hide(); 
    $(".tab-btn4").addClass("current-menu");   
    $(".tab-btn1").removeClass("current-menu");  
    $(".tab-btn2").removeClass("current-menu");
   $(".tab-btn3").removeClass("current-menu"); 
   $(".tab-btn5").removeClass("current-menu"); 
   $(".tab-btn6").removeClass("current-menu");
  });

  $(".tab-btn5").click(function(){
    $(".tab-box1").hide();  $(".tab-box2").hide();  $(".tab-box3").hide();  $(".tab-box4").hide();  $(".tab-box5").show();  $(".tab-box6").hide(); 
    $(".tab-btn5").addClass("current-menu");   
    $(".tab-btn1").removeClass("current-menu");  
    $(".tab-btn2").removeClass("current-menu");
   $(".tab-btn3").removeClass("current-menu"); 
   $(".tab-btn4").removeClass("current-menu"); 
   $(".tab-btn6").removeClass("current-menu");
  });


   $(".tab-btn6").click(function(){
    $(".tab-box1").hide();  $(".tab-box2").hide();  $(".tab-box3").hide();  $(".tab-box4").hide();  $(".tab-box5").show();  $(".tab-box6").hide(); 
    $(".tab-btn6").addClass("current-menu");   
    $(".tab-btn1").removeClass("current-menu");  
    $(".tab-btn2").removeClass("current-menu");
   $(".tab-btn3").removeClass("current-menu"); 
   $(".tab-btn4").removeClass("current-menu"); 
   $(".tab-btn5").removeClass("current-menu");
  });

});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">


<div class="users-row">
  <div class="users-col-left">
    <div class="users-col-logo">
      <h3>Smart IQ Academy</h3>
    </div>
    <div class="users-col-menu user-show-desktop">
      <ul>
        <li class="tab-btn1 current-menu"><img src="<?php echo base_url("result/"); ?>images/user.svg"><span>Results analysis</span></li>
        <li class="tab-btn2"><img src="<?php echo base_url("result/"); ?>images/gift.svg"><span>Extra tests</span></li>
        <li class="tab-btn3"><img src="<?php echo base_url("result/"); ?>images/clipboard.svg"><span>Certificate</span></li>
        <li><img src="<?php echo base_url("result/"); ?>images/help-circle.svg"><a href="mailto:contact@smartiq.org"><span>Contact</span></a></li>
      </ul>
    </div>

    <div class="user-show-mobile">
      <div class="mobile-menu-u">
        <div><h3>Sections</h3></div>
        <div><img src="<?php echo base_url("result/") ?>images/down-arrow-user.png"></div>
      </div>
      <div class="users-col-menu mobile-menu-toggle">
      <ul>
        <li class="tab-btn1 current-menu"><img src="<?php echo base_url("result/"); ?>images/user.svg"><span>Results analysis</span></li>
        <li class="tab-btn2"><img src="<?php echo base_url("result/"); ?>images/gift.svg"><span>Extra tests</span></li>
        <li class="tab-btn3"><img src="<?php echo base_url("result/"); ?>images/clipboard.svg"><span>Certificate</span></li>
        <li><img src="<?php echo base_url("result/") ?>images/help-circle.svg"><a href="mailto:contact@smartiq.org"><span>Contact</span></a></li>
      </ul>
    </div>
    </div>

  </div>
  <div class="users-col-right">
    <div class="tab-box1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td style="padding:10px;">
      <h3 style="margin:0px 0px 6px 0px; font-size:13px; text-transform:uppercase; color:#627182;">Test Results</h3>
                  <h2 style="margin:0px; font-size:26px;"><?php echo $result->name; ?></h2>
      </td>
    </tr>
    <tr>
      <td style="padding:10px;">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      
        <tr>
          <td style="padding:10px; width:25%;">
            <div style="background:#fff; border-radius:10px; padding:15px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="63" align="left" valign="top"><img src="<?php echo base_url("result/"); ?>images/icon1.jpg"></td>
                  <td width="190" align="left" valign="top">
                  <h3 style="margin:0px 0px 6px 0px; font-size:13px; text-transform:uppercase; color:#627182;">IQ Score</h3>
                  <h2 style="margin:0px; font-size:26px;"><?php echo $score ; ?></h2>
                  </td>
                </tr>
              </table>
            </div>
          </td>
          <td style="padding:10px; width:25%;">
            <div style="background:#fff; border-radius:10px; padding:15px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="63" align="left" valign="top"><img src="<?php echo base_url("result/"); ?>images/icon2.jpg"></td>
                  <td width="190" align="left" valign="top">
                  <h3 style="margin:0px 0px 6px 0px; font-size:13px; text-transform:uppercase; color:#627182;">Date</h3>
                  <h2 style="margin:0px; font-size:26px;"><?php echo $cdate ; ?></h2>
                  </td>
                </tr>
              </table>
            </div>
          </td>
          <td style="padding:10px; width:25%;">
            <div style="background:#fff; border-radius:10px; padding:15px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="63" align="left" valign="top"><img src="<?php echo base_url("result/"); ?>images/icon3.jpg"></td>
                  <td width="190" align="left" valign="top">
                  <h3 style="margin:0px 0px 6px 0px; font-size:13px; text-transform:uppercase; color:#627182;">Categories</h3>
                  <h2 style="margin:0px; font-size:26px;"><?php echo $result->quiz_id ; ?></h2>
                  </td>
                </tr>
              </table>
            </div>
          </td>
          
        </tr>
      </table></td>
    </tr>
    
<?php  if($other_plan->plan_id == "2" || $other_plan->plan_id == "3")
{ ?>
    <tr>
        <td style="padding:10px;">
         <div style="background:#fff; border-radius:10px; padding:15px;">
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td align="center" valign="middle">
           <h2 style="margin:0px; font-size:20px;">Want to improve your score or challenge your friends and family?</h2>
           <div style="padding:15px 0px; text-align:center;">
           <a href="<?php echo base_url()."payment/".$other_plan->id."/".$result->id ; ?>?role=other" target="_blank" style="background:#9066fb; padding:15px 40px; text-decoration:none; border-radius:5px; display:inline-block; color:#fff; font-weight:600;">
           Get 1 extra IQ test
           </a></div>
           <p><strong>$<?php echo $price; ?> only</strong></p>
           <div style="text-align:center;"><img src="<?php echo base_url("result/"); ?>images/credit-cards.png" style="display:inline-block;"></div>
           </td>
         </tr>
       </table>
     </div></td>
    </tr>
     <tr>
      <td style="padding:10px;">
      <div style="background:#fff; border-radius:10px; padding:15px;">
      <h3 style="color:#9066fb; font-size:16px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">What does it measure?</h3>
      
      <p>Humans have a diverse set of analytical abilities. Any of these abilities can be measured faster and more accurately than others, and the results can be used to predict performance in a number of fields. This evaluation evaluates mental skills related to a wide range of strengths and academic success. In terms of basic abilities, the success will offer you a clear understanding of your true ability, but it will not be perfect.</p> 
<p>This IQ exam evaluates, among other aspects, logical logic, math skills, spatial communication skills, knowledge recall, and the ability to solve novel problems. It does not take social or emotional considerations into consideration. </p>


      </div>
      </td>
    </tr>
    <tr>
      <td>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top" style="padding:10px; width:40%;">
              <div style="background:#fff; border-radius:10px; padding:15px;">
                <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Where you stand</h3>
                <div style="min-height:377px;">
                
                <!-------bar chart--------->
                <canvas id="myChart" style="width:100%;max-width:500px"></canvas>
                
               
                </div>
    
                 </div>
          
          </td>
              <td align="left" valign="top" style="padding:10px; width:60%;">
          <div style="background:#fff; border-radius:10px; padding:15px;">
          <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">What does it measure?</h3>
          <div style="min-height:377px;">
            <p>If you haveve recently completed or partially completed our IQ Test, you are probably curious about the results and want to hear more about what they say. After all, the results of an IQ test pose a slew of concerns, such as what is the average IQ? Is my performance indicative of high intelligence, low intelligence, or a combination of the two? How are the results of IQ experiments determined? Both of these questions, as well as a number of others, can be addressed by understanding how IQ is measured and what the mean average score is for each category.
            </p> 
            <p> It is also worth noting that IQ test results are graded, and that the performance would be somewhere between "cognitively impaired" at the bottom and "highly talented" at the top of the scale. </p>
            </div>
    
          </div>
          </td>
            </tr>
         </table>
      </td>
    </tr>
    </tr>
    <tr>
      <td style="padding:10px;">
      <div style="background:#fff; border-radius:10px; padding:15px;">
      <h3 style="color:#9066fb; font-size:16px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Understanding IQ Test Scores</h3>
      
          <p> It goes without saying that the vast majority of people in every society would score in the "average intelligence" range on an IQ test. After all, that is what the term "normal intellect" means. </p>
          <p>
        The average score at the IQ Test Academy is 100 points, with a standard deviation of 15 points above and below this baseline - 115 and 85 points, respectively. This is the group that 68 percent of people would fall under. We have a variety of distinct categories of intelligence on each side of this category, with a declining proportion of the population the more you go to either end of the scale. Indeed, 2.5 percent of the population has an IQ below 70, and 2.5 percent would reach a score over 130, with just 0.5 percent ranking over 140. </p>
        <p>
        Its interesting to note that, actually, such low and high scores are quite difficult to measure using standard intelligence tests, and very high IQ scores are especially hard to determine in an accurate fashion. This is due to the fact that a lot of reference measurements are required in order to determine specific scores reliably, and as very high and very low IQ scores are uncommon and unusual - in the sense that relatively very few people achieve them - reliable reference groups to make use of are difficult to formulate. </p>

      </div>
      </td>
    </tr>
    <tr>
      <td style="padding:10px;">
      <div style="background:#fff; border-radius:10px; padding:15px;">
      <h3 style="color:#9066fb; font-size:16px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">The IQ Test Score Bell Curve</h3>
      
        <p>Although the IQ test score is well-known as a psychological statistic, the relationship between it and other statistical tests is less well-known. Looking at the natural distribution, also known as the Bell Curve, is the simplest way to understand these measures and how they compare to one another. </p>
        <p>
        The horizontal axis of the Bell Curve depicts all of the possible scores a test taker might get, from the lowest to the best. The number of people who obtain a given score is represented by the vertical axis. The distinctive "bell curve" pattern that occurs is due to the fact that the maximum number of individual scores will always be at the mean average of 100, with the standard deviation of 15 points marking the start of the downward curve on each side of the top. The curve steepens as the scores rise and fall, until only a small percentage of people are represented at either end. 
        </p>

      </div>
      </td>
    </tr>
    <tr>
      <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" style="padding:10px; width:60%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">The Bell Curve</h3>
           <div style="min-height:377px;">
                     <img src="<?php echo base_url("result/images/graph2.jpg") ;?>" alt="" style="max-width:100%;"> 
            
            
           </div>
           
          </div></td>
          <td align="left" valign="top" style="padding:10px; width:40%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Overall Score</h3>
           <div style="min-height:377px;">  
           <p>• 141 or more: Very gifted or highly advanced <br>
           • 130-140: Gifted or very advanced  <br>
           • 120-129: Superior  <br>
           • 110-119: High average  <br>
           • 90-109: Average <br> 
           • 80-89: Low average  <br>
           • 70-79: Borderline impaired or delayed  <br>
           • 55-69: Mildly impaired or delayed  <br>
           • 40-54: Moderately impaired or delayed</p>
           </div> </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td style="padding:10px;">
      <div style="background:#fff; border-radius:10px; padding:15px;">
          <?php 
          $data=$this->db->query("SELECT * FROM `content` WHERE ".$score." BETWEEN content.from and content.to")->result() ;
        
         ?>
      <h3 style="color:#9066fb; font-size:16px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">IQ Test Results <?php print_r($data[0] ->from.'-'.$data[0] ->to); ?></h3>
      
        <?php echo $data[0] ->result_data; ?>

      </div>
      </td>
    </tr>
    <tr>
      <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
         
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" style="padding:10px; width:40%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Where you stand</h3>
           <div style="min-height:377px;">
                <!-------bar chart--------->
                <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
            </div> </div></td>
          <td align="left" valign="top" style="padding:10px; width:60%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Abstract resoning</h3>
            <div style="min-height:377px;">
            <p><strong>Abstract reasoning is the ability to break down large amounts of data into smaller chunks, and analyze and weigh certain chunks in order to come up with rational answers to challenges or making sound conclusions based on facts.</strong></p> 
            <p>Abstract reasoning is thought to have the strongest connection between problem identification and problem-solving abilities. How effectively and easily you can find challenges and devise effective strategies is determined by your critical thinking abilities. </p>
            <p>Your logical thinking evaluation performance reflects how well you can interpret data and make well-informed judgments, all of which are critical cognitive qualities for learning, career, and personal achievement.</p> 

            </div>
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" style="padding:10px; width:40%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Where you stand</h3>
            <div style="min-height:377px;">
                <!-------bar chart--------->
                <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
            </div></div></td>
          <td align="left" valign="top" style="padding:10px; width:60%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Pattern recognition</h3>
            <div style="min-height:377px;">
            <p> The method of detecting, distinguishing, and categorizing complicated arrangements of sensory objects into organized schemes in a way that enables memory encoding and retrieval is known as pattern recognition. It is a natural and unconscious phenomenon that determines the ability to perceive order in unpredictable situations. Since it determines your capacity to think objectively and your potential to understand and make use of logical sequences, pattern recognition is thought to be particularly related to your General Intelligence standard. </p>
            <p>The "Pattern Recognition" collection of questions is intended to assess how readily and reliably you can understand the underlying mechanics of various scenarios and make correlations between them. </p>

            </div>
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
         <td align="left" valign="top" style="padding:10px; width:40%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Where you stand</h3>
          <div style="min-height:377px;">
                <!-------bar chart--------->
                <canvas id="myChart3" style="width:100%;max-width:600px"></canvas>
            </div></div></td>
          <td align="left" valign="top" style="padding:10px; width:60%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Deductive reasoning</h3>
            <div style="min-height:377px;">
              <p>The capacity to process logical thoughts and comprehend novel concepts without depending on previously learned experience is known as deductive reasoning. </p>
                <p>The "deductive reasoning" collection of questions assesses your General Intelligence ability without taking into account considerations like your educational degree, socioeconomic context, or life experience. Deductive reasoning questions are intended to assess your "fluid intellect," or your capacity to spot rational patterns, trends, and laws easily when analyzing fresh details and using that insight to solve difficult problems. Deductive reasoning testing has the best precision rating for forecasting possible work placement results, according to research, and it is utilized by several HR teams throughout the applicant screening phase. </p>

            </div>
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" style="padding:10px; width:40%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Where you stand</h3>
          <div style="min-height:377px;">
                <!-------bar chart--------->
                <canvas id="myChart4" style="width:100%;max-width:600px"></canvas>
            </div></div></td>
          <td align="left" valign="top" style="padding:10px; width:60%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Numerical reasoning</h3>
            <div style="min-height:377px;">
              <p>Numerical reasoning is the ability to reason and to apply numerical concepts. Basic numeracy skills consist of comprehending fundamental arithmetical operations like addition, subtraction, multiplication, and division. For example, if one can understand simple mathematical equations such as 2 + 2 = 4, then one would be considered to possess at least basic numeric knowledge. This test obviously goes deeper into this concept with more complex questions. </p>
                <p>Substantial aspects of numeracy also include number sense, operation sense, computation, measurement, geometry, probability and statistics. </p>

            </div>
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
         <td align="left" valign="top" style="padding:10px; width:40%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Where you stand</h3>
          <div style="min-height:377px;">
              <!-------bar chart--------->
                <canvas id="myChart5" style="width:100%;max-width:600px"></canvas>
            </div></div></td>
          <td align="left"  valign="top" style="padding:10px; width:60%;"><div style="background:#fff; border-radius:10px; padding:15px;">
            <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Cognitive ability</h3>
            <div style="min-height:377px;">
              <p>Cognitive ability is a visual-cognitive capacity that enables us to organize, store, and perceive visual knowledge content in order to extract awareness and significance from what we are seeing. Your visual recognition abilities assessment can reveal how well you can distinguish even minor distinctions between entity types and shapes, as well as how well you can compare and contrast items based on scale, color, or proportions. </p>
                <p>Cognitive ability is an essential feature of human intellect and a crucial ability for learning. People who have a well-developed visual vision are thought to be stronger and quicker learners. </p>

            </div>
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
         <tr>
            <td align="left" valign="top" style="padding:10px; width:50%;">
                <div style="background:#fff; border-radius:10px; padding:15px;">
                    <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Professional benchmark</h3>
                    <!--<img src="<?php echo base_url("result/"); ?>images/graph5.jpg" alt="" style="max-width:100%;">-->
                    
                    <!--<div id="myPlot" style="width:100%;max-width:550px"></div>-->
                    <canvas id="horizontalBarChartCanvas" style="width:100%;max-width:550px"></canvas>
                    <script>
                    
                    Chart.defaults.global.defaultFontFamily = "Lato";

                    var horizontalBarChart = new Chart(horizontalBarChartCanvas, {
                       type: 'horizontalBar',
                       data: {
                          labels: ["<?php echo $result->name ; ?>","Carrier", "Tourism Industry ", "Agricultures", "IT", "Chemist","Philosopers","Engineers","Doctors","Physicians","Mathematicians","Biologist","Economist","Astronauts"],
                          datasets: [{
                             data: ["<?php echo $score ; ?>","100","110","115","120","90","135","100","85","75","140","120","100","95"],
                             backgroundColor: ["#1abc9c", "#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db"], 
                          }]
                       },
                       options: {
                          tooltips: {
                            enabled: true
                          },
                          responsive: true,
                          legend: {
                             display: false,
                             position: 'bottom',
                             fullWidth: true,
                             labels: {
                               boxWidth: 10,
                               padding: 50
                             }
                          },
                          scales: {
                             yAxes: [{
                               barPercentage: 0.75,
                               gridLines: {
                                 display: true,
                                 drawTicks: true,
                                 drawOnChartArea: false
                               },
                               ticks: {
                                 fontColor: '#555759',
                                 fontFamily: 'Lato',
                                 fontSize: 11
                               }
                                
                             }],
                             xAxes: [{
                                 gridLines: {
                                   display: true,
                                   drawTicks: false,
                                   tickMarkLength: 5,
                                   drawBorder: false
                                 },
                               ticks: {
                                 padding: 5,
                                 beginAtZero: true,
                                 fontColor: '#555759',
                                 fontFamily: 'Lato',
                                 fontSize: 11,
                                 callback: function(label, index, labels) {
                                  return label;
                                 }
                                   
                               },
                                scaleLabel: {
                                  display: true,
                                  padding: 10,
                                  fontFamily: 'Lato',
                                  fontColor: '#555759',
                                  fontSize: 16,
                                  fontStyle: 700,
                                  //labelString: 'Scale Label'
                                },
                               
                             }]
                          }
                       }
                    });


                    </script>   
                    
                    
                    
                    
                </div>
            </td>
            <td align="left" valign="top" style="padding:10px; width:50%;">
                <div style="background:#fff; border-radius:10px; padding:15px;">
                    <h3 style="font-size:18px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Geographic benchmark</h3>
                    <!--<img src="<?php echo base_url("result/"); ?>images/graph6.jpg" alt="" style="max-width:100%;">-->
                    <canvas id="geochart" style="width:100%;max-width:500px;"></canvas>
                    
                    <script>
                        var xValuesgc = ["Argentina","Australia", "Brazil", "Canada","China", "India","Indonesia","Russia","South Africa","United State"];
                        var yValuesgc = [100, 110, 102, 105,106,110,100,105,108,100,0,20,40,60,80,120];
                        var barColorsgc = ["#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db"];
                        
                        new Chart("geochart", {
                          type: "bar",
                          data: { labels: xValuesgc, datasets: [{ backgroundColor: barColorsgc, borderRadius: 5, data: yValuesgc }] },
                          options: { legend: {display: false},  title: { display: true, text: "" } },
                          step:20,
                        });
                    </script>
                    
                    
                </div>
            </td>
        </tr>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td style="padding:10px;"><div style="background:#fff; border-radius:10px; padding:15px;">
        <h3 style="color:#9066fb; text-align:center; font-size:16px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">High IQ celebrities benchmark</h3>
        
        <canvas id="horizontalBarChartCanvas1" style="width:100%;"></canvas>
        <script>
            Chart.defaults.global.defaultFontFamily = "Lato";

            var horizontalBarChart = new Chart(horizontalBarChartCanvas1, {
            type: 'horizontalBar',
            data: {
              labels: ["<?php echo $result->name ; ?>","Charles Darwin","Quentin Tarantino", "Ashton Kutcher", "Nolan Gould", "Madonna", "Arnola Schwarzenegger", "Nichole Kidman", "Nicki Minaj", "Drake", "Justin Bieber"],
              datasets: [{
                 data: ["<?php echo $score ; ?>","100","110","115","120","90","135","100","85","75","140","120","100","95","200"],
                 backgroundColor: ["#1abc9c", "#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db","#3498db"], 
              }]
            },
            options: {
              tooltips: {
                enabled: true
              },
              responsive: true,
              legend: {
                 display: false,
                 position: 'bottom',
                 fullWidth: true,
                 labels: {
                   boxWidth: 10,
                   padding: 50
                 }
              },
              scales: {
                 yAxes: [{
                   barPercentage: 0.75,
                   gridLines: {
                     display: true,
                     drawTicks: true,
                     drawOnChartArea: false
                   },
                   ticks: {
                     fontColor: '#555759',
                     fontFamily: 'Lato',
                     fontSize: 11
                   }
                    
                 }],
                 xAxes: [{
                     gridLines: {
                       display: true,
                       drawTicks: false,
                       tickMarkLength: 5,
                       drawBorder: false
                     },
                   ticks: {
                     padding: 5,
                     beginAtZero: true,
                     fontColor: '#555759',
                     fontFamily: 'Lato',
                     fontSize: 11,
                     callback: function(label, index, labels) {
                      return label;
                     }
                       
                   },
                    scaleLabel: {
                      display: true,
                      padding: 10,
                      fontFamily: 'Lato',
                      fontColor: '#555759',
                      fontSize: 16,
                      fontStyle: 700,
                      //labelString: 'Scale Label'
                    },
                   
                 }]
               }
             }
            });
            </script>   
          
        
        
        
      </div></td>
    </tr>
    <tr>
      <td style="padding:10px;"><div style="background:#fff; border-radius:10px; padding:15px;">
        <h3 style="color:#9066fb; font-size:16px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Conclusion</h3>
        <p>We hope that now that you haveve completed the IQ test and have a better understanding of where you fall on the hierarchy of test outcome groups, you have developed a better understanding of your own intelligence quotient and how it relates to those around the world. </p>
        
        <p>Knowing and recognizing your IQ has many advantages, whether you are on the bottom end of the spectrum, in the centre with an average score, or have discovered proof that you are mentally gifted or on the verge of becoming a genius. It will assist you in determining which career options or college programs are right for you. It will help you figure out where you shine and where you need to develop. It will also assist you in determining the next move in life and determining your real intellectual capacity. Any online test remains for informative purposes and should not be relied upon or used as the sole basis for making decisions without reviewing initial, more accurate, more detailed, or more timely sources of knowledge in real life. </p>
        
            <p><strong>Will My IQ Test Result Change?</strong></p>

        <p>Your IQ test score, like anything else in existence, is not set in stone. While most peoples IQ test scores plateau about the age of 18, and then tend to decline slightly after the age of 65, theres plenty of data that suggests IQ test scores can be improved. If you believe you should have performed well on your IQ test and wish to be placed in a higher level of test scores, you wll be relieved to learn that there are many options available to you.</p>

            <p>Reading more widely, completing regular "brain conditioning" drills, puzzles, and sports, and transitioning to a brain-healthy diet are all ways to increase IQ test results, according to scientists and psychologists. What are the chances? With some hard work, determination, and optimistic lifestyle improvements, you might be able to raise an average IQ score into the realms of giftedness and retake your IQ test with more amazing results before long.</p>
  
        <p>If you took the IQ Test out of curiosity, for science testing, to answer questions about your academic or career future, or for pure amusement, we hope it gave you the answers you were looking for. </p>

      </div>
      </td>
    </tr>
    <tr>
      <td style="padding:10px; width:25%;"><div style="background:#fff; border-radius:10px; padding:15px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="middle">
            <h2 style="margin:0px; font-size:20px;">Want to improve your score or challenge your friends and family?</h2>
            <div style="padding:15px 0px; text-align:center;">
            <a href="<?php echo base_url("payment/".$other_plan->id."/".$result->id); ?>?role=other" target="_blank" style="background:#9066fb; padding:15px 40px; text-decoration:none; border-radius:5px; display:inline-block; color:#fff; font-weight:600;">
            Get 1 extra IQ test
            </a></div>
            <p><strong>$<?php echo $price; ?> only</strong></p>
            <div style="text-align:center;"><img src="<?php echo base_url("result/"); ?>images/credit-cards.png" style="display:inline-block;"></div>
            </td>
          </tr>
        </table>
      </div></td>
    </tr>
    <?php if($other_plan->plan_id == "3"){ ?>
    <tr>
      <td style="padding:10px;"><div style="background:#fff; border-radius:10px; padding:15px;">
        <h3 style="color:#9066fb; font-size:16px; border-bottom:1px solid #dee7ea; padding-bottom:15px;">Your documents</h3>
        <div style="padding-top:15px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="62" align="left" valign="top"><img src="<?php echo base_url("result/"); ?>images/icon-doc-2.jpg"></td>
                  <td width="1059" align="left" valign="middle"><a href="<?php echo base_url("Home/certificate/".$result->id); ?>" style="margin:0px 0px 6px 0px; font-size:13px; color:#9066fb; text-decoration:underline; font-weight:600;">Download the certificate (PDF)</a></td>
                  </tr>
              </table>
        </div>
      </div></td>
    </tr>
    
    <?php } ?>
    <tr>
      <td style="padding:10px;">
      <p style="font-size:12px;"><em>We emphasize that this website material is provided for entertaining purpose, and should not be used as the sole basis for making decisions without reviewing initially more detailed knowledge with a professional psychologist. Regarding results validity, refer to your own jurisdiction since we are a self-reliant organization and any use of the content of this platform is solely at your own risk. 
        </em></p>
      </td>
    </tr>
    <tr>
      <td style="padding:10px;">&nbsp;</td>
    </tr>
  </table>
</div>


   


<div class="tab-box3"> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Certificate</title>
<!-- Favicon -->
<link rel="icon" href="frontend/images/favicon.png">
<meta name="description" content="">
<meta name="author" content="">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

<style>
body { background:#222; font-family: "Roboto Slab", serif;  background:#f3f2ee;
}
h1, h2 { font-family: "Playfair Display", serif; }
</style>
<!-- icon -->
</head>
<body>
<div style="padding:50px; margin:0 auto; background:url(https://www.smartiq.org/test/frontend/images/certificate-bg.jpg) no-repeat; background-size:contain; background-position:center top;">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <td align="center" valign="middle" style="height:50px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    <h1 style="margin:0px;font-size: 40px;text-transform:uppercase;letter-spacing:9px;color:#000;">Certificate</h1>
<h2 style="margin: 20px;font-size: 20px;text-transform:uppercase;letter-spacing:12px;color:#bb822d;">of completion</h2>
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle" style="height:20px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" style="height:50px;">
    <img src="https://www.smartiq.org/test/frontend/images/line.jpg">
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle" style="height:20px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><h3 style="color:#333;text-transform:uppercase;letter-spacing:3px;font-size: 8px;">The Certificate is proudly presented for honourable <br> Achiement to</h3></td>
  </tr>
  <tr>
    <td align="center" valign="middle" style="height:20px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><h2 style="font-size:40px; margin:0px; font-weight:300;"><em><?php echo $result->name ; ?></em></h2></td>
  </tr>
  <tr>
    <td align="center" valign="middle" style="height:30px; boarder-top:2px solid #c39a5c">
  &nbsp;
    </td>
  </tr>
  
  <tr>
    <td align="center" valign="middle"><p style="margin:0px;">for successfully completing our test with a score of</p></td>
  </tr>
  <tr>
    <td align="center" valign="middle" style="height:30px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><h2 style="font-size:40px; margin:0px;"><?php echo $score ;?></h2></td>
  </tr>
    <tr>
    <td align="center" valign="middle" style="height:30px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><img src="https://www.smartiq.org/test/upload/logo/logo-blue.png"></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><p style="font-size:11px;">The websites material is provided for entertainment prurposes only,<br>
and should not be used for making decisions.</p></td>
  </tr>
</tbody></table>
</div>
</div>
</body>
</html>
</div>
<?php } ?>

  </div>
</div>
 <script>
            var xValues = ["<?php echo $result->name; ?>","Low Average","Average","High Average","Very Advanced"];
            var yValues = [<?php echo $score ; ?>, 82, 100, 110, 120, 150];
            var barColors = ["#1abc9c", "#3498db","#3498db","#3498db","#3498db"];
            
            new Chart("myChart", {
              type: "bar",
              data: { labels: xValues, datasets: [{ backgroundColor: barColors, data: yValues }] },
              options: { legend: {display: false},  title: { display: true, text: "" } }
            });
            
           var xValues1 = ["<?php echo $result->name; ?>","Low Average","Average","High Average","Very Advanced"];
            var yValues1 = [<?php echo $result->abstract_resoning ; ?>, 2, 3, 4, 5, 0];
            var barColors1 = ["#1abc9c", "#3498db","#3498db","#3498db","#3498db"];
            
            new Chart("myChart1", {
              type: "bar",
              data: { labels: xValues1, datasets: [{ backgroundColor: barColors1, data: yValues1 }] },
              options: { legend: {display: false},  title: { display: true, text: "" } }
            });
            
            
            var xValues2 = ["<?php echo $result->name; ?>","Low Average","Average","High Average","Very Advanced"];
            var yValues2 = [<?php echo $result->pattern_recognition ; ?>, 2, 3, 4, 5,0];
            var barColors2 = ["#1abc9c", "#3498db","#3498db","#3498db","#3498db"];
            
            new Chart("myChart2", {
              type: "bar",
              data: { labels: xValues2, datasets: [{ backgroundColor: barColors2, data: yValues2 }] },
              options: { legend: {display: false},  title: { display: true, text: "" } }
            });
            
            var xValues3 = ["<?php echo $result->name; ?>","Low Average","Average","High Average","Very Advanced"];
            var yValues3 = [<?php echo $result->deductive_reasoning ; ?>, 2, 3, 4, 5,0];
            var barColors3 = ["#1abc9c", "#3498db","#3498db","#3498db","#3498db"];
            
            new Chart("myChart3", {
              type: "bar",
              data: { labels: xValues3, datasets: [{ backgroundColor: barColors3, data: yValues3 }] },
              options: { legend: {display: false},  title: { display: true, text: "" } }
            });
            
            var xValues4 = ["<?php echo $result->name; ?>","Low Average","Average","High Average","Very Advanced"];
            var yValues4 = [<?php echo $result->numerical_reasoning ; ?>, 2, 3, 4, 5,0];
            var barColors4 = ["#1abc9c", "#3498db","#3498db","#3498db","#3498db"];
            
            new Chart("myChart4", {
              type: "bar",
              data: { labels: xValues4, datasets: [{ backgroundColor: barColors4, data: yValues4 }] },
              options: { legend: {display: false},  title: { display: true, text: "" } }
            });
            
            var xValues5 = ["<?php echo $result->name; ?>","Low Average","Average","High Average","Very Advanced"];
            var yValues5 = [<?php echo $result->cognitive_ability ; ?>, 2, 3, 4, 5,0];
            var barColors5 = ["#1abc9c", "#3498db","#3498db","#3498db","#3498db"];
            
            new Chart("myChart5", {
              type: "bar",
              data: { labels: xValues5, datasets: [{ backgroundColor: barColors5, data: yValues5 }] },
              options: { legend: {display: false},  title: { display: true, text: "" } }
            });
</script>

</body>
</html>
<?php
	}
}



      
}


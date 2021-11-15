<?php
class Submitdeal extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();		
		$this->load->model('Deal_model');
		$this->load->library('facebook');
		$this->load->helper('cookie');
		// Load session library
		$this->load->library('session');
		
	}
	
	function index()
	{		
		$this->load->helper('form');
		$data['page_title'] 	= 'Submit Deal';			
		$data['active_menu'] 	= 'home';
		$data['user_profile'] 	= $this->user_profile;
		$data['categories'] 	= $this->Deal_model->get_categories();
		$data['middle_content'] = 'frontend/submit_deal';	
		$this->load->view('templates/inner_template', $data);		
		
	}
	
	function postdeal()
	{				 
	   //Check whether user upload picture
       if(!empty($_FILES['userfile']['name'])){
		   $config['upload_path']   =   "uploads/deal_picture";
		   $config['allowed_types'] =   "gif|jpg|jpeg|png"; 
		   $config['max_size']      =   "5000";
		   $config['max_width']     =   "1907";
		   $config['max_height']    =   "1280";
		   $this->load->library('upload',$config);
		   if(!$this->upload->do_upload())
		   {
			   echo $this->upload->display_errors();
		   }
		   else
		   {
				$finfo									= $this->upload->data();
				$filename 								= $finfo['file_name'];
				$this->_createThumbnail($filename);
				$data['uploadInfo'] 					= $finfo;
				$deal_array = array();
				$deal_array['deal_thumbnail'] 			= $filename;
				$deal_array['deal_image'] 				= $filename;
				$deal_array['deal_url'] 	   			= $this->input->post('url');
				$deal_array['deal_title'] 	    		= $this->input->post('title');
				$deal_array['deal_price'] 				= $this->input->post('price');
				$deal_array['deal_category_id'] 		= $this->input->post('category');
				$deal_array['deal_desc'] 				= $this->input->post('details');
				$deal_array['deal_posted_date'] 	   	= date("Y-m-d H:i:s");
				$deal_array['deal_hot_count'] 	   		= 0;
				$deal_array['deal_cold_count'] 	   		= 0;
				$deal_array['deal_view_count'] 	   		= 0;
				$deal_array['deal_comment_count'] 	   	= 0;
				$deal_array['deal_slug'] 	   			= 0;
				$deal_array['user_id'] 	   				= $this->session->userdata('userid');
				$deal_array['deal_status'] 	   			= 1;
				$insertID 								= $this->Deal_model->insertDeal($deal_array);
				
				//Storing insertion status message.
            	if($insertID){
                $this->session->set_flashdata('success_msg', 'Deal have been added successfully.');
				$this->load->helper('form');
				$data['page_title'] 	= 'Submit Deal';			
				$data['active_menu'] 	= 'home';
				$data['categories'] 	= $this->Deal_model->get_categories();
				
				$data['middle_content'] = 'frontend/submit_deal';	
				$this->load->view('templates/inner_template', $data);
            	}else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
				}
            }
		}
	   else
	   {
         $this->session->set_flashdata('error_msg', 'Some problems occured, please check upload picture.');
       }	
	}
	
	//Create Thumbnail function
 
    function _createThumbnail($filename)
    {    
	     
		$this->load->library('image_lib'); 
		$config['image_library']    = "gd2";      
        $config['source_image']     = "uploads/deal_picture/" .$filename;
		$config['upload_path']      = "uploads/deal_thumb";   
		$config['new_image']		= "uploads/deal_thumb/".$filename;
        $config['maintain_ratio']   = TRUE;      
        $config['width'] = "120";      
        $config['height'] = "120";
 		$this->image_lib->initialize($config); 
		$this->image_lib->resize();
		$this->image_lib->clear();
    }
	
	function details($deal_id)
	{	
		$data['page_title'] 			= 'Deal Details';			
		$data['active_menu'] 			= 'home';
		$data['deals'] 					= $this->Deal_model->getDeal($deal_id);
		$data['comments']				= $this->Deal_model->get_comments($deal_id);
		$data['categories']				= $this->Deal_model->get_categories();
		$data['my_hot_deals']  			= $this->Deal_model->get_my_hot_cold_records($this->session->userdata('userid'));
		
		$data['facebook_login_url'] 	= $this->facebook_login_url;
		$data['middle_content'] = 'frontend/details';	
		$this->load->view('templates/inner_template', $data);		
		
	}
	
	function postcomment()
	{	
		$this->load->helper('form');	
		$data['deal_id'] 	=  $this->input->post('deal_id');
		$data['user_id'] 	=  $this->input->post('user_id');
		$data['message']  	=  $this->input->post('comment');	
		$data['date']  		=  time();	
		echo $this->Deal_model->save_comment($data);
	}
	
	function search_btn_action()
	{		
		$this->load->helper('form');
		$data['page_title'] 			= 'Search Result';			
		$data['active_menu'] 			= 'home';
		$data['facebook_login_url'] 	= $this->facebook_login_url;
		$data['deals'] 					= $this->Deal_model->search_deal_btn_action($this->input->post('search_data'));
		$data['my_hot_deals']  			= $this->Deal_model->get_my_hot_cold_records($this->session->userdata('userid'));
		$data['categories']				= $this->Deal_model->get_categories();
		$data['middle_content'] 		= 'frontend/search_result';					
		$this->load->view('templates/template', $data);		
		
	}
	
	function category($category_id)
	{
		$data['page_title'] 			= 'Deals';			
		$data['facebook_login_url'] 	= $this->facebook_login_url;
		$data['deals'] 					= $this->Deal_model->getDealByCategory($category_id);
		$categories						= $this->Deal_model->get_categories();
		$data['my_hot_deals']  			= $this->Deal_model->get_my_hot_cold_records($this->session->userdata('userid'));
		$data['categories']	            =  $categories;
		$category_name = "";
		foreach($categories as $row)
		{
		 if($row['id'] == $category_id)
		 {
		 $category_name = $row['category_name'];
		 break;
		 }
		}
		$data['active_menu'] 			= $category_name;
		$data['middle_content'] 		= 'frontend/home';					
		$this->load->view('templates/template', $data);	
  	}
	
}
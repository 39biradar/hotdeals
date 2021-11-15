<?php

class Dashboard extends Admin_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('Admin_model');
		$this->load->model('Deal_model');

	}
	
	function index()
	{
		$data['active_menu'] 	= 'dashboard';
		$data['deal_count']		= $this->Admin_model->count_deal();
		$data['comment_count']	= $this->Admin_model->count_comments();
		$data['user_count']	    = $this->Admin_model->count_users();
		$data['page_title']	 	=  'Dashboard';
		$data['middle_content'] = 'admin/dashboard';
		$this->view('templates/admin_template', $data);	
	}
	
	function deal_listing()
	{
		$data['active_menu'] 	= 'deals';
		$data['deals'] 	= $this->Deal_model->getDeal();
		$data['page_title']	 	=  'Deals';
		$data['middle_content'] = 'admin/deal_listing';
		$this->view('templates/admin_template', $data);	
	}
	
	function edit_deal($deal_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['active_menu'] 	= 'dashboard';
		$data['categories'] 	= $this->Deal_model->get_categories();
		$data['deals'] 			= $this->Deal_model->getDeal($deal_id);
		$data['page_title']	 	=  'Deals';
		$data['middle_content'] = 'admin/edit_deal';
		$this->view('templates/admin_template', $data);	
	}
	
	
	
  /**
   * This function will display the list of notifications
   * data coming from the model
   */
  	public function userListing() 
	{
		$data['users'] = $this->Admin_model->getUsers();
		$data['page_title']	 =  'Users';
		$data['active_menu'] 	= 'users';
		$data['middle_content'] = 'admin/user_listing';
		$this->view('templates/admin_template', $data);		
  	}
	
	/**
   * This function will display the list of notifications
   * data coming from the model
   */
  	public function categoryListing() 
	{
		$data['category'] 	= $this->Admin_model->getCategory();
		$data['page_title']	 	=  'Category';
		$data['active_menu'] 	= 'category';
		$data['middle_content'] = 'admin/category_listing';
		$this->view('templates/admin_template', $data);		
  	}
	
	
  /**
   * This function will display the list of onlineApplications
   * data coming from the model
   */
  	public function onlineApplicationListing() 
	{
		$data['onlineapplications'] = $this->Admin_model->getOnlineApplications();
		$data['page_title']	 		=  'online application';
		$data['active_menu'] 		= 'online application';
		$data['middle_content'] 	= 'admin/online_applications';
		$this->view('templates/admin_template', $data);		
  	}
	
  /**
   * This function deletes a notification from the database
   * and redirects back to the listing
   * @param int $id
   */
  	public function deleteDeal($id = null) 
  	{
    if ($id == null)
      show_error('No identifier provided', 500);
    else 
	{
      $this->Admin_model->delete_deal($id);
      redirect('admin/dashboard/deal_listing'); // back to the listing
    }
  }
  
  
    /**
   * This function deletes a notification from the database
   * and redirects back to the listing
   * @param int $id
   */
  	public function deleteExamination($id = null) 
  	{
    if ($id == null)
      show_error('No identifier provided', 500);
    else 
	{
      $this->Admin_model->removeExamination($id);
      redirect('admin/dashboard/examinationListing'); // back to the listing
    }
  }
  
  /**
   * This function deletes a onlineApplications from the database
   * and redirects back to the listing
   * @param int $id
   */
  	public function deleteOnlineApplications($id = null) 
  	{
    if ($id == null)
      show_error('No identifier provided', 500);
		else 
		{
		  $this->Admin_model->removeOnlineApplication($id);
		  redirect('admin/dashboard'); // back to the listing
		}
   }
   
  /**
   * This function will display the list of onlineApplications
   * data coming from the model
   */
  	public function applicationDetailsById($id = null) 
	{
		$data['application_details'] = $this->Admin_model->getOnlineApplications($id);
		$data['page_title']	 		 =  'online application';
		$data['active_menu'] 		 = 'online application';
		$data['middle_content'] 	 = 'admin/application_details';
		$this->view('templates/admin_template', $data);		
  	}
	
	
	public function update_deal()
	{		
		   $deal_array = array();
		   if(!empty($_FILES['userfile']['name']))
		   {
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
				$deal_array['deal_thumbnail'] 			= $filename;
				$deal_array['deal_image'] 				= $filename;
				}
			}
			$deal_array['id'] 	   					= $this->input->post('dealid');
			$deal_array['deal_url'] 	   			= $this->input->post('url');
			$deal_array['deal_title'] 	    		= $this->input->post('title');
			$deal_array['deal_price'] 				= $this->input->post('price');
			$deal_array['deal_category_id'] 		= $this->input->post('category');
			$deal_array['deal_desc'] 				= $this->input->post('details');
			$deal_array['deal_status'] 	   		    = intval((bool)$this->input->post('is_disable'));
			$deal_array['deal_hot_count'] 	   		= $this->input->post('deal_hot_count');			
			$insertID 								= $this->Admin_model->update_deal($deal_array);
			
			//Storing insertion status message.
			if($insertID){
			$data['active_menu'] 	= 'dashboard';
			$data['deals'] 	= $this->Deal_model->getDeal();
			$data['page_title']	 	=  'Deals';
			$data['middle_content'] = 'admin/deal_listing';
			$this->view('templates/admin_template', $data);	
			}else{
			$this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
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
	
	/**
   * This function deletes a onlineApplications from the database
   * and redirects back to the listing
   * @param int $id
   */
  	public function deleteFaculty($id = null) 
  	{
    if ($id == null)
      show_error('No identifier provided', 500);
		else 
		{
		  $this->Admin_model->removeFaculty($id);
		  redirect('admin/dashboard/facultyListing'); // back to the listing
		}
   }
	
 
 
  function addCategory($id = null)
	{
		$data['active_menu'] 	= 'category';
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		  //set validation rules
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('sequence', 'Category Sequence', 'trim|required');
		
		//validate form input
		if ($this->form_validation->run() == FALSE)
		{   // fails
		 
		 if($id != null) {
		 $category 					= $this->Admin_model->getCategory($id);
		 $data['id']				= $category['id'];
		 $data['category_name']		= $category['category_name'];
		 $data['sequence']			= $category['sequence'];
		 $data['is_menu']			= $category['is_menu'];
		 $data['status']			= $category['status'];
		 }
		 else
		 {
		 $data['id']				= '';
		 $data['category_name']		= $this->input->post('category_name');
		 $data['sequence']			= $this->input->post('sequence');
		 $data['is_menu']			= intval((bool)$this->input->post('is_menu'));
		 $data['status']			= intval((bool)$this->input->post('status'));
		 }
		 $data['page_title']	=  'Dashboard';
		 $data['middle_content'] = 'admin/add_category';
		 $this->view('templates/admin_template', $data);
		}
		else
		{
		 $category_array = array();
		 if($id == null)
		 $category_array['id']		    		= false;
		 else
		 $category_array['id']		    		= $id;
		 
		 $category_array['category_name'] 		= $this->input->post('category_name');
		 $category_array['sequence']  			= $this->input->post('sequence');
		 $category_array['is_menu'] 			= intval((bool)$this->input->post('is_menu'));
		 $category_array['status'] 				= intval((bool)$this->input->post('status'));
		 $this->Admin_model->save_category($category_array);

		 redirect('admin/dashboard/categoryListing');		
		 }
		
		}
	}
 
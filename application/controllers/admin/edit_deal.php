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
		$data['deals'] 	= $this->Deal_model->getDeal();
		$data['page_title']	 	=  'Deals';
		$data['middle_content'] = 'admin/deal_listing';
		$this->view('templates/admin_template', $data);	
	}
	
	function addNotification($id = null)
	{
		$data['active_menu'] 	= 'notification';
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		  //set validation rules
		$this->form_validation->set_rules('title', 'Notification Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Notification Description', 'trim|required');
		$this->form_validation->set_rules('fromdate', 'From Date', 'trim|required');
		$this->form_validation->set_rules('todate', 'To Date', 'trim|required');
		
		//validate form input
		if ($this->form_validation->run() == FALSE)
		{   // fails
		 
		 if($id != null) {
		 $notifications 		= $this->Admin_model->getNotification($id);
		 $data['id']			= $notifications['id'];
		 $data['title']			= $notifications['title'];
		 $data['description']	= $notifications['description'];
		 $data['fromdate']		= date('m/d/Y', strtotime($notifications['fromdate']));
		 $data['todate']		= date('m/d/Y', strtotime($notifications['todate']));
		 }
		 else
		 {
		 $data['id']			= '';
		 $data['title']			= $this->input->post('title');
		 $data['description']	= $this->input->post('description');
		 $data['fromdate']		= $this->input->post('fromdate');
		 $data['todate']		= $this->input->post('todate');
		 }
		 $data['page_title']	=  'Dashboard';
		 $data['middle_content'] = 'admin/add_notification';
		 $this->view('templates/admin_template', $data);
		}
		else
		{
		 $notification_array = array();
		 if($id == null)
		 $notification_array['id']		    	= false;
		 else
		 $notification_array['id']		    	= $id;
		 
		 $notification_array['title'] 		= $this->input->post('title');
		 $notification_array['description'] = $this->input->post('description');
		 $notification_array['fromdate'] 	= date('Y-m-d', strtotime($this->input->post('fromdate')));
		 $notification_array['todate'] 		= date('Y-m-d', strtotime($this->input->post('todate')));
		 $notification_array['active'] 		= 1;
		
		 $config['upload_path'] = 'uploads/notifications/';
		 $config['allowed_types'] = 'jpg|png|pdf|docx|doc';
		
		 $this->load->library('upload', $config);
		 if ($_FILES['userfile']['tmp_name']!='' && !$this->upload->do_upload('userfile'))
		 {
		 $data['error']		 	 =  $this->upload->display_errors();
		 $data['page_title']	 =  'Dashboard';
		 $data['middle_content'] = 'admin/add_notification';
		 $this->view('templates/admin_template', $data);
		 }
		 else
		 {
			 if($_FILES['userfile']['tmp_name']!='') {
			 $upload_data = $this->upload->data(); 
			 //Returns array of containing all of the data related to the file you uploaded.
			 $file_name = $upload_data['file_name'];
			 //Transfering data to Model
			 $notification_array['filename']     = $file_name;
			 }
		
		 $this->Admin_model->save_notification($notification_array);

		 redirect('admin/dashboard/notificationListing');		
		 }
		
		}
	}
	
  /**
   * This function will display the list of notifications
   * data coming from the model
   */
  	public function notificationListing() 
	{
		$data['notifications'] = $this->Admin_model->getNotification();
		$data['page_title']	 =  'Notifications';
		$data['active_menu'] 	= 'notification';
		$data['middle_content'] = 'admin/notification_listing';
		$this->view('templates/admin_template', $data);		
  	}
	
	/**
   * This function will display the list of notifications
   * data coming from the model
   */
  	public function examinationListing() 
	{
		$data['examination'] 	= $this->Admin_model->getExamination();
		$data['page_title']	 	=  'Examination';
		$data['active_menu'] 	= 'examination';
		$data['middle_content'] = 'admin/examination_listing';
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
  	public function deleteNotification($id = null) 
  	{
    if ($id == null)
      show_error('No identifier provided', 500);
    else 
	{
      $this->Admin_model->removeNotification($id);
      redirect('admin/dashboard'); // back to the listing
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
	
	
	function add_faculty($id = null)
	{
		$data['active_menu'] 	= 'faculty';
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		  //set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('designation', 'designation', 'trim|required');
		$this->form_validation->set_rules('profile', 'profile', 'trim|required');
		
		//validate form input
		if ($this->form_validation->run() == FALSE)
		{   // fails
		 
		 $data['departments']	= $this->Admin_model->getDepartments();
	
		 if ($id != null) {
		 $faculty 				= $this->Admin_model->getFaculty($id);
		 $data['name']			= $faculty['name'];
		 $data['id']			= $faculty['id'];
		 $data['designation']	= $faculty['designation'];
		 $data['profile']		= $faculty['profile'];
		 $data['department_id']	= $faculty['department_id'];
		 }
		 else
		 {
		 $data['id']			= '';
		 $data['name']			= $this->input->post('name');
		 $data['designation']	= $this->input->post('designation');
		 $data['profile']		= $this->input->post('profile');
		 $data['department_id']	= $this->input->post('department');
		 }
		 $data['page_title']	=  'Dashboard';
		 $data['middle_content'] = 'admin/add_faculty';
		 $this->view('templates/admin_template', $data);
		}
		else
		{
		
		 $faculty_array = array();
		 if($id == null)
		 $faculty_array['id']		    	= false;
		 else
		 $faculty_array['id']		    	= $id;
		 
		 $faculty_array['name'] 			= $this->input->post('name');
		 $faculty_array['designation'] 		= $this->input->post('designation');
		 $faculty_array['profile'] 			= $this->input->post('profile');
		 $faculty_array['department_id']	= $this->input->post('department');
		
		 $config['upload_path'] 			= 'uploads/faculty_pics/';
		 $config['allowed_types'] 			= 'jpg|png';
		 $config['quality'] = "100%";
		 $config['width'] = 130;
		 $config['height'] = 160;
		 
		 $this->load->library('upload', $config);
		 if($_FILES['userfile']['tmp_name']!='' && !$this->upload->do_upload('userfile'))
		 {
		 $data['error']		 	 =  $this->upload->display_errors();
		 $data['page_title']	 =  'Dashboard';
		 $data['middle_content'] = 'admin/add_faculty';
		 $this->view('templates/admin_template', $data);
		 }
		 else
		 {
		 
		 if ($_FILES['userfile']['tmp_name']!='') {
		 $upload_data = $this->upload->data(); 
		 //Returns array of containing all of the data related to the file you uploaded.
		 $file_name = $upload_data['file_name'];
		 //Transfering data to Model
		 $faculty_array['photo']     = $file_name;
		 }
	
		 $this->Admin_model->save_faculty($faculty_array);
		
		 redirect('admin/dashboard/facultyListing');		
		 }
		
		}
	}
	
	/**
   * This function will display the list of faculties
   * data coming from the model
   */
  	public function facultyListing() 
	{
		$data['faculty'] 			= $this->Admin_model->getFaculty();
		$data['departments']		= $this->Admin_model->getDepartments();
		$data['page_title']	 		= 'faculty';
		$data['active_menu'] 		= 'faculty';
		$data['middle_content'] 	= 'admin/faculty_listing';
		$this->view('templates/admin_template', $data);		
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
	
 
 
  function addExamination($id = null)
	{
		$data['active_menu'] 	= 'examination';
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		  //set validation rules
		$this->form_validation->set_rules('title', 'Notification Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Notification Description', 'trim|required');
		$this->form_validation->set_rules('fromdate', 'From Date', 'trim|required');
		$this->form_validation->set_rules('todate', 'To Date', 'trim|required');
		
		//validate form input
		if ($this->form_validation->run() == FALSE)
		{   // fails
		 
		 if($id != null) {
		 $examinations 			= $this->Admin_model->getExamination($id);
		 $data['id']			= $examinations['id'];
		 $data['title']			= $examinations['title'];
		 $data['description']	= $examinations['description'];
		 $data['fromdate']		= date('m/d/Y', strtotime($examinations['fromdate']));
		 $data['todate']		= date('m/d/Y', strtotime($examinations['todate']));
		 }
		 else
		 {
		 $data['id']			= '';
		 $data['title']			= $this->input->post('title');
		 $data['description']	= $this->input->post('description');
		 $data['fromdate']		= $this->input->post('fromdate');
		 $data['todate']		= $this->input->post('todate');
		 }
		 $data['page_title']	=  'Dashboard';
		 $data['middle_content'] = 'admin/add_examination';
		 $this->view('templates/admin_template', $data);
		}
		else
		{
		 $examination_array = array();
		 if($id == null)
		 $examination_array['id']		    	= false;
		 else
		 $examination_array['id']		    	= $id;
		 
		 $examination_array['title'] 		= $this->input->post('title');
		 $examination_array['description']  = $this->input->post('description');
		 $examination_array['fromdate'] 	= date('Y-m-d', strtotime($this->input->post('fromdate')));
		 $examination_array['todate'] 		= date('Y-m-d', strtotime($this->input->post('todate')));
		 $examination_array['active'] 		= 1;
		
		 $config['upload_path'] = 'uploads/examination/';
		 $config['allowed_types'] = 'jpg|png|pdf|docx|doc';
		
		 $this->load->library('upload', $config);
		 if ($_FILES['userfile']['tmp_name']!='' && !$this->upload->do_upload('userfile'))
		 {
		 $data['error']		 	 =  $this->upload->display_errors();
		 $data['page_title']	 =  'Dashboard';
		 $data['middle_content'] = 'admin/add_examination';
		 $this->view('templates/admin_template', $data);
		 }
		 else
		 {
		 if($_FILES['userfile']['tmp_name']!='') {
		 $upload_data = $this->upload->data(); 
		 //Returns array of containing all of the data related to the file you uploaded.
		 $file_name = $upload_data['file_name'];
		 //Transfering data to Model
		 $examination_array['filename']     = $file_name;
		 }
		 $this->Admin_model->save_examination($examination_array);

		 redirect('admin/dashboard/examinationListing');		
		 }
		
		}
	}
 
 
  
}
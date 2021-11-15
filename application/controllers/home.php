<?php
class Home extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();		
		$this->load->model('Login_model');
		$this->load->helper('cookie');
		$this->load->model('Deal_model');
		// Load session library
		$this->load->library('session');
		$this->load->helper('form');
		
	}
	
	function index()
	{		
		if($this->session->userdata('email')=='')
		$this->authenticate();
		$data['page_title'] 			= 'Desi Deals';			
		$data['active_menu'] 			= 'home';
		$data['categories']				= $this->Deal_model->get_categories();
		$data['facebook_login_url'] 	= $this->facebook_login_url;
		$data['user_profile'] 			= $this->user_profile;
		$data['deals'] 					= $this->Deal_model->getDeal();
		$data['my_hot_deals']  			= $this->Deal_model->get_my_hot_cold_records($this->session->userdata('userid'));
		$data['middle_content'] 		= 'frontend/home';					
		$this->load->view('templates/template', $data);		
		
	}
	
	function facebook_login()
	{
		$user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me?fields=id,name,link,email,gender');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }

        if ($user) {
            $data['logout_url'] = site_url('welcome/logout'); // Logs off application
            $user_array = array();
		 	$user_array['name'] 				= $data['user_profile']['name'];
			$user_array['pass'] 				= '';
			$user_array['email'] 				= $data['user_profile']['email'];
			$user_array['gender'] 				= $data['user_profile']['gender'];
			$user_array['profile_picture'] 		= "https://graph.facebook.com/".$data['user_profile']['id']."/picture?type=large";
			$user_array['newslater_subscriber'] = '';
			$user_array['joindate'] 			= date('Y-m-d H:i:s');
			$user_array['status'] 				= '1';
			$user_array['login_type'] 			= 'facebook';
			$this->login($user_array);		

        } else {
            $data['login_url'] = $facebook_login_url;
        }

	}

    public function logout(){
        $this->load->library('facebook');
        // Logs off session from website
        $this->facebook->destroySession();
		
		// Destroy session data
		$this->session->sess_destroy();
		$this->session->set_userdata('email', '');
	 	$this->session->set_userdata('userid', '');
		//destroy any previously set cookie
		delete_cookie("userid");
		delete_cookie("email");
		
        // Make sure you destory website session as well.
        redirect('/home');
    }
	
	public function login($user_array = null)
	{ 
	 $data = $this->Login_model->userLogin($user_array['email'],$user_array);
	//change it to something like 30*24*60*60 to remember user for 30 days
     set_cookie('userid',$data['id'], 30*24*60*60);
     set_cookie('email', $data['email'], 30*24*60*60);
	 $this->session->set_userdata('email', $data['email']);
	 $this->session->set_userdata('userid', $data['id']);
	 
	 redirect('/');
	}
	
	
	public function authenticate() {
        //check the cookie
        if(get_cookie('userid')!='' && get_cookie('email')!='') {
		
            //cookie found, is it really someone from the
			$data = $this->Login_model->getUserDetails(get_cookie('userid'));
            if($data['email']!='') {
                 $this->session->set_userdata('email', $data['email']);
	 			 $this->session->set_userdata('userid', $data['id']);
				redirect('/home');
            }
            else {
               // Destroy session data
				$this->session->sess_destroy();
				redirect('/home');
            }        
    	}
	}
	
	
	function make_hot_cold()
	{	
		$this->load->helper('form');	
		$data['deal_id'] 	=  $this->input->post('deal_id');
		$data['user_id'] 	=  $this->session->userdata('userid');
		$data['is_cold']  	=  $this->input->post('is_cold');	
		echo $this->Deal_model->save_hot_cold($data);
	}
	
	function get_deals()
	{
	 $search_data = $this->input->post('search_data');
     return $this->Deal_model->searchDeal($search_data);
  	}
	
}
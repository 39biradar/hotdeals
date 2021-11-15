<?php

/**
 * The base controller which is used by the Front and the Admin controllers
 */
class Base_Controller extends CI_Controller
{
	
	public function __construct()
	{
		
		parent::__construct();

		//kill any references to the following methods
		$mthd = $this->router->method;
		if($mthd == 'view' || $mthd == 'partial' || $mthd == 'set_template')
		{
			show_404();
		}
		
		//load base libraries, helpers and models
		$this->load->database();
		
		//load the default libraries
		$this->load->library(array('session', 'auth'));
				
        //if SSL is enabled in config force it here.
        if (config_item('ssl_support') && (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off'))
		{
			$CI =& get_instance();
			$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
			redirect($CI->uri->uri_string());
		}
	}
	
}//end Base_Controller

class Front_Controller extends Base_Controller
{
	
	//we collect the categories automatically with each load rather than for each function
	//this just cuts the codebase down a bit
	var $categories	= '';
	
	//load all the pages into this variable so we can call it from all the methods
	var $pages = '';
	
	// determine whether to display gift card link on all cart pages
	//  This is Not the place to enable gift cards. It is a setting that is loaded during instantiation.
	var $gift_cards_enabled;
	
	function __construct(){
		
		parent::__construct();

		$this->load->library('facebook');
		$this->load->model('Login_model');

		//load common language
		$this->lang->load('common');
		$this->load->helper('form');
		$this->facebook_login_url = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('home/facebook_login'), 
                'scope' => array("email") // permissions here
            ));	
		if($this->session->userdata('email')!='')
		$this->user_profile				= $this->Login_model->getUserData($this->session->userdata('email'));
			
	}
	
	/*
	This works exactly like the regular $this->load->view()
	The difference is it automatically pulls in a header and footer.
	*/
	function view($view, $vars = array(), $string=false)
	{
		if($string)
		{
			$result	 = $this->load->view('frontend/header', $vars, true);
            $result	.= $this->load->view('frontend/cart', $vars, true);
            $result	.= $this->load->view('frontend/menu', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view('frontend/footer', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view('frontend/header', $vars);
            $this->load->view('frontend/menu', $vars);
			$this->load->view($view, $vars);
			$this->load->view('frontend/footer', $vars);
		}
	}
	
	/*
	This function simply calls $this->load->view()
	*/
	function partial($view, $vars = array(), $string=false)
	{
		if($string)
		{
			return $this->load->view($view, $vars, true);
		}
		else
		{
			$this->load->view($view, $vars);
		}
	}
}

class Admin_Controller extends Base_Controller 
{
	
	private $template;
	
	function __construct()
	{
		parent::__construct();
		
		$this->auth->is_logged_in(uri_string());
		
	}
	
	function view($view, $vars = array(), $string=false)
	{
		$this->load->view($view, $vars);
	}	
	
}
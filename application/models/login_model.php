<?php

Class Login_model extends CI_Model
{
    var $CI;

    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->database(); 
        $this->CI->load->helper('url');
    }

    function save_onlineapplication($application_array)
    {     
         $this->db->insert('student_registration', $application_array);
         $application_id =  $this->db->insert_id();  
			
		if ($application_id)
        {
			$registration_code = "mec-000".$application_id;
			$this->db->set('registration_number',$registration_code)->where('id',$application_id)->update('student_registration');
			return $registration_code;
        }   
    }
	

	public function userLogin($email = null,$user_array) 
	{
	    
		$this->db->select()->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get();
		// where condition if id is present
		if ($query->num_rows() > 0) 
		{
			return $query->row_array(); // single row
		}
		else
		{
			$this->db->insert('users', $user_array);
			$user_id =  $this->db->insert_id();  
				
			if ($user_id)
			{
				$this->db->select()->from('users');
				$this->db->where('id', $user_id);
				$query = $this->db->get();
				return $query->row_array();
			}
		}
			
	}
	
	public function getUserData($email = null) 
	{
	    
		$this->db->select()->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query->row_array(); // single row
			
	}
	
	
  
   /**
   * This funtion takes id as a parameter and will fetch the record.
   * If id is not provided, then it will fetch all the records form the table.
   * @param int $id
   * @return mixed
   */
	public function getUserDetails($id = null) 
	{
		$this->db->select()->from('users');
		// where condition if id is present
		if ($id != null) 
			$this->db->where('id', $id);
					
		$query = $this->db->get();
		return $query->row_array(); // single row
		
	}
	
	
	
	
	/**
   * This funtion takes id as a parameter and will fetch the record.
   * If id is not provided, then it will fetch all the records form the table.
   * @param int $id
   * @return mixed
   */
	public function getFacultyByDepartment($department_id = null) 
	{
		$this->db->select()->from('staff_details');
		// where condition if id is present
		if ($department_id != null) 
			$this->db->where('department_id', $department_id);
		else 
			$this->db->order_by('id');
			
		$query = $this->db->get();
		return $query->result_array(); // array of result
	}
	
  /**
   * This funtion takes id as a parameter and will fetch the record.
   * If id is not provided, then it will fetch all the records form the table.
   * @param int $id
   * @return mixed
   */
	public function getFaculty($id = null) 
	{
		$this->db->select()->from('staff_details');
		// where condition if id is present
		if ($id != null) 
			$this->db->where('id', $id);
		else 
			$this->db->order_by('id');
			
		$query = $this->db->get();
		
		if ($id != null) 
			return $query->row_array(); // single row
		else 
			return $query->result_array(); // array of result
	}
	
  /**
   * This funtion takes id as a parameter and will fetch the record.
   * If id is not provided, then it will fetch all the records form the table.
   * @param int $id
   * @return mixed
   */
	public function getExamination() 
	{
		$this->db->select()->from('examination');
		$query = $this->db->get();
		return $query->result_array(); // array of result
	}
   

}
<?php

Class Admin_model extends CI_Model
{
    var $CI;

    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->database(); 
        $this->CI->load->helper('url');
    }

    function delete_deal($deal_id)
    {
		$deal['status']  = 0;
        $this->db->where('id', $deal_id);
		$this->db->update('deal', $deal);
		return $deal_id;
    }

    function update_deal($data)
    {
        if ($data['id'])
        {
			$this->db->where('id', $data['id']);
			$this->db->update('deal', $data);
			return $data['id'];
        }
        
    }
	
	function count_deal()
    {
		$this->db->select()->from('deal');
		return $this->db->count_all_results();
	}
	
	function count_comments()
    {
		$this->db->select()->from('comments');
		return $this->db->count_all_results();
	}
	
	function count_users()
    {
		$this->db->select()->from('users');
		return $this->db->count_all_results();
	}
	 
	 
	function save_category($category)
    {
        if ($category['id'])
        {
			$this->db->where('id', $category['id']);
			$this->db->update('category', $category);
			return $category['id'];
        }
        else
        {
            $this->db->insert('category', $category);
            return $this->db->insert_id();
        }
    }
	
	
  
	public function getUsers($id = null) 
	{
		$this->db->select()->from('users');
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
	
	
  
	public function getCategory($id = null) 
	{
		$this->db->select()->from('category');
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
	public function getOnlineApplications($id = null) 
	{
		$this->db->select()->from('student_registration');
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
   * This function will delete the record based on the id
   * @param $id
   */
  	public function removeExamination($id) {
    $this->db->where('id', $id);
    $this->db->delete('examination');
  	}
	
	/**
   * This function will delete the record based on the id
   * @param $id
   */
  	public function removeNotification($id) {
    $this->db->where('id', $id);
    $this->db->delete('notification');
  	}
	
  /**
   * This function will delete the OnlineApplication record based on the id
   * @param $id
   */
  	public function removeOnlineApplication($id) {
    $this->db->where('id', $id);
    $this->db->delete('student_registration');
  	}
	
	/**
   * This function will delete the Faculty record based on the id
   * @param $id
   */
  	public function removeFaculty($id) {
    $this->db->where('id', $id);
    $this->db->delete('staff_details');
  	}
	
  
  /**
   * This funtion used to get departments
   * @return mixed
   */
	public function getDepartments() 
	{
		$this->db->select()->from('department');
		$this->db->order_by('id');
		$query = $this->db->get();
		return $query->result_array(); 
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
	
	
	 function save_faculty($notification)
    {
        if ($notification['id'])
        {
			$this->db->where('id', $notification['id']);
			$this->db->update('staff_details', $notification);
			return $notification['id'];
        }
        else
        {
            $this->db->insert('staff_details', $notification);
            return $this->db->insert_id();
        }
    }

}
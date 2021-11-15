<?php

Class Deal_model extends CI_Model
{
    var $CI;

    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->database(); 
        $this->CI->load->helper('url');
    }

    function get_categories()
    {     
		$this->db->select()->from('category');
		$this->db->order_by('sequence');			
		$query = $this->db->get();
		return $query->result_array(); // array of result
    }
	

	public function insertDeal($deal_array) 
	{
			$this->db->insert('deal', $deal_array);
			$id =  $this->db->insert_id(); 
			if($id) 
			return $id;
			else
			return false;						
	}
	
	public function getDeal($id = null) 
	{
		$this->db->select('deal.*,users.name,users.profile_picture,category.category_name');    
		$this->db->from('deal');
		$this->db->join('users', 'deal.user_id = users.id');
		$this->db->join('category', 'deal.deal_category_id  = category.id');
		if ($id != null) 
		$this->db->where('deal.id', $id);
		$this->db->order_by('id','DESC');	
		$query = $this->db->get();
		
		if ($id != null) 
			return $query->row_array(); // single row
		else 
			return $query->result_array(); // array of result
	}
	
	public function getDealByCategory($categoryid = null) 
	{
		$this->db->select('deal.*,users.name,users.profile_picture,category.category_name');    
		$this->db->from('deal');
		$this->db->join('users', 'deal.user_id = users.id');
		$this->db->join('category', 'deal.deal_category_id  = category.id');
		$this->db->where('deal.deal_category_id', $categoryid);
		$this->db->order_by('id','DESC');	
		$query = $this->db->get();
		return $query->result_array(); // array of result
	}
	
	function save_comment($data)    
    {
        	
            $this->db->insert('comments', $data);
            $row_id = $this->db->insert_id();
			
			$this->db->select('comments.*,users.*');    
			$this->db->from('comments');
			$this->db->join('users', 'comments.user_id = users.id');
			$this->db->where('comments.id', $row_id);
			$this->db->order_by('date', 'DESC');
			$query = $this->db->get();
			$row_data = $query->row_array();
			
			$comment = '<li><img height="70" width="60" src="'.$row_data['profile_picture'].'"/><span style="color:#006182">'.$row_data['name'].'</span> &nbsp;<span style="color:#ccc;" class="timeago" title="'.date("c", $row_data['date']).'"></span><p style="margin-top:10px;">'.$row_data['message'].'</p></li>';         	      
		    return $comment;
        
    }
	
	function get_comments($deal_id)
	{		
		$this->db->select('comments.*,users.*');    
		$this->db->from('comments');
		$this->db->join('users', 'comments.user_id = users.id');
		$this->db->where('comments.deal_id', $deal_id);
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get();
		return $query->result();
		
	}
	
	function get_my_hot_cold_records($user_id)
	{		
		$this->db->select('deal_id');    
		$this->db->from('user_hot_deals');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$rows = array();
		foreach($query->result_array() as $row)
    	{    
        $rows[] = $row['deal_id']; //add the fetched result to the result array;
    	}
		
		return $rows;

		
	}
	
	function save_hot_cold($data)    
    {	
		$degree = $this->db->select('deal_hot_count')->from('deal')->where('id', $data['deal_id'])->get()->row()->deal_hot_count;
		if($data['is_cold'] == 'cold')
		$degree = $degree - 1;
		else
		$degree = $degree + 1;
				
		$this->db->set('deal_hot_count',$degree);
		$this->db->where('id', $data['deal_id']);
    	$this->db->update('deal');
		
		$hot_array = array('user_id' => $data['user_id'],'deal_id' => $data['deal_id']);
		$this->db->insert('user_hot_deals', $hot_array);     	      
		return $degree;
        
    }
	
	public function searchDeal($query) 
	{
		$this->db->select('*');
    	$this->db->like('deal_title', $query);
    	$query = $this->db->get('deal');
    	$row_set = '';
		if($query->num_rows() > 0){
      	foreach ($query->result_array() as $row){
        $row_set.= "<li><a href='" . base_url() . "submitdeal/details/" . $row['id'] . "'>" . $row['deal_title'] . "</a></li>";
      	}
    	}
		echo $row_set;		
	}
	
	public function search_deal_btn_action($searchquery = null) 
	{
		$this->db->select('deal.*,users.name,users.profile_picture');    
		$this->db->from('deal');
		$this->db->join('users', 'deal.user_id = users.id');
		$this->db->like('deal.deal_title', $searchquery);
		$this->db->order_by('id','DESC');	
		$query = $this->db->get();
		return $query->result_array(); // array of result
	}

}
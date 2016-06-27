<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {
	
	private $table 	= 'users';
	private $id 	= 'userid';

	public function __construct(){
        parent::__construct();
    }
	
	// VIEW USER LIST
	public function view_user_list($num, $offset, $sort_by, $order_by, $keyword){
		$query = "select a.userid, a.username, a.email, a.firstname, a.lastname, a.phone, b.groupname from users a left outer join groups b
					on a.groupid = b.groupid
					where a.username like '%".$keyword."%'
					or a.email like '%".$keyword."%' 
					or a.firstname like '%".$keyword."%' 
					or a.lastname like '%".$keyword."%'
					or a.phone like '%".$keyword."%' 
					or b.groupname like '%".$keyword."%' 
					order by ".$sort_by." ".$order_by."
					LIMIT ".$num." , ".$offset;
		$data = $this->db->query($query);
		
		return $data->result();
    }
	
	// VIEW USER GROUP
	public function view_user_group(){
		$data = $this->db->get('groups');
		
		return $data->result();
	}
	
	// COUNT USER
	public function count_user_list($sort_by, $order_by, $keyword){
		$query = "select a.userid, a.username, a.email, a.firstname, a.lastname, a.phone, b.groupname from users a left outer join groups b
					on a.groupid = b.groupid
					where a.username like '%".$keyword."%'
					or a.email like '%".$keyword."%' 
					or a.firstname like '%".$keyword."%' 
					or a.lastname like '%".$keyword."%'
					or a.phone like '%".$keyword."%' 
					or b.groupname like '%".$keyword."%' 
					order by ".$sort_by." ".$order_by;				
		$data = $this->db->query($query);
		
		return $data->num_rows();
	}
	
	//CHECK USERNAME
	function check_username($username){
		$this->db->where('username', $username);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	
	
	//CHECK EMAIL
	function check_email($email){
		$this->db->where('email', $email);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	//CHECK EMAIL EDIT
	function check_email_edit($email, $id){
		$this->db->where('email', $email);
		$this->db->where('userid !=', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
		
	
	
	
	
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_group_model extends MY_Model {
	
	private $table 	= 'groups';
	private $id 	= 'groupid';

	public function __construct(){
        parent::__construct();
    }
	
	// VIEW USER GROUP LIST
	public function view_user_group_list($num, $offset, $sort_by, $order_by, $keyword){
		$query = "select a.groupid, a.groupname, a.description, count(b.groupid) countgroup from groups a left outer join users b
					on a.groupid = b.groupid
					where a.groupname like '%".$keyword."%'
					or a.description like '%".$keyword."%' 	
					group by a.groupid, a.groupname, a.description 								
					order by ".$sort_by." ".$order_by."
					LIMIT ".$num." , ".$offset;
		$data = $this->db->query($query);
		
		return $data->result();
    }
	
	// COUNT USER GROUP
	public function count_user_group_list($sort_by, $order_by, $keyword){
		$query = "select a.groupid, a.groupname, a.description, count(b.groupid) countgroup from groups a left outer join users b
					on a.groupid = b.groupid
					where a.groupname like '%".$keyword."%'
					or a.description like '%".$keyword."%' 	
					group by a.groupid, a.groupname, a.description 								
					order by ".$sort_by." ".$order_by;				
		$data = $this->db->query($query);
		
		return $data->num_rows();
	}
	
	
	// GET USER GROUP
	public function get_user_group($id){
		if(!$id) return FALSE;
		
		$this->db->where($this->id, $id);
		$data = $this->db->get($this->table);
		
		return $data->row();
	}
	

	
	
		
		
	
	
	
	
	
}
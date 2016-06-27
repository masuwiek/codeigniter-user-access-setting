<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends MY_Model {
	
	private $table 	= 'menu';
	private $id 	= 'menuid';

	public function __construct(){
        parent::__construct();
    }
	
	// VIEW MENU PARENT LIST
	public function view_menu_parent_list($num, $offset, $sort_by, $order_by, $keyword){
		$query = "select menuid, menuparentid, menuname, menuicon, menulink, menucode, menuavail, menusort from menu
					where (menuname like '%".$keyword."%'
					or menulink like '%".$keyword."%' 
					or menucode like '%".$keyword."%')
					and menuparentid = 0 
					order by ".$sort_by." ".$order_by."
					LIMIT ".$num." , ".$offset;
		$data = $this->db->query($query);
		
		return $data->result();
    }
	
	// COUNT MENU PARENT
	public function count_menu_parent_list($sort_by, $order_by, $keyword){
		$query = "select menuid, menuparentid, menuname, menuicon, menulink, menucode, menuavail, menusort from menu
					where (menuname like '%".$keyword."%'
					or menulink like '%".$keyword."%' 
					or menucode like '%".$keyword."%')
					and menuparentid = 0 
					order by ".$sort_by." ".$order_by;				
		$data = $this->db->query($query);
		
		return $data->num_rows();
	}
	
	// VIEW MENU CHILD LIST
	public function view_menu_child_list($num, $offset, $sort_by, $order_by, $keyword, $id){
		$query = "select menuid, menuparentid, menuname, menuicon, menulink, menucode, menuavail, menusort from menu
					where (menuname like '%".$keyword."%'
					or menulink like '%".$keyword."%' 
					or menucode like '%".$keyword."%') 
					and menuparentid = ".$id."
					order by ".$sort_by." ".$order_by."
					LIMIT ".$num." , ".$offset;
		$data = $this->db->query($query);
		
		return $data->result();
    }
	
	// COUNT MENU CHILD
	public function count_menu_child_list($sort_by, $order_by, $keyword, $id){
		$query = "select menuid, menuparentid, menuname, menuicon, menulink, menucode, menuavail, menusort from menu
					where (menuname like '%".$keyword."%'
					or menulink like '%".$keyword."%' 
					or menucode like '%".$keyword."%') 
					and menuparentid = ".$id."
					order by ".$sort_by." ".$order_by;				
		$data = $this->db->query($query);
		
		return $data->num_rows();
	}
	
	
	
		
		
	
	
	
	
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acl extends CI_Model {

	function __construct(){
        parent::__construct();
    }	
	
//-----------------------------------------------------------------------------------------------------------

	//VIEW LEFT MENU
	function left_menu(){
		$query = "select * from menu where menuparentid = '' order by menusort";
		$data = $this->db->query($query);
		return $data;
	}
	
	function left_menu_child($id){
		$query = "select * from menu where menuparentid = '".$id."' order by menusort";
		$data = $this->db->query($query);
		return $data;
	}
	
	// ACCESS CONTROL LIST (action: view, add, edit, del)
 	function access($action, $menucode){
		$query = "SELECT count(a.menuaccessid) menuview 
					FROM menuaccess a left join menu b on a.menuid=b.menuid 
					where b.menucode= '".$menucode."' and a.groupid= '".$this->session->userdata('groupid')."' and  a.".$action." = 1";
		$data = $this->db->query($query);
		return $data->row();
	}	
	
	
//-----------------------------------------------------------------------------------------------------------


	
}


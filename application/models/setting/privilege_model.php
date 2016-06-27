<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privilege_model extends MY_Model {
	

	public function __construct(){
        parent::__construct();
    }
	
	// VIEW USER PRIVILEGE
	public function view_user_privilege($id){
		if(!$id) return FALSE;
		
		$query = "select a.menuaccessid, b.menuid as menus, a.menuid, b.menuname, a.groupid, b.menuparent, c.groupname, a.view, a.add, a.edit, a.del, b.menuavail
					from (select * from menuaccess where groupid = '".$id."') a
					right join (select a.*, b.menuname as menuparent from menu a left join menu b on a.menuparentid = b.menuid) b
					on a.menuid = b.menuid
					left join groups c
					on a.groupid = c.groupid
					order by menuparent";
		$data = $this->db->query($query);
		
		return $data->result();
	
	}
	


		
	
	
	
	
	
}
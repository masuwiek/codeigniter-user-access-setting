<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privilege extends MY_Controller {
	
	function __construct(){
        parent::__construct();   
		$this->load->model('setting/privilege_model', 'privilege');
	}
	
	// TABLE LIST
	public function index(){		
				
	}
	
	// ADD DATA
	public function configuration($id=null){
		$access = $this->acl->access('edit','user_group');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$this->_set_rules_privilege();
		if($this->form_validation->run() == false){
			$data['title'] 			= 'Privilege Setting';
			$data['subtitle'] 		= "";
			$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
										<li><i class="fa fa-angle-right"></i>Privilege</li>';
			$data['privilege'] 		= $this->privilege->view_user_privilege($id);
			$data['groupid']		= $id;
			$data['groupname']		= $this->privilege->get('groups', 'groupid', $id);
			$data['content'] 		= 'setting/privilege_list';
		
			$this->load->view('main', $data);
		}else{
			$delete = $this->privilege->delete('menuaccess', 'groupid', $id);
			
			if($delete==TRUE){
				$menu 	= $this->input->post('menuid');			
			
				foreach($menu as $row=>$menuid){
					$view 	= isset($_REQUEST['view'][$menuid]);
					$add 	= isset($_REQUEST['add'][$menuid]);
					$edit 	= isset($_REQUEST['edit'][$menuid]);
					$del 	= isset($_REQUEST['del'][$menuid]);		
				
					$data = array(
						'menuid' 	=> $menuid,
						'groupid' 	=> $id,
						'view' 		=> $view,
						'add' 		=> $add,
						'edit' 		=> $edit,
						'del' 		=> $del,
					);
					
					$this->privilege->save('menuaccess', $data);				
				}
				
				$url = base_url()."setting/user_group";
				redirect($url);
			}else{
				echo "Gagal";
			}
			
		}
	}
	
	function _set_rules_privilege(){
		$this->form_validation->set_rules('menuid','Menu','');
	}
	
		
}

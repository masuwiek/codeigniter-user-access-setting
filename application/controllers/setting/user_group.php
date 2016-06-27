<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_group extends MY_Controller {
	
	private $table  	= 'groups';
	private $tableid	= 'groupid';
	
	function __construct(){
        parent::__construct();   
		$this->load->model('setting/user_group_model', 'group');		
	}
	
	// TABLE LIST
	public function index(){
		$access = $this->acl->access('view','user_group');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$data['title'] 			= 'Setting User Group';
		$data['subtitle'] 		= '';
		$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
									<li><i class="fa fa-angle-right"></i>User Group</li>';
		$data['content'] 		= 'setting/user_group_list';
		
		
		
		// SORT BY CONFIG -----------------------------------------------------
		$data['sort_setting']	= 	array(
									'form_action'	=> base_url().'setting/user_group/index/',
									'menu_url'		=> base_url().'setting/user_group',						
								);
								
		$data['sort_by']		= 	array(
									'groupname'		=> 'Group Name',
									'description'	=> 'Description',
									'countgroup'	=> 'User in this Group',
								);
		
		$default_sort_column	= 'groupname';
		$default_sort_order		= 'ASC';
								
		if(isset($_GET['sort_by']) AND isset($_GET['order_by']) AND isset($_GET['keyword'])){
			$sort_by = ($_GET['sort_by'] != '')?$_GET['sort_by']:$default_sort_column;
			$order_by = ($_GET['order_by'] != '')?$_GET['order_by']:$default_sort_order;
			$keyword = ($_GET['keyword'] != '')?$_GET['keyword']:'';
		}else{
			$sort_by = $default_sort_column;
			$order_by = $default_sort_order;
			$keyword = "";
		}
		// --------------------------------------------------------------------
		
		// PAGINATION CONFIG --------------------------------------------------	
		$pageconf 						= $this->config->item('page');		
		$pageconf['base_url']			= base_url().'setting/user_group/index';
		$pageconf['first_url']			= $pageconf['base_url'].'?'. http_build_query($_GET, '', "&");
		$pageconf['total_rows']			= $this->group->count_user_group_list($sort_by, $order_by, $keyword);
		$pageconf['per_page']			= isset($_GET['per_page'])?$_GET['per_page']:'10';		
		$pageconf['suffix']				= '?' . http_build_query($_GET, '', "&");
		$pageconf['uri_segment']		= 4;
		$this->pagination->initialize($pageconf);
		$data['paging'] = $this->pagination->create_links();
		
		$from = ($this->uri->segment(4) != '')?$this->uri->segment(4):1;
		$from = ($from - 1) * $pageconf['per_page'];
		// --------------------------------------------------------------------		
		
		$data['datacount'] 		= $pageconf['total_rows'];
		$data['tablelist']		= $this->group->view_user_group_list($from, $pageconf['per_page'], $sort_by, $order_by, $keyword);		
		
		$data['per_page']		= $pageconf['per_page'];		
		
		$this->load->view('main', $data);
		
	}
	
	// ADD DATA
	public function add_user_group(){
		$access = $this->acl->access('add','user_group');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$this->_set_rules_user_group();
		if($this->form_validation->run() == false){
			$data['title'] 			= 'Add New Data';
			$data['subtitle'] 		= "";
			$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/user_group">User Group</a></li>
										<li><i class="fa fa-angle-right"></i>Add New User Group</li>';
			$data['content'] 		= 'setting/user_group_add';
		
			$this->load->view('main', $data);
		}else{
			$data = array(
				'groupname' 	=> $this->input->post('groupname'),
				'description'	=> $this->input->post('description'),
			);
			
			$result = $this->group->save($this->table, $data);
			
			$message = ($result)?'Data berhasil ditambahkan':'Data Gagal ditambahkan';			
			$this->session->set_flashdata('message', $message);
			
			$url = base_url()."setting/user_group";
			redirect($url);
		}
	}
	
	// EDIT DATA
	public function edit_user_group($id=null){
		$access = $this->acl->access('edit','user_group');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$this->_set_rules_user_group();
		if($this->form_validation->run() == false){
			$data['title'] 			= 'Data Update';
			$data['subtitle'] 		= "";
			$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/user_group">User Group</a></li>
										<li><i class="fa fa-angle-right"></i>User Group Update</li>';
			$data['content'] 		= 'setting/user_group_edit';
			
			$data['group']			= $this->group->get($this->table, $this->tableid, $id);
		
			$this->load->view('main', $data);
		}else{
			$data = array(
				'groupname' 	=> $this->input->post('groupname'),
				'description'	=> $this->input->post('description'),
			);
			
			
			$result = $this->group->edit($this->table, $this->tableid, $id, $data);
			
			$message = ($result)?'Data berhasil di-update':'Data Gagal di-update';			
			$this->session->set_flashdata('message', $message);
			
			$url = base_url()."setting/user_group";
			redirect($url);
		}
	}
	
	// DELETE DATA
	public function delete_user_group($id=null){
		
		$access = $this->acl->access('del','user_group');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$result = $this->group->delete($this->table, $this->tableid, $id);
		
		$message = ($result)?'Data berhasil dihapus':'Data Gagal dihapus';			
		$this->session->set_flashdata('message', $message);
		
		$url = base_url()."setting/user_group";
		redirect($url);
	}
	
	// VALIDATION
	public function _set_rules_user_group(){
		$this->form_validation->set_rules('groupname','Group Name','required|trim');
		$this->form_validation->set_rules('description','Description','');
	}
	
		
}

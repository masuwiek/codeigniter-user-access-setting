<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MY_Controller {
	
	private $table 		= 'menu';
	private $tableid 	= 'menuid';
	
	function __construct(){
        parent::__construct();   
		$this->load->model('setting/menu_model', 'menu');
	}
	
	// TABLE LIST MENU PARENT
	public function index(){		
		$access = $this->acl->access('view','menu');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$data['title'] 			= 'Setting Menu';
		$data['subtitle'] 		= '';
		$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
									<li><i class="fa fa-angle-right"></i>Menu</li>';
		$data['content'] 		= 'setting/menu_parent_list';		
		
		
		// SORT BY CONFIG -----------------------------------------------------
		$data['sort_setting']	= 	array(
									'form_action'	=> base_url().'setting/menu/index/',
									'menu_url'		=> base_url().'setting/menu',						
								);
								
		$data['sort_by']		= 	array(
									'menuname'		=> 'Menu Name',
									'menucode'		=> 'Menu Code',
									'menulink'		=> 'Link',
								);
		
		$default_sort_column	= 'menusort';
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
		$pageconf['base_url']			= base_url().'setting/menu/index';
		$pageconf['first_url']			= $pageconf['base_url'].'?'. http_build_query($_GET, '', "&");
		$pageconf['total_rows']			= $this->menu->count_menu_parent_list($sort_by, $order_by, $keyword);
		$pageconf['per_page']			= isset($_GET['per_page'])?$_GET['per_page']:'10';		
		$pageconf['suffix']				= '?' . http_build_query($_GET, '', "&");
		$pageconf['uri_segment']		= 4;
		$this->pagination->initialize($pageconf);
		$data['paging'] = $this->pagination->create_links();
		
		$from = ($this->uri->segment(4) != '')?$this->uri->segment(4):1;
		$from = ($from - 1) * $pageconf['per_page'];
		// --------------------------------------------------------------------		
		
		$data['datacount'] 		= $pageconf['total_rows'];
		$data['tablelist']		= $this->menu->view_menu_parent_list($from, $pageconf['per_page'], $sort_by, $order_by, $keyword);		
		
		$data['per_page']		= $pageconf['per_page'];		
		
		$this->load->view('main', $data);
		
	}
	
	// ADD DATA	MENU PARENT
	public function add_menu_parent(){
		$access = $this->acl->access('add','menu');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$this->_set_rules_menu();
		if($this->form_validation->run() == false){
			$data['title'] 			= 'Add New Data';
			$data['subtitle'] 		= "";
			$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/menu">Menu</a></li>
										<li><i class="fa fa-angle-right"></i>Add New Parent Menu</li>';
			$data['content'] 		= 'setting/menu_parent_add';
		
			$this->load->view('main', $data);
		}else{
			//Menu Available
			$avail = "";
			$menuavail = $this->input->post('menuavail');			
			foreach($menuavail as $obj => $value){
				$avail 	.= $value.",";
				$view 	.= ($value=='view')?1:'';
				$add 	.= ($value=='add')?1:'';
				$edit 	.= ($value=='edit')?1:'';
				$del 	.= ($value=='del')?1:'';
			}
			$avail = substr($avail, 0, -1);
			
			$data = array(
				'menuname' 			=> $this->input->post('menuname'),
				'menuparentid'		=> 0,
				'menuicon' 			=> $this->input->post('menuicon'),
				'menulink' 			=> $this->input->post('menulink'),
				'menuavail' 		=> $avail,
				'menucode' 			=> $this->input->post('menucode'),
				'menusort' 			=> $this->input->post('menusort'),
			);
			
			$menuid = $this->menu->save_get_id($this->table, $data);
			
			if($menuid != null){
				
				$datagroup = array(
					'menuid'	=> $menuid,
					'groupid'	=> 1,
					'view'		=> $view,
					'add'		=> $add,
					'edit'		=> $edit,
					'del'		=> $del,
					
				);
								
				$result = $this->menu->save('menuaccess', $datagroup);
				
				$message = ($result)?'Data berhasil ditambahkan':'Data Gagal ditambahkan';			
				$this->session->set_flashdata('message', $message);
				
				$url = base_url()."setting/menu";
				redirect($url);				
				
			}else{
				$message = 'Data Gagal ditambahkan';			
				$this->session->set_flashdata('message', $message);
				
				$url = base_url()."setting/menu";
				redirect($url);
			}
			
			
		}
	}
	
	// EDIT DATA MENU PARENT
	public function edit_menu_parent($id=null){
		$access = $this->acl->access('edit','menu');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$this->_set_rules_menu();
		if($this->form_validation->run() == false){
			$data['title'] 			= 'Data Update';
			$data['subtitle'] 		= "";
			$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/menu">Menu</a></li>
										<li><i class="fa fa-angle-right"></i>Menu Parent Update</li>';
			$data['content'] 		= 'setting/menu_parent_edit';
			
			$data['menu']				= $this->menu->get($this->table, $this->tableid, $id);
		
			$this->load->view('main', $data);
		}else{
			//Menu Available
			$avail = "";
			$menuavail = $this->input->post('menuavail');			
			foreach($menuavail as $obj => $value){
				$avail .= $value.",";				
			}
			$avail = substr($avail, 0, -1);
			
			$data = array(
				'menuname' 			=> $this->input->post('menuname'),
				'menuparentid'		=> 0,
				'menuicon' 			=> $this->input->post('menuicon'),
				'menulink' 			=> $this->input->post('menulink'),
				'menuavail' 		=> $avail,
				'menucode' 			=> $this->input->post('menucode'),
				'menusort' 			=> $this->input->post('menusort'),
			);
			
			$result = $this->menu->edit($this->table, $this->tableid, $id, $data);
			
			$message = ($result)?'Data berhasil di-update':'Data Gagal di-update';			
			$this->session->set_flashdata('message', $message);
			
			$url = base_url()."setting/menu";
			redirect($url);
		}
	}
	
	// DELETE DATA MENU PARENT
	public function delete_menu_parent($id=null){		
		$access = $this->acl->access('del','menu');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$result = $this->menu->delete($this->table, $this->tableid, $id);
		
		$message = ($result)?'Data berhasil dihapus':'Data Gagal dihapus';			
		$this->session->set_flashdata('message', $message);
		
		$url = base_url()."setting/menu";
		redirect($url);
	}	
	
	// MENU CHILD------------------------------------------------------------------------
	
	// MENU CHILD LIST
	public function menu_child($id=null){		
		$access = $this->acl->access('view','menu');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		if($id==null){
			$url = base_url()."setting/menu";
			redirect($url);
		}
		
		$data['title'] 			= 'Setting Child Menu';
		$data['subtitle'] 		= '';
		$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
									<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/menu">Menu</a></li>
									<li><i class="fa fa-angle-right"></i>Menu Child</li>';
		
		$data['parentid']		= $id;		
		$data['content'] 		= 'setting/menu_child_list';		
		
		
		// SORT BY CONFIG -----------------------------------------------------
		$data['sort_setting']	= 	array(
									'form_action'	=> base_url().'setting/menu/menu_child/'.$id,
									'menu_url'		=> base_url().'setting/menu/menu_child/'.$id,						
								);
								
		$data['sort_by']		= 	array(
									'menuname'		=> 'Menu Name',
									'menucode'		=> 'Menu Code',
									'menulink'		=> 'Link',
								);
		
		$default_sort_column	= 'menuname';
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
		$pageconf['base_url']			= base_url().'setting/menu/menu_child/'.$id.'/';
		$pageconf['first_url']			= $pageconf['base_url'].'?'. http_build_query($_GET, '', "&");
		$pageconf['total_rows']			= $this->menu->count_menu_child_list($sort_by, $order_by, $keyword, $id);
		$pageconf['per_page']			= isset($_GET['per_page'])?$_GET['per_page']:'10';		
		$pageconf['suffix']				= '?' . http_build_query($_GET, '', "&");
		$pageconf['uri_segment']		= 5;
		$this->pagination->initialize($pageconf);
		$data['paging'] = $this->pagination->create_links();
		
		$from = ($this->uri->segment(5) != '')?$this->uri->segment(5):1;
		$from = ($from - 1) * $pageconf['per_page'];
		// --------------------------------------------------------------------		
		
		$data['datacount'] 		= $pageconf['total_rows'];
		$data['tablelist']		= $this->menu->view_menu_child_list($from, $pageconf['per_page'], $sort_by, $order_by, $keyword, $id);		
		
		$data['per_page']		= $pageconf['per_page'];		
		
		$this->load->view('main', $data);
		
	}
	
	// ADD DATA MENU CHILD
	public function add_menu_child($id=null){
		$access = $this->acl->access('add','menu');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		if($id=='') redirect(base_url()."setting/menu");
		
		$this->_set_rules_menu();
		if($this->form_validation->run() == false){
			$data['title'] 			= 'Add New Data';
			$data['subtitle'] 		= "";
			$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/menu">Menu</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/menu/menu_child/'.$id.'">Menu Child</a></li>
										<li><i class="fa fa-angle-right"></i>Add New Child Menu</li>';
			$data['parentid']		= $id;
			$data['content'] 		= 'setting/menu_child_add';
		
			$this->load->view('main', $data);
		}else{
			//Menu Available
			$avail = "";
			$menuavail = $this->input->post('menuavail');			
			foreach($menuavail as $obj => $value){
				$avail .= $value.",";				
			}
			$avail = substr($avail, 0, -1);
			
			$data = array(
				'menuname' 			=> $this->input->post('menuname'),
				'menuparentid'		=> $id,
				'menulink' 			=> $this->input->post('menulink'),
				'menuavail' 		=> $avail,
				'menucode' 			=> $this->input->post('menucode'),
				'menusort' 			=> $this->input->post('menusort'),
			);
			
			$result = $this->menu->save($this->table, $data);
			
			$message = ($result)?'Data berhasil ditambahkan':'Data Gagal ditambahkan';			
			$this->session->set_flashdata('message', $message);
			
			$url = base_url()."setting/menu/menu_child/".$id;
			redirect($url);
		}
		
	}
	
	// EDIT DATA MENU CHILD
	public function edit_menu_child($id=null, $parentid=null){
		$access = $this->acl->access('edit','menu');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		if($id=='' AND $parentid=='') redirect(base_url()."setting/menu");
		
		$this->_set_rules_menu();
		if($this->form_validation->run() == false){
			$data['title'] 			= 'Data Update';
			$data['subtitle'] 		= "";
			$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/menu">Menu</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/menu/menu_child/'.$parentid.'">Menu</a></li>
										<li><i class="fa fa-angle-right"></i>Menu Child Update</li>';
			$data['content'] 		= 'setting/menu_child_edit';
			
			$data['parentid']		= $parentid;
			$data['menu']			= $this->menu->get($this->table, $this->tableid, $id);
		
			$this->load->view('main', $data);
		}else{
			//Menu Available
			$avail = "";
			$menuavail = $this->input->post('menuavail');			
			foreach($menuavail as $obj => $value){
				$avail .= $value.",";				
			}
			$avail = substr($avail, 0, -1);
			
			$data = array(
				'menuname' 			=> $this->input->post('menuname'),
				'menuicon' 			=> $this->input->post('menuicon'),
				'menulink' 			=> $this->input->post('menulink'),
				'menuavail' 		=> $avail,
				'menucode' 			=> $this->input->post('menucode'),
				'menusort' 			=> $this->input->post('menusort'),
			);
			
			$result = $this->menu->edit($this->table, $this->tableid, $id, $data);
			
			$message = ($result)?'Data berhasil di-update':'Data Gagal di-update';			
			$this->session->set_flashdata('message', $message);
			
			$url = base_url()."setting/menu/menu_child/".$parentid;
			redirect($url);
		}
	}
	
	// DELETE DATA MENU CHILD
	public function delete_menu_child($id=null, $parentid=null){
		$access = $this->acl->access('del','menu');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$result = $this->menu->delete($this->table, $this->tableid, $id);
		
		$message = ($result)?'Data berhasil dihapus':'Data Gagal dihapus';			
		$this->session->set_flashdata('message', $message);
		
		$url = base_url()."setting/menu/menu_child/".$parentid;
		redirect($url);
	}
	//-----------------------------------------------------------------------------------
	
	// ICON -----------------------------------------------------------------------------
	public function icon(){
		$data['title'] 			= 'ICON';
		$data['subtitle'] 		= "";
		$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
									<li><i class="fa fa-angle-right"></i>Icon List</li>';
		$data['content'] 		= 'setting/icon';
	
		$this->load->view('main', $data);
	}
	
	
	
	//-----------------------------------------------------------------------------------
	
	// VALIDATION MENU
	function _set_rules_menu(){
		$this->form_validation->set_rules('menuname','Menu Name','required|trim');
		$this->form_validation->set_rules('menuicon','Menu Icon','');
		$this->form_validation->set_rules('menulink','Menu Link','');
		$this->form_validation->set_rules('menucode','Menu Code','alpha_dash');
		$this->form_validation->set_rules('menuavail[]','Menu Available','required|trim');
	}
		
}

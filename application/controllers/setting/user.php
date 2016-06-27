<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
	
	private $table  	= 'users';
	private $tableid	= 'userid';
	
	function __construct(){
        parent::__construct();   
		$this->load->model('setting/user_model', 'user');
	}
	
	// TABLE LIST
	public function index(){
		$access = $this->acl->access('view','user');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$data['title'] 			= 'Setting User';
		$data['subtitle'] 		= '';
		$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
									<li><i class="fa fa-angle-right"></i>User</li>';
		$data['content'] 		= 'setting/user_list';
		
		// SORT BY CONFIG -----------------------------------------------------
		$data['sort_setting'] 	= 	array(
										'form_action'	=> base_url().'setting/user/index/', 	
										'menu_url'		=> base_url().'setting/user',						
									);
					
		$data['sort_by'] 		= 	array(
										'username'	=> 'Username',
										'email'		=> 'Email',
										'firstname'	=> 'Firstname',
										'lastname'	=> 'Lastname',
										'phone'		=> 'Phone',
										'groupname'	=> 'Group',
									);
									
		$default_sort_column	= 'username';
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
		$pageconf['base_url']			= base_url().'setting/user/index';
		$pageconf['first_url']			= $pageconf['base_url'].'?'. http_build_query($_GET, '', "&");
		$pageconf['total_rows']			= $this->user->count_user_list($sort_by, $order_by, $keyword);
		$pageconf['per_page']			= isset($_GET['per_page'])?$_GET['per_page']:'10';		
		$pageconf['suffix']				= '?' . http_build_query($_GET, '', "&");
		$pageconf['uri_segment']		= 4;
		$this->pagination->initialize($pageconf);
		$data['paging'] = $this->pagination->create_links();
		
		$from = ($this->uri->segment(4) != '')?$this->uri->segment(4):1;
		$from = ($from - 1) * $pageconf['per_page'];
		// --------------------------------------------------------------------	
		
		$data['datacount'] 		= $pageconf['total_rows'];
		$data['tablelist']		= $this->user->view_user_list($from, $pageconf['per_page'], $sort_by, $order_by, $keyword);		
		
		$data['per_page']		= $pageconf['per_page'];		
		
		$this->load->view('main', $data);
		
	}
	
	// ADD DATA
	public function add_user(){
		$access = $this->acl->access('add','user');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$this->_set_rules_user_add();
		if($this->form_validation->run() == false){
			$data['title'] 			= 'Add New Data';
			$data['subtitle'] 		= "";
			$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/user">User</a></li>
										<li><i class="fa fa-angle-right"></i>Add New User</li>';
			$data['content'] 		= 'setting/user_add';
			
			$data['group']			= $this->user->view_user_group();
		
			$this->load->view('main', $data);
		}else{
			$data = array(
				'username' 	=> $this->input->post('username'),
				'password'	=> sha1($this->input->post('password')),
				'email'		=> $this->input->post('email'),
				'firstname'	=> $this->input->post('firstname'),
				'lastname'	=> $this->input->post('lastname'),
				'phone'		=> $this->input->post('phone'),
				'groupid'	=> $this->input->post('groupid'),
				'entryby'	=> $this->session->userdata('username'),
				'entrydate'	=> date('Y-m-d H:i:s'),
			);
			
			$result = $this->user->save($this->table, $data);
			
			$message = ($result)?'Data berhasil ditambahkan':'Data Gagal ditambahkan';			
			$this->session->set_flashdata('message', $message);
			
			$url = base_url()."setting/user";
			redirect($url);
		}
	}
	
	// UPDATE DATA
	public function edit_user($id=null){
		$access = $this->acl->access('edit','user');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$this->_set_rules_user_edit();
		if($this->form_validation->run() == false){
			$data['title'] 			= 'Data Update';
			$data['subtitle'] 		= "";
			$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting">Setting</a></li>
										<li><i class="fa fa-angle-right"></i><a href="'.base_url().'setting/user">User</a></li>
										<li><i class="fa fa-angle-right"></i>User Update</li>';
			$data['content'] 		= 'setting/user_edit';
			
			$data['group']			= $this->user->view_user_group();
			$data['user']			= $this->user->get($this->table, $this->tableid, $id);
		
			$this->load->view('main', $data);
		}else{
			$data = array(
				'email'			=> $this->input->post('email'),
				'firstname'		=> $this->input->post('firstname'),
				'lastname'		=> $this->input->post('lastname'),
				'phone'			=> $this->input->post('phone'),
				'groupid'		=> $this->input->post('groupid'),
			);
			
			$result = $this->user->edit($this->table, $this->tableid, $id, $data);
			
			$message = ($result)?'Data berhasil di-update':'Data Gagal di-update';			
			$this->session->set_flashdata('message', $message);
			
			$url = base_url()."setting/user";
			redirect($url);
		}
	}
	
	// CHANGE PASSWORD
	public function change_password($id=null){
		$this->_set_rules_change_password();
		if($this->form_validation->run() == TRUE){
			$data = array(
				'password'		=> sha1($this->input->post('password')),
			);
			
			$result = $this->user->edit($this->table, $this->tableid, $id, $data);
			
			$message = ($result)?'Data berhasil di-update':'Data Gagal di-update';			
			$this->session->set_flashdata('message', $message);
			
			$url = base_url()."setting/user";
			redirect($url);
		}else{
			$this->index();
		}
	}
	
	
	// DELETE DATA
	public function delete_user($id=null){
		
		$access = $this->acl->access('del','user');
		($access->menuview == 0)?exit('No direct script access allowed'):'';
		
		$result = $this->user->delete($this->table, $this->tableid, $id);
		
		$message = ($result)?'Data berhasil dihapus':'Data Gagal dihapus';			
		$this->session->set_flashdata('message', $message);
		
		$url = base_url()."setting/user";
		redirect($url);
	}
	
	// VALIDATION ADD
	public function _set_rules_user_add(){
		$this->form_validation->set_rules('username','Username','callback_check_username|required|trim');
		$this->form_validation->set_rules('email','Email','callback_check_email|required|trim|valid_email');
		$this->form_validation->set_rules('firstname','firstname','');
		$this->form_validation->set_rules('lastname','lastname','');
		$this->form_validation->set_rules('phone','phone','');
		$this->form_validation->set_rules('groupid','groupid','required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[c_password]|min_length[5]');
		$this->form_validation->set_rules('c_password','Confirm Password','required|trim');
	}
	
	// VALIDATION EDIT
	public function _set_rules_user_edit(){	
		$this->form_validation->set_rules('email','Email','callback_check_email_edit|required|trim|valid_email');
		$this->form_validation->set_rules('firstname','firstname','');
		$this->form_validation->set_rules('lastname','lastname','');
		$this->form_validation->set_rules('phone','phone','');
		$this->form_validation->set_rules('groupid','groupid','required|trim');
	}
	
	// VALIDATION CHANGE PASSWORD
	public function _set_rules_change_password(){
		$this->form_validation->set_rules('password', 'Password', 'required|matches[c_password]|min_length[5]');
		$this->form_validation->set_rules('c_password','Confirm Password','required|trim');
	}
	
	//CEK JIKA USERNAME TELAH ADA
	function check_username($username){
        $return_value = $this->user->check_username($username);
        if ($return_value){
            $this->form_validation->set_message('check_username', 'Sorry, This Username is already used by another user please select another one');
            return FALSE;
        }else{
            return TRUE;
        }
	}
	
	//CEK JIKA EMAIL TELAH ADA
	function check_email($email){
        $return_value = $this->user->check_email($email);
        if ($return_value){
            $this->form_validation->set_message('check_email', 'Sorry, This Email is already used by another user please select another one');
            return FALSE;
        }else{
            return TRUE;
        }
	}
	
	//CEK EMAIL DI HALAMAN EDIT
	function check_email_edit(){
        $return_value = $this->user->check_email_edit($this->input->post('email'), $this->input->post('id'));
        if ($return_value){
            $this->form_validation->set_message('check_email_edit', 'Sorry, This Email is already used by another user please select another one');
            return FALSE;
        }else{
            return TRUE;
        }
	}
	
		
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
        parent::__construct();   
		$this->load->model('login_model', 'log');
	}

	public function index(){
		$crm_login = $this->session->userdata('crm_login');
		if($crm_login){
			redirect('dashboard');
		}else{
			$this->load->view('login');
		}
	}
	
	public function auth(){
		$username	= $this->input->post('username');
		$password 	= sha1($this->input->post('password'));	
				
		$query = $this->log->validate($username, $password);		
				
		if($query){
			redirect('dashboard');
		}else{
			redirect('login');
		}

	}
	
	public function logout(){
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('groupid');
		$this->session->unset_userdata('crm_login');
			
		$this->session->sess_destroy();			
			
		redirect('login');
	}
	
}

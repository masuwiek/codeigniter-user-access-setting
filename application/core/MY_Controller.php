<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$crm_login = $this->session->userdata('crm_login');
		if(!isset($crm_login) || $crm_login != true){
			redirect('login');
		}
		
	}
}
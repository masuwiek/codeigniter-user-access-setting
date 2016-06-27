<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		$data['title'] 			= 'Dashboard';
		$data['subtitle'] 		= '';
		$data['breadcrumb'] 	= '	<li><i class="fa fa-angle-right"></i><a href="'.base_url().'dashboard">Dashboard</a></li>';
		$data['content'] 		= 'dashboard';
		
		$this->load->view('main', $data);
	}
}

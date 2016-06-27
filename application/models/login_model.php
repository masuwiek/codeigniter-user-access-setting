<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct(){
        parent::__construct();
    }
	
	public function validate($username, $password){

		$query = "select * from users 
					where username ='".$username."' and password ='".$password."'";
		$data = $this->db->query($query);
		
		if($data->num_rows() == 1){		
			$result = $data->row();
			
			$sessiondata['userid']			= $result->user_id;
			$sessiondata['username']		= $result->username;
			$sessiondata['email']			= $result->email;
			$sessiondata['groupid']			= $result->groupid;
			$sessiondata['firstname']		= $result->firstname;
			$sessiondata['lastname']		= $result->lastname;
			$sessiondata['crm_login']		= TRUE;	
			
			$this->session->set_userdata($sessiondata);
			
			$ip = $this->input->ip_address();
			$query = "update users set lastlogin = '".date('Y-m-d H:i:s')."', lastipaddress =  '".$ip."'
						where userid = '".$result->userid."'";
			$this->db->query($query);
			
			return TRUE;
		}else{
			
			return FALSE;
		}

	}
	
	
}
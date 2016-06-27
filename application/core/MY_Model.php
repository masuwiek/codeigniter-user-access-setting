<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function save($tableName="", $data=""){
		if(!empty($tableName)) {
			$result = $this->db->insert($tableName,$data);
			if($result){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	
	public function save_get_id($tableName="", $data=""){
		if(!empty($tableName)) {
			$this->db->insert($tableName,$data);
			$id = $this->db->insert_id();
			
			return $id;
			
		}else{
			return FALSE;
		}
	}
	
	public function edit($tableName="", $tableid="", $id=null, $data=""){
		if(!empty($tableName)) {
			$this->db->where($tableid, $id);
            $result = $this->db->update($tableName, $data);
			if($result) {
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	
	public function delete($tableName="", $tableid="", $id=null){
		if(!empty($id)) {
			$this->db->where($tableid, $id);
            $result = $this->db->delete($tableName);
			if($result) {
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	
	public function get($tableName="", $tableid="", $id=null){
		if(!empty($id)) {
			$this->db->where($tableid, $id);
			$data = $this->db->get($tableName);
			
			return $data->row();
		}else{
			
		}
	}

}
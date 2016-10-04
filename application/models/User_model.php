<?php
class User_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function auth($email, $password, $where = NULL) {
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where(array(
			'email' => $email,
			'password' => md5($password)
		));
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get()->row_array();
	}
}
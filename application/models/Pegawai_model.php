<?php
class Pegawai_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('pegawai');
        $this->db->join('user_login', 'pegawai.user_login_id = user_login.id');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_pegawai','ASC');
		return $this->db->get();
	}
	function is_code_exist($code, $id){
        $this->db->where('email', $code);
        if($id > 0){
            $this->db->where('id != ', $id);
        }
        $result = $this->db->get('user_login')->row_array();
        return $result;
    }
	function add($data){
		$query = $this->db->insert('pegawai', $data);
		// $this->db->insert();
		return $query;
	}
	function check_password_pegawai($pass, $id){
        $this->db->where(array('password = '=> $pass,'role = '=> 3));
        // if($id > 0){
        //     $this->db->where(array('id = '=> $id,'role = '=> 1));
        // }
        $result = $this->db->get('user_login')->row_array();
        return $result;
    }
	function check_password($pass, $id){
        $this->db->where(array('password = '=> $pass,'role = '=> 1));
        // if($id > 0){
        //     $this->db->where(array('id = '=> $id,'role = '=> 1));
        // }
        $result = $this->db->get('user_login')->row_array();
        return $result;
    }
    function change_pass($where, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where($where);
        return $this->db->update('user_login', $data);
    }
	function update($id, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where('id_pegawai',$id);
        return $this->db->update('pegawai', $data);
    }
	
	function edit($id_pegawai, $data){
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('pegawai', $data);
		return $id_pegawai;
	}
	
	function delete($id_pegawai){
		$this->db->where('user_login_id', $id_pegawai);
		$this->db->delete('pegawai');
		$this->db->where('id', $id_pegawai);
		return $this->db->delete('user_login');
	}
}
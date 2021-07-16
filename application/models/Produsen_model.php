<?php
class Produsen_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('produsen');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_produsen','ASC');
		return $this->db->get();
	}
	
	function add($data){
		$query = $this->db->insert('produsen', $data);
		// $this->db->insert();
		return $query;
	}
	
	function update($id, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where('id_produsen',$id);
        return $this->db->update('produsen', $data);
    }
	
	function edit($id_produsen, $data){
		$this->db->where('id_produsen', $id_produsen);
		$this->db->update('produsen', $data);
		return $id_produsen;
	}
	
	function delete($id_produsen){
		$this->db->where('id_produsen', $id_produsen);
		return $this->db->delete('produsen');
	}
}
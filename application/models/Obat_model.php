<?php
class Obat_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('obat.*,produsen.nama as produsen_nama');
		$this->db->from('obat');
		$this->db->join('produsen','obat.produsen = produsen.id_produsen');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_obat','ASC');
		return $this->db->get();
	}
	
	function add($data){
		$query = $this->db->insert('obat', $data);
		// $this->db->insert();
		return $query;
	}
	
	function update($id, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where('id_obat',$id);
        return $this->db->update('obat', $data);
    }
	
	function edit($id_obat, $data){
		$this->db->where('id_obat', $id_obat);
		$this->db->update('obat', $data);
		return $id_obat;
	}
	
	function delete($id_obat){
		$this->db->where('id_obat', $id_obat);
		return $this->db->delete('obat');
	}
}
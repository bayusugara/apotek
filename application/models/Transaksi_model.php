<?php
class Transaksi_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('transaksi.*,customer.nama');
		$this->db->from('transaksi');
		$this->db->join('customer','transaksi.id_customer = customer.id_customer');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('kode_transaksi','ASC');
		return $this->db->get();
	}
	
	function add($data){
		$query = $this->db->insert('transaksi', $data);
		// $this->db->insert();
		return $query;
	}
	
	function update($id, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where('kode_transaksi',$id);
        return $this->db->update('transaksi', $data);
    }
	
	function edit($kode_transaksi, $data){
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->update('transaksi', $data);
		return $kode_transaksi;
	}
	
	function delete($id_transaksi){
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->delete('transaksi');
	}
}
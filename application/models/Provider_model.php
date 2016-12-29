<?php
class Provider_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('provider');
        $this->db->join('user_login', 'provider.user_login_id = user_login.id');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_provider','ASC');
		return $this->db->get();
	}

	function get_provider_fasilitas($where = NULL){
		$this->db->select('*');
		$this->db->from('provider_fasilitas');
		$this->db->join('fasilitas', 'provider_fasilitas.id_fasilitas = fasilitas.id_fasilitas');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_provider','ASC');
		return $this->db->get();
	}
	function get_lapang($where = NULL){
		$this->db->select('*');
		$this->db->from('lapang');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_provider','ASC');
		return $this->db->get();
	}
	function get_provinsi($where = NULL){
		$this->db->select('*');
		$this->db->from('provinsi');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('provinsi_id','ASC');
		return $this->db->get();
	}
	function add($data){
		$query = $this->db->insert('provider', $data);
		// $this->db->insert();
		return $this->db->insert_id();
	}
	function add_fasilitas($data){
		$query = $this->db->insert('provider_fasilitas', $data);
		// $this->db->insert();
		return $query;
	}
	
	function is_code_exist($code, $id){
        $this->db->where('email', $code);
        if($id > 0){
            $this->db->where('id != ', $id);
        }
        $result = $this->db->get('user_login')->row_array();
        return $result;
    }
    function is_password_admin($pass, $id){
        $this->db->where(array('password = '=> $pass,'role = '=> 1));
        // if($id > 0){
        //     $this->db->where(array('id = '=> $id,'role = '=> 1));
        // }
        $result = $this->db->get('user_login')->row_array();
        return $result;
    }
    function is_password($pass, $id){
        $this->db->where(array('password = '=> $pass,'id = '=> $id));
        // if($id > 0){
        //     $this->db->where(array('id = '=> $id,'role = '=> 1));
        // }
        $result = $this->db->get('user_login')->row_array();
        return $result;
    }
	function update($id, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where('id_provider',$id);
        return $this->db->update('provider', $data);
    }
    function update_lapang($id, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where('id_lapang',$id);
        return $this->db->update('lapang', $data);
    }
    function insert_lapang($data){
		$query = $this->db->insert('lapang', $data);
		// $this->db->insert();
		return $this->db->insert_id();
	}
    
	function change_pass($where, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where($where);
        return $this->db->update('user_login', $data);
    }
	function edit($id_provider, $data){
		$this->db->where('id_provider', $id_provider);
		$this->db->update('provider', $data);
		return $id_provider;
	}
	function get_provider_trans($where){
		$this->db->select('transaksi.*,lapang.kode_lapang as kode_lapang,customer.nama as nama, provider.nama as provider');
		$this->db->from('transaksi');
		$this->db->join('customer','customer.id_customer = transaksi.id_customer');
		$this->db->join('lapang','transaksi.id_lapang = lapang.id_lapang');
		$this->db->join('provider','provider.id_provider = lapang.id_provider');
		$this->db->where($where);
		return $this->db->get();
	}
	
	
	function delete($id_provider){
		$this->db->where('id', $id_provider);
		return $this->db->delete('user_login');
	}
	function delete_lapang($id){
		$this->db->where('id_lapang', $id);
		return $this->db->delete('lapang');
	}
	function delete_provider_fasilitas($where){
		$this->db->where($where);
		return $this->db->delete('provider_fasilitas');
	}

	/*function get_limit(){
		$limit = 20;
		return $limit;
	}
	function get_offset(){
		$offset = $this->uri->segment(3);
		if (!is_numeric($offset)) {
			$offset = 0;
		}
		return $offset = 0;
	}
	function _generate_pagination($data){

	   	//NOTE: data harus di contain
	    //$target_base_url, $total_rows, $offset_segment, $limit

	    /*$target_base_url = $data['target_base_url'];
	    $total_rows = $data['total_rows'];
	    $offset_segment = $data['offset_segment'];
	    $limit = $data['limit'];

	    $setting = $this->get_setting_for_public_bootstrap();

    	$this->load->library('pagination');
		$config['base_url'] = ;
		$config['total_rows'] = $total_rows;
		$config['uri_segment'] = $offset_segment ;

		$config ['per_page'] = $limit;
    	$config ['num_links'] = $setting ['num_links'];

    	$config ['full_tag_open'] = $setting ['full_tag_open'];
    	$config ['full_tag_close'] = $setting ['full_tag_close'];

    	$config ['cur_tag_open'] = $setting ['cur_tag_open'];
    	$config ['cur_tag_close'] = $setting ['cur_tag_close'];

    	$config ['num_tag_open'] = $setting ['num_tag_open'];
    	$config ['num_tag_close'] = $setting ['num_tag_close'];

    	$config ['first_link'] = $setting ['first_link'];
    	$config ['first_tag_open'] = $setting ['first_tag_open'];
    	$config ['first_tag_close'] = $setting ['first_tag_close'];

    	$config ['last_link'] = $setting ['last_link'];
    	$config ['last_tag_open'] = $setting ['last_tag_open'];
    	$config ['last_tag_close'] = $setting ['last_tag_close'];

    	$config ['prev_link'] = $setting ['prev_link'];
    	$config ['prev_tag_open'] = $setting ['prev_tag_open'];
    	$config ['prev_tag_close'] = $setting ['prev_tag_close'];

    	$config ['next_link'] = $setting ['next_link'];
    	$config ['next_tag_open'] = $setting ['next_tag_open'];
    	$config ['next_tag_close'] = $setting ['next_tag_close'];

		$this->pagination->initialize($config);

		$pagination = $this->pagination->create_links();
		return $pagination;
    }
    function get_setting_for_public_bootstrap(){
    	$setting ['num_links'] = 12;

    	$setting ['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination">';
    	$setting ['full_tag_close'] = '</ul></nav>';

    	$setting ['cur_tag_open'] = '<li class="disabled"><a href="#">';
    	$setting ['cur_tag_close'] = '</a></li>';

    	$setting ['num_tag_open'] = '<li>';
    	$setting ['num_tag_close'] = '</li>';

    	$setting ['first_link'] = 'First';
    	$setting ['first_tag_open'] = '<li>';
    	$setting ['first_tag_close'] = '</li>';

    	$setting ['last_link'] = 'Last';
    	$setting ['last_tag_open'] = '<li>';
    	$setting ['last_tag_close'] = '</li>';

    	$setting ['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
    	$setting ['prev_tag_open'] = '<li>';
    	$setting ['prev_tag_close'] = '</li>';

    	$setting ['next_link'] = '<span aria-hidden="true">&raquo;</span>';
    	$setting ['next_tag_open'] = '<li>';
    	$setting ['next_tag_close'] = '</li>';

    	return $setting;
    }*/
}
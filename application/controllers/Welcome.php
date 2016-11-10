<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();

		// $this->load->database();
		$this->load->database();
		$this->load->model(array('login_model','provider_model','gallery_model'));
		// die();
	}
	public function index()
	{
		$user = $this->login_model->get();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']='content';
		$data['slide']='slide';
		$data['sidebar']='sidebar';
		$data['provider'] = $this->provider_model->get()->result_array();
		$data['lapang'] = $this->provider_model->get()->result_array();
		$this->load->view('tamplate',$data);
	}
	PUBLIC function detail_provider($id_provider){
		$user = $this->login_model->get();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']='detail_provider';
		$data['slide']= null;
		$data['sidebar']='sidebar';
        $data['provider'] = $this->provider_model->get(array('id_provider' => $id_provider))->row_array();
        $data['lapang'] = $this->provider_model->get_lapang(array('id_provider' =>$data['provider']['id_provider']))->result_array();
        $data['fasilitas'] = $this->provider_model->get_provider_fasilitas(array('id_provider' =>$data['provider']['id_provider']))->result_array();
        $data['gallery'] = $this->gallery_model->get(array('id_provider' =>$data['provider']['id_provider']))->result_array();
        $this->load->view('tamplate', $data);
	}
	function get_gallery($id){

		$img = $this->gallery_model->get(array('id_provider' => $id,'is_display_picture' => '1'))->row_array();
		print_r($img);
	}
	PUBLIC function view_all(){
		$user = $this->login_model->get();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']= 'view_all';
		$data['slide']= null;
		$data['sidebar']='sidebar';
		$data['provider'] = $this->provider_model->get()->result_array();
		$data['lapang'] = $this->provider_model->get()->result_array();
		$data['pagination'] = $this->provider_model->_generate_pagination();
        $this->load->view('tamplate', $data);
	}
	
}

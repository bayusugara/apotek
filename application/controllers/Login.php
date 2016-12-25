<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model(array('login_model','provider_model'));
	}
	public function index(){

		$user = $this->login_model->get();
		$this->check_role();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']='login';
		$data['slide']=null;
		$data['sidebar']='sidebar';
		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();
		$this->load->view('tamplate',$data);
	}
	public function check(){
		$this->layout = false;
		$login_success = false;
		// if ($this->input->post("submit")) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		if (isset($email) && isset($password)) {
			if ($this->login_model->create($email, $password)) {
				$login_success = true;
			}
		}
		// }
		if(!$login_success){
			// $this->session->set_flashdata('form_msg', a2ray('success'=>false,'fail' =>true, 'msg' => 'Access denied. Incorrect username/password'));
			$this->session->set_flashdata('info','maaf username atau password salah');
			redirect('login');
		}else{
			$user = $this->login_model->get();
			if($user['role'] == 1){
			// $this->session->set_flashdata('form_msg', array('success' =>true, 'fail'=> false, 'msg' => 'Login Success'));
				redirect('admin');
			}else if($user['role'] == 2){
				redirect('admin_provider');
			}else{
				redirect('welcome');
			}
		}
		echo json_encode($response);
	}
	function check_role(){
		$user = $this->login_model->get();
		if(isset($user)){
			if($user['role'] == 1){
			// $this->session->set_flashdata('form_msg', array('success' =>true, 'fail'=> false, 'msg' => 'Login Success'));
				redirect('admin');
			}else{
				redirect('welcome');
			}
		}	
	}
	function logout() {
		$this->login_model->clear();
		redirect(base_url());
	}
	
	function no_access(){
		redirect(site_url());
	}

}

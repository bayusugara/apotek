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
		$this->load->model(array('login_model','provider_model','gallery_model','user_model','customer_model'));
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

	public function registrasi_customer(){
		$user = $this->login_model->get();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']='registrasi_customer';
		$data['slide']=null;
		$data['sidebar']='sidebar';
		$this->load->view('tamplate',$data);
	}
	public function post(){
		
        $data['id_customer'] = $_POST['id_customer'];
        if($_POST['id_customer'] == 0){
        	$data_user['username'] = $_POST['username'];
	        $data_user['password'] = md5($_POST['password']);
	        $data_user['email'] = $_POST['email'];
	        $data_user['role'] = 3;
            if($user_id = $this->user_model->add_user_login($data_user)){
            	// print($user_id);
            	// print_r($_FILES["image"]);
            	// die();
				if(isset($_FILES['image'])){
					// filename.split('.').pop();
					$attachment_file=$_FILES["image"];
			      	$output_dir = "assets/img/profile_pict/";
			      	$fileName = $user_id;
					move_uploaded_file($_FILES["image"]["tmp_name"],$output_dir.$fileName.'.png');
				}
		        $data['nama'] = $_POST['nama'];
		        $data['alamat'] = $_POST['alamat'];
		        $data['no_tlp'] = $_POST['no_tlp'];
		        $data['status'] = 1;
		        $data['foto'] = $fileName.'.png';
        		$data['user_login_id'] = $user_id;
            	$this->customer_model->add($data);
                echo "1";
            }else{
                echo "0";
            }
        }else{
        	$data_user['username'] = $_POST['username'];
           	$data_user['email'] = $_POST['email'];
           	$data_user['password'] = md5($_POST['password']);
            if($this->user_model->update_user_login($_POST['user_login_id'],$data_user)){
            	$data['nama'] = $_POST['nama'];
            	if(isset($_FILES['image'])){
					$attachment_file=$_FILES["image"];
			      	$output_dir = "assets/img/profile_pict/";
			      	$fileName = $_POST['user_login_id'];
					move_uploaded_file($_FILES["image"]["tmp_name"],$output_dir.$fileName.'.png');
				}
            	if($fileName != ''){
		        	$data['foto'] = $fileName.'.png';
		    	}
		        $data['alamat'] = $_POST['alamat'];
		        $data['no_tlp'] = $_POST['no_tlp'];
		        $data['status'] = 1;
            	$this->customer_model->edit($_POST['id_customer'],$data);
                echo "1";
            }else{
                echo "0";
            }
        }
        $this->check();
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
	public function profil_customer(){
		$user = $this->login_model->get();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']= 'profil_customer';
		$data['slide']= null;
		$data['sidebar']='sidebar';
		$data['customer'] = $this->customer_model->get(array('id' => $user['id']))->row_array();
		$this->load->view('tamplate',$data);	
	}
	public function edit_profil_customer(){
		$user = $this->login_model->get();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']= 'edit_profil_customer';
		$data['slide']= null;
		$data['sidebar']='sidebar';
		$data['customer'] = $this->customer_model->get(array('id' => $user['id']))->row_array();
		$this->load->view('tamplate',$data);
	}
	public function edit_password_customer(){
		$user = $this->login_model->get();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']= 'edit_password_customer';
		$data['slide']= null;
		$data['sidebar']='sidebar';
		$data['customer'] = $this->customer_model->get(array('id' => $user['id']))->row_array();
		$this->load->view('tamplate',$data);
	}
	function check_password(){
        $pass = md5($_POST['old_password']);
        $id = $_POST['id'];
        $data = $this->customer_model->check_password($pass, $id);
        if($data){
            $result = true;
            $data['password'] = md5($_POST['password']);
	 		$id = $_POST['id'];
	    	if($this->customer_model->change_pass(array('id'=>$id),$data)){
	        	echo "1";
	        	redirect('welcome/profil_customer');
	    	}else{
	        	echo "0";
	    	}
        }else{
            $result = false;
        }

    }
    function change_pass(){
   	 	$data['password'] = md5($_POST['password']);
	 	$id = $_POST['id'];
	    if($this->customer_model->change_pass(array('id'=>$id),$data)){
	        echo "1";
	    }else{
	        echo "0";
	    }

    }
	
}

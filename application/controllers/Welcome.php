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
		$this->load->model(array('login_model','provider_model','gallery_model','user_model','customer_model','transaksi_model'));
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
		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();
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
		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();

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
	function get_jadwal_lapangan(){
		$id = $this->input->post('idx');
		$tgl_sewa = $this->input->post('tgl_sewa');
		if($tgl_sewa == 0){
			$tgl_sewa = date('Y-m-d');
		}
		// print_r(date('l'));
		if(date('l')=='Sunday'){
			$sunday = date('Y-m-d');
		}else{
			$sunday = date('Y-m-d',strtotime( "next sunday",strtotime($tgl_sewa)));
		}
		if(date('l')=="Monday"){
			$monday = date('Y-m-d');
		}else{
			$monday = date('Y-m-d',strtotime( "previous monday",strtotime($tgl_sewa)));
		}
		// print_r($sunday);
		$jadwal = $this->transaksi_model->get(array('id_lapang'=>$id,'tgl_main >='=>$monday,'tgl_main <='=>$sunday))->result_array();
		// print_r($monday);

		echo json_encode($jadwal);
	}
	PUBLIC function view_all(){
		$user = $this->login_model->get();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']= 'view_all';
		$data['slide']= null;
		$data['sidebar']='sidebar';
		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();

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
		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();

		$data['slide']=null;
		$data['sidebar']='sidebar';
		$this->load->view('tamplate',$data);
	}
	public function registrasi_provider(){
		$user = $this->login_model->get();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']='registrasi_provider';
		$data['slide']=null;
		$data['sidebar']='sidebar';
		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();

		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();
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
    public function post_provider(){
    	$data['id_provider'] = $_POST['id_provider'];
        $data_provider['password'] = md5($_POST['password']);
        $data_provider['username'] = $_POST['username'];
        $data_provider['email'] = $_POST['email'];
        $data_provider['role'] = 2;
        $user_id = $this->user_model->add_user_login($data_provider);
        $data['lokasi'] = $_POST['lokasi'];
        $data['nama'] = $_POST['nama'];
        $data['provinsi_id'] = $_POST['provinsi'];;
        $data['status'] = 1;
        $data['user_login_id'] = $user_id;
        $this->provider_model->add($data);
        redirect('admin_provider');
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
		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();

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
		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();

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
		$data['provinsi'] = $this->provider_model->get_provinsi()->result_array();

		$data['customer'] = $this->customer_model->get(array('id' => $user['id']))->row_array();
		$this->load->view('tamplate',$data);
	}
	function check_password(){
        $pass = md5($_POST['password_old']);
        $id = $_POST['id'];
        $data = $this->customer_model->check_password($pass, $id);
        if($data){
            $result = true;
            $data['password'] = md5($_POST['password']);
	    	$this->customer_model->change_pass(array('id'=>$id),$data);
	        	echo "1";
	        	redirect('welcome/profil_customer');
        }else{
            $result = false;
            $this->session->set_flashdata('info','maaf password lama anda salah');
			redirect('welcome/edit_password_customer');
        }
        echo json_encode($result);
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
    function get_fasilitas_by_id(){
        // $this->layout = false;
        $id = $_POST['idx'];
        $query = $this->provider_model->get_provider_fasilitas(array("id_provider"=>$id))->result_array();
        $result = "";
        foreach($query as $row){
            // $result = $row['TrcTypeID']+
        }
        // print_r($query);
        echo json_encode($query);
    }
    function save_transaksi(){
    	// $data['tgl_transaksi'] = date('Y-m-d');
    	$data['tgl_sewa'] = date('Y-m-d');
    	$data['tgl_main'] = $_POST['tanggal'];
    	$data['id_lapang'] = $_POST['id_lapang'];
    	$data['jam_mulai'] = $_POST['jam_mulai'];
    	$data['jam_selsai'] = $_POST['jam_selesai'];

    	$data['status'] = 0;
    	$user = $this->login_model->get();
    	$customer = $this->customer_model->get(array("user_login_id"=>$user['id']))->row_array();
    	$data['id_customer'] = $customer['id_customer'];
    	$data['kode_transaksi'] = 'TRX'.$customer['id_customer'].$data['id_lapang'].rand(1000,3);
    	if($this->transaksi_model->add($data)){
    		$enc['lapang'] = $this->provider_model->get_lapang(array('id_lapang'=>$_POST['id_lapang']))->row_array();
    		$enc['provider'] = $this->provider_model->get(array('id_provider'=>$enc['lapang']['id_provider']))->row_array();
    		echo json_encode($enc);
    	}else{
    		echo "0";
    	}
    			
    }
    function checkJadwal(){
    	$tanggal = $_POST['tanggal'];
    	$jam_mulai = strtotime($_POST['jam_mulai']);
    	$jam_selesai = strtotime($_POST['jam_selesai']);
    	$id_lapang = $_POST['id_lapang'];
    	$query = $this->transaksi_model->get(array('id_lapang' => $id_lapang, 'tgl_main' => $tanggal))->result_array();
    	$lapang = $this->provider_model->get_lapang(array('id_lapang' => $id_lapang ))->row_array();
    	$total = ($jam_selesai - $jam_mulai)*$lapang['harga']/2; 
    	foreach ($query as $key => $value) {

            // $work_request = $this->work_request_model->get(array('work_request.id'=>$value['work_request_id']))->row_array();
            // print_r($work_request);
            // $student = 
          
            $start_time2 = strtotime($value['jam_mulai']);
            $end_time2 = strtotime($value['jam_selsai']);
            if(($jam_selesai <= $end_time2) && ($jam_mulai >= $start_time2)){
                $total=0;
            }
        
        }
        echo $total; 
        // print_r($query);
    }
    // function get_jadwal_lapangan(){
    //     $id = $this->input->post('idx');
    //     $tgl_sewa = $this->input->post('tgl_sewa');
    //     if($tgl_sewa == 0){
    //         $jadwal = $this->transaksi_model->get(array('id_lapang'=>$id,'tgl_sewa'=>date('Y-m-d')))->result_array();
    //     }
    //     // print_r($id);
    //     echo json_encode($jadwal);
    // }

	
}

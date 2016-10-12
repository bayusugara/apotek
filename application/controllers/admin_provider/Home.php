<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->model(array('provider_model','fasilitas_model','login_model','user_model','gallery_model'));
	}
	public function index(){
		//ngambil data user dari database
		$user = $this->login_model->get();
		$data['userdata'] = $user;

		//check role kalo bukan admin langsung di redirect ke halaman depan
		$this->check_role();

		//init layout
		$data['navbar']='admin_provider/navbar_provider';
		$data['content']='admin_provider/dashboard';
		$data['slide']=null;
		$data['sidebar']='admin_provider/sidebar_provider';
		$data['title']='Dashboard';
		$data['provider'] = $this->provider_model->get(array('user_login_id'=>$user['id']))->row_array();
		$data['scripts'] = ['js/provider/general.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
		$this->load->view('admin_provider/tamplate_provider',$data);
	}
    public function gallery(){
        $user = $this->login_model->get();
        $data['userdata'] = $user;
        $data['provider'] = $this->provider_model->get(array('user_login_id'=>$user['id']))->row_array();
        $data['navbar']='admin_provider/navbar_provider';
        $data['content']='admin_provider/content_gallery';
        $data['slide']=null;
        $data['sidebar']='admin_provider/sidebar_provider';
        $data['title']='Galeri Foto';
        $data['scripts'] = ['js/provider/general.js','js/provider/gallery.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
        $this->load->view('admin_provider/tamplate_provider',$data);
    }
    public function lapang(){
        $user = $this->login_model->get();
        $data['userdata'] = $user;
        $data['provider'] = $this->provider_model->get(array('user_login_id'=>$user['id']))->row_array();
        $data['navbar']='admin_provider/navbar_provider';
        $data['content']='admin_provider/content_lapang';
        $data['slide']=null;
        $data['sidebar']='admin_provider/sidebar_provider';
        $data['title']='Lapangan';
        $data['scripts'] = ['js/provider/general.js','js/provider/lapang.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
        $this->load->view('admin_provider/tamplate_provider',$data);
    }
	function check_role(){
		$user = $this->login_model->get();
		if(isset($user)){
            if($user['role'] == 2){
            // $this->session->set_flashdata('form_msg', array('success' =>true, 'fail'=> false, 'msg' => 'Login Success'));
                // redirect('welcome');
            
            }else if($user['role'] == 1){
                    redirect('admin');
            }else{
                redirect('welcome');
            }
        }else{
            redirect('login');
        }
	}
    function delete_img(){
        $id = $_POST['id'];
        $foto = 'assets/img/'.$_POST['id_provider'].'/'.$_POST['foto'];
        // print_r($foto);
         if(file_exists($foto)){
                unlink($foto);
                if($this->gallery_model->delete_img($id)){
                    echo "1";
                }else{
                    echo "0";
                }
            }
        
    }
    function upload_image_gallery(){
        $id=$_POST['id'];
        $attachment_file=$_FILES["image"];
        $output_dir = "assets/img/".$id."/";
        if(!is_dir($output_dir)) {
            mkdir($output_dir);
        }
        $fileName = $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"],$output_dir.$fileName);
        $data['foto'] = $fileName;
        $data['id_provider'] = $_POST['id'];
        if($this->gallery_model->add_img_gallery($data)){
            echo $id;
        }else{
            echo "0";
        }
    }
	function check_password(){
        $pass = md5($_POST['old_password']);
        $id = $_POST['id'];
        $data = $this->provider_model->is_password($pass, $id);
        if($data){
            $result = true;
        }else{
            $result = false;
        }

        echo json_encode($result);
    }
    
    function change_pass(){
   	 	$data['password'] = md5($_POST['new_password']);
	 	$id = $_POST['id'];
	    if($this->provider_model->change_pass(array('id'=>$id),$data)){
	        echo "1";
	    }else{
	        echo "0";
	    }

    }
    function get_gallery(){
        $id = $_POST['id'];
        $result = $this->gallery_model->get(array("id_provider"=>$id))->result_array();
        echo json_encode($result);

    }
    function check_code(){
        $code = $_POST['email'];
        $id = $_POST['id'];
        $data = $this->provider_model->is_code_exist($code, $id);
        if($data){
            $result = false;
        }else{
            $result = true;
        }

        echo json_encode($result);
    }
	 public function post(){
        $dt = $_POST['data'];
        $data_provider['password'] = md5($dt[1]);
        $data_provider['username'] = $dt[0];
        $data_provider['email'] = $dt[3];
        $data_provider['role'] = 2;
        if($_POST['arr'] != 0){
            $trc = $_POST['arr'];
        }
        if($dt[6] == 0){
        $user_id = $this->user_model->add_user_login($data_provider);
        $data['lokasi'] = $dt[2];
        $data['nama'] = $dt[4];
        $data['longitude'] = $dt[8];
        $data['latitude'] = $dt[9];
        $data['provinsi_id'] = $dt[10];
        $data['status'] = $dt[5];
        $data['user_login_id'] = $user_id;
            if($provider_id = $this->provider_model->add($data)){
                if($_POST['arr'] != 0){
                    $last_id = $provider_id;
                    for ($i=0; $i < count($trc); $i++) {
                        $data1 = [];
                        $data1['id_provider'] = $last_id;
                        $data1['id_fasilitas'] = $trc[$i];
                        $this->provider_model->add_fasilitas($data1);
                    }
                }
                echo "1";
            }else{
                echo "0";
            }
        }else{
        	$data_user_edit['username'] = $dt[0];
        	$data_user_edit['email'] = $dt[3];
        	$data['lokasi'] = $dt[2];
	        $data['nama'] = $dt[4];
	        $data['status'] = $dt[5];
            $data['longitude'] = $dt[8];
            $data['latitude'] = $dt[9];
            $data['provinsi_id'] = $dt[10];
        	$this->user_model->update_user_login($dt[7],$data_user_edit);
            if($this->provider_model->update($dt[6],$data)){
                if($_POST['arr'] != 0){
                $query = $this->provider_model->get_provider_fasilitas(array("id_provider"=>$dt[6]))->result_array();
                $result = [];
                foreach ($query as $row) {
                    array_push($result, $row['id_fasilitas']);
                }
                // print_r($result);
                // print_r($trc);
                $added = array_values(array_diff($trc,$result));
                // echo"added";
                // print_r($added);
                    if(count($added)>0){
                        for ($i=0; $i < count($added); $i++) { 
                            $data1 = [];
                            $data1['id_provider'] = $dt[6];
                            $data1['id_fasilitas'] = $added[$i];
                            $this->provider_model->add_fasilitas($data1);
                        }
                    }
                    // echo"deleted";
                $deleted = array_values(array_diff($result,$trc));
                // print_r($deleted);
                    if(count($deleted)>0){
                        for ($i=0; $i < count($deleted); $i++) { 
                            $this->provider_model->delete_provider_fasilitas(array('id_provider'=>$dt[6],'id_fasilitas'=>$deleted[$i]));
                        }
                    }
                }
                echo "1";
            }else{
                echo "0";
            }
        }
        // echo $data['kode'];
        // print_r($_POST);
    }
    public function post_lapang(){
    	$id = $_POST['id'];
    	$kode = $_POST['kode_lapang'];
    	$harga = $_POST['harga'];
    	$ukuran = $_POST['ukuran'];
    	$id_lapang = $_POST['id_lapang'];
    	$jenis = $_POST['jenis'];
    	for ($i=0; $i <count($id_lapang) ; $i++) { 
    		if($id_lapang[$i]!=0){
    			$data['kode_lapang'] = $kode[$i];
    			$data['ukuran'] = $ukuran[$i];
    			$data['harga'] = $harga[$i];
    			$data['jenis'] = $jenis[$i];
    			$this->provider_model->update_lapang($id_lapang[$i],$data);
    		}else{
    			$data['kode_lapang'] = $kode[$i];
    			$data['ukuran'] = $ukuran[$i];
    			$data['harga'] = $harga[$i];
    			$data['jenis'] = $jenis[$i];
    			$data['id_provider'] = $id;
    			$this->provider_model->insert_lapang($data);
    		}
    	}
    	echo"1";
    }
    public function delete_lapang(){
        $id = $_POST['id'];
        if($this->provider_model->delete_lapang($id)){
            echo "1";
        }else{
            echo "0";
        }
    }
  	public function get_lapangan(){
  		$id = $_POST['idx'];
        $result = $this->provider_model->get_lapang(array("id_provider"=>$id))->result_array();
        echo json_encode($result);
  	}
    public function get_by_id(){
        $id = $_POST['idx'];
        $result = $this->provider_model->get(array("id_provider"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->provider_model->delete($id)){
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

}

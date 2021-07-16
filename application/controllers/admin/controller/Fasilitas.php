<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

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
		$this->load->model(array('fasilitas_model','login_model'));
	}
	public function index(){
		//ngambil data user dari database
		$user = $this->login_model->get();
		$data['userdata'] = $user;

		//check role kalo bukan admin langsung di redirect ke halaman depan
		$this->check_role();

		//init layout
		$data['navbar']='admin/navbar_admin';
		$data['content']='admin/fasilitas_content';
		$data['slide']=null;
		$data['sidebar']='admin/sidebar_admin';
		$data['title']='Fasilitas';

		//init data
		$data['fasilitas'] = $this->fasilitas_model->get()->result_array();

		$data['scripts'] = array('js/admin/fasilitas.js','plugin/form-validation/jquery.validate.min.js','plugin/bootbox/bootbox.js','js/bootstrap-datepicker.min.js');
		$this->load->view('admin/tamplate_admin',$data);
	}
	function check_role(){
		$user = $this->login_model->get();
		if(isset($user)){
			if($user['role'] == 1){
			// $this->session->set_flashdata('form_msg', array('success' =>true, 'fail'=> false, 'msg' => 'Login Success'));
				// redirect('welcome');
			
			}else if($user['role'] == 2){
					redirect('admin_provider');
			}else{
				redirect('welcome');
			}
		}else{
			redirect('login');
		}
	}	
	public function post(){
        $data['nama_fasilitas'] = $_POST['nama_fasilitas'];
        $data['deskripsi'] = $_POST['deskripsi'];
        if($_POST['id_fasilitas'] == 0){
            
            if($this->fasilitas_model->add($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
           
            if($this->fasilitas_model->update($_POST['id_fasilitas'],$data)){
                echo "1";
            }else{
                echo "0";
            }
        }
    }
    public function get_by_id(){
        $id = $_POST['idx'];
        $result = $this->fasilitas_model->get(array("id_fasilitas"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->fasilitas_model->delete($id)){
            echo "1";
        }else{
            echo "0";
        }
    }

}

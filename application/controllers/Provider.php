<?php
class Provider extends CI_Controller{

function index()
{
	$data['provider']=$this->MProvider->get_data()->row_array();
	$this->load->view('content',$data);
	print_r($data['provider']);
	}
}
?>
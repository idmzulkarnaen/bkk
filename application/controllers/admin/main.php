<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/utama";
		$data['title']="Dashboard";
		$data['judul']="Dashboard";
		$this->load->view('admin/index',$data);
	}

	

	

}

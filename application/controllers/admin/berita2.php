<?php
class Berita2 extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$isi['judul']="Daftar Berita";
		$isi['konten']="admin/berita2";
		$isi['aksi']="Daftar";

		$isi['result']=$this->model_crud->selectData("berita");
		$this->load->view('admin/index',$isi);
	}

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$isi['konten'] = "admin/alumni";
		$isi['judul'] = "Data Alumni";
		$isi['halaman'] = "tampil";
		$isi['query'] = $this->model_crud->selectData("user order by id_user asc");
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['konten'] = "admin/alumni";
		$isi['judul'] = "Data Alumni";
		$isi['halaman'] = "tambah";
		$this->load->view('admin/index',$isi);
	}

	public function edit($id)
	{
		$isi['konten'] = "admin/alumni";
		$isi['judul'] = "Data Alumni";
		$isi['halaman'] = "edit";
		$isi['query'] = $this->model_crud->selectData("user","*","id_user='$id'");
		$this->load->view('admin/index',$isi);
	}


	public function proses_tambah()
	{
		
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		$jk = $this->input->post('jk');
		$jurusan = $this->input->post('jurusan');

		$simpan = $this->model_crud->saveData("user","nama, nis, jurusan, jk","'$nama','$nis','$jurusan','jk'");

		redirect('admin/alumni');

	}

	public function proses_ubah()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		$jk = $this->input->post('jk');
		$jurusan = $this->input->post('jurusan');

		$simpan = $this->model_crud->updateData("user","nama='$nama', nis='$nis', jurusan='$jurusan', jk='jk'","id_user='$id'");

		redirect('admin/alumni');

	}


}	
	?>
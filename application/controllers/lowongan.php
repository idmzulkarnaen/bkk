<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$this->model_function->cekuser();
		$data['konten']="lowongan";
		$data['aksi']="list";

		$q = $this->input->get('q');
		$kunci = $this->input->post('kunci');
		$perusahaan = $this->input->post('perusahaan');
		$data['kunci']= $perusahaan;
		if($q=="terlewat"){
			$data['jloker']=$this->model_crud->cekData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan ","where tutup < '".date('Y-m-d')."' order by id_loker desc");
			$data['rloker']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan","*, b.foto as foto_perusahaan","tutup < '".date('Y-m-d')."' order by id_loker desc");
		}else if($kunci!=""){
			if($perusahaan=='0'){
				$data['jloker']=$this->model_crud->cekData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan ","where  a.nama_loker like '%$kunci%' or b.nama_perusahaan like '%$kunci%' or a.wilayah like '%$kunci%' or a.ket like '%$kunci%' or a.tgl_test like '%$kunci%' or a.tempat_test like '%$kunci%' or a.tutup like '%$kunci%' order by id_loker desc");
				$data['rloker']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan","*, b.foto as foto_perusahaan"," a.nama_loker like '%$kunci%' or b.nama_perusahaan like '%$kunci%' or a.wilayah like '%$kunci%' or a.ket like '%$kunci%' or a.tgl_test like '%$kunci%' or a.tempat_test like '%$kunci%' or a.tutup like '%$kunci%' order by id_loker desc");
			}else{
				$data['jloker']=$this->model_crud->cekData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan ","where (a.nama_loker like '%$kunci%' or b.nama_perusahaan like '%$kunci%' or a.wilayah like '%$kunci%' or a.ket like '%$kunci%' or a.tgl_test like '%$kunci%' or a.tempat_test like '%$kunci%' or a.tutup like '%$kunci%') and a.id_perusahaan='$perusahaan' order by id_loker desc");
				$data['rloker']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan","*, b.foto as foto_perusahaan"," (a.nama_loker like '%$kunci%' or b.nama_perusahaan like '%$kunci%' or a.wilayah like '%$kunci%' or a.ket like '%$kunci%' or a.tgl_test like '%$kunci%' or a.tempat_test like '%$kunci%' or a.tutup like '%$kunci%') and a.id_perusahaan='$perusahaan' order by id_loker desc");
			}
		}else{
			if($perusahaan=='0' || $perusahaan==""){
				$data['jloker']=$this->model_crud->cekData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan ","where tutup >= '".date('Y-m-d')."' order by id_loker desc");
				$data['rloker']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan","*, b.foto as foto_perusahaan","tutup >= '".date('Y-m-d')."' order by id_loker desc");
			}else{
				$data['jloker']=$this->model_crud->cekData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan ","where a.id_perusahaan='$perusahaan' order by id_loker desc");
				$data['rloker']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan","*, b.foto as foto_perusahaan","a.id_perusahaan='$perusahaan' order by id_loker desc");
			}
		}
		
		$data['result']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan order by a.id_loker desc");
		$data['rperusahaan']=$this->model_crud->selectData("perusahaan order by nama_perusahaan asc");
		$this->load->view('index',$data);
	}


	public function detail($id)
	{
		$this->model_function->cekuser();
		$data['konten']="lowongan";
		$data['aksi']="detail";
		$data['result']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan","*, b.foto as foto_perusahaan","a.id_loker = '$id'");
		$this->load->view('index',$data);
	}

	public function daftar($id)
	{
		$this->model_function->cekuser();
		$id_user = $this->session->userdata('iduser');
		$data['konten']="lowongan";
		$data['aksi']="detail";
		$data['result']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan","*, b.foto as foto_perusahaan","a.id_loker = '$id'");
		$this->load->view('index',$data);
	}

	
	

	
}

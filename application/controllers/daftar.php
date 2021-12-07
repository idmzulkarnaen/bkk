<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$this->model_function->cekuser();
		$data['konten']="daftar";
		$data['aksi']="list";
		$id_user = $this->session->userdata('iduser');
		$data['jloker']=$this->model_crud->cekData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan  join daftar c on a.id_loker = c.id_loker","where c.id_user='$id_user' order by a.id_loker desc");
		$data['rloker']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan join daftar c on a.id_loker = c.id_loker","*, b.foto as foto_perusahaan"," c.id_user='$id_user' order by a.id_loker desc");
		
		$data['result']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan order by a.id_loker desc");
		$data['rperusahaan']=$this->model_crud->selectData("perusahaan order by nama_perusahaan asc");
		$this->load->view('index',$data);
	}


	public function proses_daftar($id)
	{
		$this->model_function->cekuser();
		$id_user = $this->session->userdata('iduser');
		$simpan = $this->model_crud->saveData("daftar","id_daftar,id_loker,id_user, tgl","null, '$id', '$id_user',now()");
		if($simpan){
	            $this->session->set_flashdata('info',"Pendaftaraan berhasil");
	            redirect('daftar');                        
	        }else{
	            $this->session->set_flashdata('info2',"Pendaftaraan gagal");
	            redirect('daftar');
	        }
	}

	public function tambah_lampiran()
	{
		$this->model_function->cekuser();

			$id_daftar = $this->input->post('daftar');

			$query = $this->model_crud->selectData("loker a  join daftar c on a.id_loker = c.id_loker","*"," c.id_daftar='$id_daftar' ");
			foreach ($query as $r) {
				$tutup = $r->tutup;
			}

			if($tutup >= date('Y-m-d')){

	        $judul = $this->input->post('judul');
	        $config['upload_path']          = BASEPATH.'../assets/file/lampiran/';
	        $config['allowed_types']        = 'gif|jpg|png|pdf|docx';
	        $config['max_size']             = 1000;
	        $config['file_name']			= $judul;

	        $upload= $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('file'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->session->set_flashdata('info1',$error);
	                        redirect('daftar');
	                }
	                else
	                {
	                	    $data =  $this->upload->data();
	                        $save = $this->model_crud->saveData("lampiran","id_lampiran,id_daftar,judul,file","null,'".$id_daftar."','".$judul."','".$data['file_name']."'");      
	                }
            

           if($save){
	            $this->session->set_flashdata('info',"Lampiran berhasil ditambah");
	            redirect('daftar');                        
	        }else{
	            $this->session->set_flashdata('info2',"Lampiran gagal ditambah");
	            redirect('daftar');
	        }
	    }else{
	    	$this->session->set_flashdata('info2',"Lampiran gagal ditambah. Pendaftaran telah ditutup");
	            redirect('daftar');
	    }
	}


	public function hapus_lampiran($id)
	{
		$query = $this->model_crud->selectData('lampiran',"*","id_lampiran='$id'");
			foreach ($query as $row) {
				unlink(BASEPATH.'../assets/file/lampiran/'.$row->file);
			}

		$hapus = $this->model_crud->deleteData("lampiran","id_lampiran='$id'");

		if($hapus){
	            $this->session->set_flashdata('info',"Lampiran berhasil dihapus");
	            redirect('daftar');                        
	        }else{
	            $this->session->set_flashdata('info2',"Lampiran gagal dihapus");
	            redirect('daftar'.$id);
	        }
	}

	public function batal($id)
	{
		$cek = $this->model_crud->cekData('lampiran',"where id_daftar='$id'");
		if($cek>0){
			$query = $this->model_crud->selectData('lampiran',"*","id_daftar='$id'");
				foreach ($query as $row) {
					unlink(BASEPATH.'../assets/file/lampiran/'.$row->file);
				}

			$this->model_crud->deleteData("lampiran","id_daftar='$id'");
		}
		$hapus = $this->model_crud->deleteData("daftar","id_daftar='$id'");

		if($hapus){
	            $this->session->set_flashdata('info',"Lamaran Kerja berhasil dibatalkan");
	            redirect('daftar');                        
	        }else{
	            $this->session->set_flashdata('info2',"Lamran Kerja gagal dibatalkan");
	            redirect('daftar'.$id);
	        }
	}



	
	

	
}

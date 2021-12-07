<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lamaran extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/lamaran";
		$data['judul']="Data Lamaran ";
		$data['aksi']="Daftar";
		$data['result']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan join daftar c on a.id_loker = c.id_loker join user d on c.id_user=d.id_user order by c.id_daftar desc");
		$this->load->view('admin/index',$data);
	}



	

	public function hapus($id)
	{
		$query = $this->model_crud->selectData('daftar',"*","id_daftar='$id'");
			foreach ($query as $row) {
				unlink(BASEPATH.'../assets/photos/lamaran/'.$row->foto);
			}

		$hapus = $this->model_crud->deleteData("daftar","id_daftar='$id'");

		if($hapus){
	            $this->session->set_flashdata('info',"Data lamaran berhasil dihapus");
	            redirect('admin/lamaran');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data lamaran gagal dihapus");
	            redirect('admin/lamaran'.$id);
	        }
	}
	

	
}

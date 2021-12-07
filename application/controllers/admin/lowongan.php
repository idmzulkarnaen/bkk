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
		$this->model_function->cekadmin();
		$data['konten']="admin/lowongan";
		$data['judul']="Data Lowongan";
		$data['aksi']="Daftar";
		$data['result']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan order by a.id_loker desc");
		$this->load->view('admin/index',$data);
	}

	public function ubah($id)
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/lowongan";
		$data['judul']="Ubah Data Lowongan";
		$data['aksi']="Ubah";
		$data['result']=$this->model_crud->selectData("loker","*","id_loker='$id'");
		$this->load->view('admin/index',$data);
	}

	public function tambah()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/lowongan";
		$data['judul']="Tambah Data Lowongan";
		$data['aksi']="Tambah";
		$this->load->view('admin/index',$data);
	}

	public function proses_tambah()
	{
		$nama = $this->input->post('nama');
        $wilayah= $this->input->post('wilayah');
        $butuh = $this->input->post('butuh');
        $tutup = $this->input->post('tutup');
        $id_perusahaan = $this->input->post('id_perusahaan');
        $tgl = $this->input->post('tgl');
        $tempat = $this->input->post('tempat');
        $syarat = $this->input->post('syarat');
        $ket = $this->input->post('ket');

		$save = $this->model_crud->saveData("loker","id_loker,nama_loker,wilayah,id_perusahaan,butuh,syarat,tempat_test,tgl_test,tutup,ket","null,'".$nama."','".$wilayah."','".$id_perusahaan."','".$butuh."','".$syarat."','".$tempat."','".$tgl."','".$tutup."','".$ket."'");      
	   

           if($save){
	            $this->session->set_flashdata('info',"Data Lowongan berhasil ditambah");
	            redirect('admin/Lowongan');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Lowongan gagal ditambah");
	            redirect('admin/Lowongan/tambah');
	        }
	}


	public function proses_ubah($id)
	{
		$nama = $this->input->post('nama');
        $wilayah= $this->input->post('wilayah');
        $butuh = $this->input->post('butuh');
        $tutup = $this->input->post('tutup');
        $id_perusahaan = $this->input->post('id_perusahaan');
        $tgl = $this->input->post('tgl');
        $tempat = $this->input->post('tempat');
        $syarat = $this->input->post('syarat');
        $ket = $this->input->post('ket');

		
	    $update = $this->model_crud->updateData("loker","nama_loker='".$nama."',wilayah='".$wilayah."',butuh='".$butuh."',tutup='".$tutup."',id_perusahaan='".$id_perusahaan."',tgl_test='".$tgl."',tempat_test='".$tempat."',syarat='".$syarat."',ket='".$ket."'","id_loker='".$id."'");
	   

           if($update){
	            $this->session->set_flashdata('info',"Data Lowongan berhasil diubah");
	            redirect('admin/lowongan');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Lowongan gagal diubah");
	            redirect('admin/lowongan/ubah/'.$id);
	        }
	}

	public function hapus($id)
	{
		$query = $this->model_crud->selectData('loker',"*","id_loker='$id'");
			foreach ($query as $row) {
				unlink(BASEPATH.'../assets/photos/Lowongan/'.$row->foto);
			}

		$hapus = $this->model_crud->deleteData("loker","id_loker='$id'");

		if($hapus){
	            $this->session->set_flashdata('info',"Data Lowongan berhasil dihapus");
	            redirect('admin/Lowongan');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Lowongan gagal dihapus");
	            redirect('admin/Lowongan'.$id);
	        }
	}
	

	
}

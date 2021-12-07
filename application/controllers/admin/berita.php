<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/berita";
		$data['judul']="Data Berita ";
		$data['aksi']="Daftar";
		$data['result']=$this->model_crud->selectData("berita order by id_berita desc");
		$this->load->view('admin/index',$data);
	}



	public function tambah_berita()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/berita";
		$data['judul']="Tambah Berita ";
		$data['aksi']="Tambah";
		$this->load->view('admin/index',$data);
	}

	public function sunting($id)
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/berita";
		$data['judul']="Sunting Berita ";
		$data['aksi']="Sunting";
		$data['result']=$this->model_crud->selectData("berita","*","id_berita='$id' order by id_berita desc");
		$this->load->view('admin/index',$data);
	}

	public function lihat_berita($id)
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/berita";
		$data['judul']="Lihat Berita ";
		$data['aksi']="Lihat";
		$data['result']=$this->model_crud->selectData("berita a inner join admin b on a.id_admin = b.id_admin where a.id_berita='".$id."' order by a.tgl desc");
		$data['reskomen']=$this->model_crud->selectData("detail_berita where id_berita='".$id."' order by tgl asc");
		$data['cekkomen']=$this->model_crud->cekData("detail_berita where id_berita='".$id."'");
		$this->load->view('admin/index',$data);
	}


	public function proses_tambah()
	{
		$id_admin = $this->session->userdata('idadmin');
		$judul = $this->input->post('judul');
		$konten = $this->input->post('isi');
	    $simpan = $this->model_crud->saveData("berita","id_berita,id_admin,judul,isi,tgl","null,'".$id_admin."','".$judul."','".$konten."',now()");
	    
	    if($simpan){
	            $this->session->set_flashdata('info',"Berita berhasil ditambah");
	            redirect('admin/berita');                        
	        }else{
	            $this->session->set_flashdata('info2',"Berita gagal ditambah");
	            redirect('admin/berita'.$id);
	        }
	}

	public function proses_sunting($id)
	{
		$id_admin = $this->session->userdata('idadmin');
		$judul = $this->input->post('judul');
		$konten = $this->input->post('isi');
	    $update = $this->model_crud->updateData("berita","judul='".$judul."',isi='".$konten."'","id_berita='$id'");
	    
	    if($update){
	            $this->session->set_flashdata('info',"Berita berhasil diubah");
	            redirect('admin/berita');                        
	        }else{
	            $this->session->set_flashdata('info2',"Berita gagal diubah");
	            redirect('admin/berita'.$id);
	        }
	}


	public function komentar_admin($id)
	{
		$url = $this->input->post('url');
		$id_admin = $this->session->userdata('idadmin');
		$komen = $this->input->post('komen');
	    $this->model_crud->saveData("detail_berita","id_berita,id_admin,id_user,komentar,tgl","'".$id."','".$id_admin."','0','".$komen."',now()");
	    $this->session->set_flashdata("info","komentar Berhasil");
	    if($url!=""){
	    	redirect('admin/'.$url);
	    }else{
		    redirect('admin/berita/lihat_berita/'.$id);
		}
	}


	

	public function hapus($id)
	{
		$query = $this->model_crud->selectData('daftar',"*","id_daftar='$id'");
			foreach ($query as $row) {
				unlink(BASEPATH.'../assets/photos/berita/'.$row->foto);
			}

		$hapus = $this->model_crud->deleteData("daftar","id_daftar='$id'");

		if($hapus){
	            $this->session->set_flashdata('info',"Data berita berhasil dihapus");
	            redirect('admin/berita');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data berita gagal dihapus");
	            redirect('admin/berita'.$id);
	        }
	}
	

	
}

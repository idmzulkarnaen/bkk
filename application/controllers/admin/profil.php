<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/profil";
		$data['judul']="Profil Admin";
		$data['aksi']="Daftar";
		$id_admin = $this->session->userdata('idadmin');
		$data['result']=$this->model_crud->selectData("admin","*","id_admin='$id_admin'");
		$this->load->view('admin/index',$data);
	}

	public function visimisi()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/form";
		$data['judul']="Visi & Misi";
		$data['j']="visimisi";
		$data['result']=$this->model_crud->selectData("modul","*","id_modul='1'");
		$this->load->view('admin/index',$data);
	}

	public function struktur()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/form";
		$data['judul']="Struktur Organisasi";
		$data['j']="struktur";
		$data['result']=$this->model_crud->selectData("modul","*","id_modul='2'");
		$this->load->view('admin/index',$data);
	}

	public function ubah_password()
	{
		$this->model_function->cekadmin();
		$id = $this->session->userdata('idadmin');
        $pwd = $this->input->post('pwd');
        $pwd1 = $this->input->post('pwd1');
        $pwd2 = $this->input->post('pwd2');

		if($pwd1!=$pwd2){
		            $this->session->set_flashdata('info4',"Password tidak sama");
		            redirect('admin/profil');
		}else{
	        
	        $query = $this->model_crud->cekData('admin',"where id_admin='$id' and pwd=md5('$pwd')");
			
	        if($query>0){
				$update = $this->model_crud->updateData("admin","pwd=md5('".$pwd2."')","id_admin='".$id."'");
	        

	           if($update){
		            $this->session->set_flashdata('info3',"Password berhasil diubah");
		            redirect('admin/profil');                        
		        }else{
		            $this->session->set_flashdata('info4',"Password gagal diubah");
		            redirect('admin/profil');
		        }
		    }else{
		            $this->session->set_flashdata('info4',"Password salah");
		            redirect('admin/profil');
		    }
	    }
	}

	public function ubah_profil()
	{
		$this->model_function->cekadmin();
		$id = $this->session->userdata('idadmin');
		$nama = $this->input->post('nama');
        $user = $this->input->post('user');

		
	                        	$update = $this->model_crud->updateData("admin","nama='".$nama."',user='".$user."'","id_admin='".$id."'");
	                        

           if($update){
	            $this->session->set_flashdata('info',"Profil berhasil diubah");
	            redirect('admin/profil');                        
	        }else{
	            $this->session->set_flashdata('info2',"Profil gagal diubah");
	            redirect('admin/profil');
	        }
	}


	public function ubah_modul()
	{
		$jenis = $this->input->get('j');
		$id = $this->input->get('id');
		$this->model_function->cekadmin();
		$konten = $this->input->post('konten');
        $judul = $this->input->post('judul');

		$update = $this->model_crud->updateData("modul","judul='".$judul."',konten='".$konten."'","id_modul='$id'");
	                        

           if($update){
	            $this->session->set_flashdata('info',"Profil berhasil diubah");
	                                   
	        }else{
	            $this->session->set_flashdata('info2',"Profil gagal diubah");
	        }

	    redirect('admin/profil/'.$jenis); 

	}


	
}

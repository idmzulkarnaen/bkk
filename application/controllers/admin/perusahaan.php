<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/perusahaan";
		$data['judul']="Data Perusahaan";
		$data['aksi']="Daftar";
		$data['result']=$this->model_crud->selectData("perusahaan order by nama_perusahaan asc");
		$this->load->view('admin/index',$data);
	}

	public function ubah($id)
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/perusahaan";
		$data['judul']="Ubah Data Perusahaan";
		$data['aksi']="Ubah";
		$data['result']=$this->model_crud->selectData("perusahaan","*","id_perusahaan='$id'");
		$this->load->view('admin/index',$data);
	}

	public function tambah()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/perusahaan";
		$data['judul']="Tambah Data Perusahaan";
		$data['aksi']="Tambah";
		$this->load->view('admin/index',$data);
	}

	public function proses_tambah()
	{
		$nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $ket = $this->input->post('ket');
        $pwd = $this->input->post('pwd');

		if( $_FILES['foto']['tmp_name']!=""){
	        $config['upload_path']          = BASEPATH.'../assets/photos/perusahaan/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;

	        $upload= $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('foto'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->session->set_flashdata('info1',$error);
	                        redirect('admin/perusahaan/tambah');
	                }
	                else
	                {

	                        $data =  $this->upload->data();
	                        $save = $this->model_crud->saveData("perusahaan","id_perusahaan,nama_perusahaan,alamat,email,hp,pwd,keterangan,foto","null,'".$nama."','".$alamat."','".$email."','".$hp."',md5('".$pwd."'),'".$ket."','".$data['file_name']."'");      
	                }
            }else{
            	 $save = $this->model_crud->saveData("perusahaan","id_perusahaan,nama_perusahaan,alamat,email,hp,pwd,keterangan","null,'".$nama."','".$alamat."','".$email."','".$hp."',md5('".$pwd."'),'".$ket."'");      
            }

           if($save){
	            $this->session->set_flashdata('info',"Data Perusahaan berhasil ditambah");
	            redirect('admin/perusahaan');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Perusahaan gagal ditambah");
	            redirect('admin/perusahaan/tambah');
	        }
	}


	public function proses_ubah($id)
	{
		$nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $ket = $this->input->post('ket');
        $pwd = $this->input->post('pwd');

		if( $_FILES['foto']['tmp_name']!=""){
	        $config['upload_path']          = BASEPATH.'../assets/photos/perusahaan/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;

	        $upload= $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('foto'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->session->set_flashdata('info1',$error);
	                        redirect('admin/perusahaan/ubah/'.$id);
	                }
	                else
	                {

	                        $data =  $this->upload->data();
	                        if($pwd==""){
	                        	$update = $this->model_crud->updateData("perusahaan","nama_perusahaan='".$nama."',alamat='".$alamat."',email='".$email."',hp='".$hp."',keterangan='".$ket."',foto='".$data['file_name']."'","id_perusahaan='".$id."'");
	                        }else{
	                        	$update = $this->model_crud->updateData("perusahaan","nama_perusahaan='".$nama."',alamat='".$alamat."',email='".$email."',hp='".$hp."',keterangan='".$ket."',pwd=md5('".$pwd."'),foto='".$data['file_name']."'","id_perusahaan='".$id."'");
	                        }
	                        
	                }
            }else{
            	 if($pwd==""){
	                        	$update = $this->model_crud->updateData("perusahaan","nama_perusahaan='".$nama."',alamat='".$alamat."',email='".$email."',hp='".$hp."',keterangan='".$ket."'","id_perusahaan='".$id."'");
	                        }else{
	                        	$update = $this->model_crud->updateData("perusahaan","nama_perusahaan='".$nama."',alamat='".$alamat."',email='".$email."',hp='".$hp."',keterangan='".$ket."',pwd=md5('".$pwd."')","id_perusahaan='".$id."'");
	                        }
            }

           if($update){
	            $this->session->set_flashdata('info',"Data Perusahaan berhasil diubah");
	            redirect('admin/perusahaan');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Perusahaan gagal diubah");
	            redirect('admin/perusahaan/ubah/'.$id);
	        }
	}
	

	public function hapus($id)
	{
		$query = $this->model_crud->selectData('perusahaan',"*","id_perusahaan='$id'");
			foreach ($query as $row) {
				unlink(BASEPATH.'../assets/photos/perusahaan/'.$row->foto);
			}

		$hapus = $this->model_crud->deleteData("perusahaan","id_perusahaan='$id'");

		if($hapus){
	            $this->session->set_flashdata('info',"Data Perusahaan berhasil dihapus");
	            redirect('admin/perusahaan');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Perusahaan gagal dihapus");
	            redirect('admin/perusahaan'.$id);
	        }
	}

	
}

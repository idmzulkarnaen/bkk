<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/siswa";
		$data['judul']="Data Alumni";
		$data['aksi']="Daftar";
		$data['result']=$this->model_crud->selectData("user order by nis asc");
		$this->load->view('admin/index',$data);
	}

	public function ubah($id)
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/siswa";
		$data['judul']="Ubah Data Alumni";
		$data['aksi']="Ubah";
		$data['result']=$this->model_crud->selectData("user","*","id_user='$id'");
		$this->load->view('admin/index',$data);
	}

	public function tambah()
	{
		$this->model_function->cekadmin();
		$data['konten']="admin/siswa";
		$data['judul']="Tambah Data Alumni";
		$data['aksi']="Tambah";
		$this->load->view('admin/index',$data);
	}

	public function proses_tambah()
	{
		$nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $jurusan = $this->input->post('jurusan');
        $jk = $this->input->post('jk');
        $pwd = $this->input->post('pwd');
        $nis = $this->input->post('nis');
        $thn = $this->input->post('thn');
        $status = $this->input->post('status');
        $tempat = $this->input->post('tempat');

		if( $_FILES['foto']['tmp_name']!=""){
	        $config['upload_path']          = BASEPATH.'../assets/photos/siswa/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;

	        $upload= $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('foto'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->session->set_flashdata('info1',$error);
	                        redirect('admin/siswa/tambah');
	                }
	                else
	                {

	                        $data =  $this->upload->data();
	                        $save = $this->model_crud->saveData("user","id_user,nama,alamat,email,hp,jurusan,jk,pwd,nis,foto,thn,status,tempat","null,'".$nama."','".$alamat."','".$email."','".$hp."','".$jurusan."','".$jk."',md5('".$pwd."'),'".$nis."','".$data['file_name']."','".$thn."','".$status."','".$tempat."'");      
	                }
            }else{
            	 $save = $this->model_crud->saveData("user","id_user,nama,alamat,email,hp,jurusan,jk,pwd,nis,thn,status,tempat","null,'".$nama."','".$alamat."','".$email."','".$hp."','".$jurusan."','".$jk."',md5('".$pwd."'),'".$nis."','".$thn."','".$status."','".$tempat."'");      
            }

           if($save){
	            $this->session->set_flashdata('info',"Data Alumni berhasil ditambah");
	            redirect('admin/siswa');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Alumni gagal ditambah");
	            redirect('admin/siswa/tambah');
	        }
	}


	public function proses_ubah($id)
	{
		$nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $jurusan = $this->input->post('jurusan');
        $jk = $this->input->post('jk');
        $pwd = $this->input->post('pwd');
        $nis = $this->input->post('nis');
        $thn = $this->input->post('thn');
        $status = $this->input->post('status');
        $tempat = $this->input->post('tempat');

		if( $_FILES['foto']['tmp_name']!=""){
	        $config['upload_path']          = BASEPATH.'../assets/photos/siswa/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;

	        $upload= $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('foto'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->session->set_flashdata('info1',$error);
	                        redirect('admin/siswa/ubah/'.$id);
	                }
	                else
	                {
	                		$query = $this->model_crud->selectData('user',"*","id_user='$id'");
							foreach ($query as $row) {
								unlink(BASEPATH.'../assets/photos/siswa/'.$row->foto);
							}

	                        $data =  $this->upload->data();
	                        if($pwd==""){
	                        	$update = $this->model_crud->updateData("user","nama='".$nama."',alamat='".$alamat."',email='".$email."',hp='".$hp."',jurusan='".$jurusan."',jk='".$jk."',nis='".$nis."',thn='".$thn."',status='".$status."',tempat='".$tempat."',foto='".$data['file_name']."'","id_user='".$id."'");
	                        }else{
	                        	$update = $this->model_crud->updateData("user","nama='".$nama."',alamat='".$alamat."',email='".$email."',hp='".$hp."',jurusan='".$jurusan."',jk='".$jk."',pwd=md5('".$pwd."'),nis='".$nis."',thn='".$thn."',status='".$status."',tempat='".$tempat."',foto='".$data['file_name']."'","id_user='".$id."'");
	                        }
	                        
	                }
            }else{
            	 if($pwd==""){
	                        	$update = $this->model_crud->updateData("user","nama='".$nama."',alamat='".$alamat."',email='".$email."',hp='".$hp."',jurusan='".$jurusan."',jk='".$jk."',nis='".$nis."',thn='".$thn."',status='".$status."',tempat='".$tempat."'","id_user='".$id."'");
	                        }else{
	                        	$update = $this->model_crud->updateData("user","nama='".$nama."',alamat='".$alamat."',email='".$email."',hp='".$hp."',jurusan='".$jurusan."',jk='".$jk."',pwd=md5('".$pwd."'),nis='".$nis."',thn='".$thn."',status='".$status."',tempat='".$tempat."'","id_user='".$id."'");
	                        }
            }

           if($update){
	            $this->session->set_flashdata('info',"Data Alumni berhasil diubah");
	            redirect('admin/siswa');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Alumni gagal diubah");
	            redirect('admin/siswa/ubah/'.$id);
	        }
	}

	public function hapus($id)
	{
		$query = $this->model_crud->selectData('user',"*","id_user='$id'");
			foreach ($query as $row) {
				unlink(BASEPATH.'../assets/photos/siswa/'.$row->foto);
			}

		$hapus = $this->model_crud->deleteData("user","id_user='$id'");

		if($hapus){
	            $this->session->set_flashdata('info',"Data Alumni berhasil dihapus");
	            redirect('admin/siswa');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Alumni gagal dihapus");
	            redirect('admin/siswa'.$id);
	        }
	}
	

	
}

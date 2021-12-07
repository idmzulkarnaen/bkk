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
		$this->model_function->cekuser();
		$data['konten']="profil";
		$data['aksi']="list";
		$id_user = $this->session->userdata('iduser');
		$data['result']=$this->model_crud->selectData("user","*","id_user='$id_user'");

		$this->load->view('index',$data);
	}

	public function visimisi()
	{
		$this->model_function->cekuser();
		$data['konten']="konten";
		$data['result']=$this->model_crud->selectData("modul","*","id_modul='1'");

		$this->load->view('index',$data);
	}

	public function struktur()
	{
		$this->model_function->cekuser();
		$data['konten']="konten";
		$data['result']=$this->model_crud->selectData("modul","*","id_modul='2'");

		$this->load->view('index',$data);
	}


	public function proses_ubah()
	{
		$this->model_function->cekuser();
		$id = $this->session->userdata('iduser');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $jk = $this->input->post('jk');
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
	                        redirect('profil');
	                }
	                else
	                {
	                	$query = $this->model_crud->selectData('user',"*","id_user='$id'");
						foreach ($query as $row) {
							unlink(BASEPATH.'../assets/photos/siswa/'.$row->foto);
						}

	                        $data =  $this->upload->data();

	                        	$update = $this->model_crud->updateData("user","alamat='".$alamat."',email='".$email."',hp='".$hp."',jk='".$jk."',tempat='".$tempat."',status='".$status."',foto='".$data['file_name']."'","id_user='".$id."'");

	                        
	                }
            }else{
	                        	$update = $this->model_crud->updateData("user","alamat='".$alamat."',email='".$email."',hp='".$hp."',jk='".$jk."',tempat='".$tempat."',status='".$status."'","id_user='".$id."'");

            }

           if($update){
	            $this->session->set_flashdata('info',"Profil berhasil diubah");
	            redirect('profil');                        
	        }else{
	            $this->session->set_flashdata('info2',"Profil gagal diubah");
	            redirect('profil');
	        }
	}

	public function ubah_password()
	{
		$this->model_function->cekuser();
		$id = $this->session->userdata('iduser');
        $pwd = $this->input->post('pwd');
        $pwd1 = $this->input->post('pwd1');
        $pwd2 = $this->input->post('pwd2');

		if($pwd1!=$pwd2){
			$this->session->set_flashdata('ipwd',"y");
			$this->session->set_flashdata('info2',"Password tidak sama");
	        redirect('profil#password');
		}else{
	        
	        $query = $this->model_crud->cekData('user',"where id_user='$id' and pwd=md5('$pwd')");
			
	        if($query>0){
				$update = $this->model_crud->updateData("user","pwd=md5('".$pwd2."')","id_user='".$id."'");
	        

	           if($update){
	           		$this->session->set_flashdata('ipwd',"y");
		            $this->session->set_flashdata('info',"Password berhasil diubah");
		            redirect('profil#password');                        
		        }else{
		        	$this->session->set_flashdata('ipwd',"y");
		            $this->session->set_flashdata('info2',"Password gagal diubah");
		            redirect('profil#password');
		        }
		    }else{
		    	$this->session->set_flashdata('ipwd',"y");
		    	$this->session->set_flashdata('info2',"Password Salah");
	        	redirect('profil#password');
		    }
	    }
	}

		
}

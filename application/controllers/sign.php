<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$data['konten']="login";
		$this->load->view('index',$data);
	}

	public function proses_signin()
	{
			$nis = $this->input->post('nis');
	        $password = md5($this->input->post('pwd'));

	        $cek = $this->model_crud->cekData("user","WHERE BINARY nis='".$nis."'");
	        $ambildata = $this->model_crud->selectData("user","*","BINARY nis='".$nis."'");

	        foreach ($ambildata as $data) {
	            $iduser = $data->id_user;
	            $namauser = $data->nama;
	            $passuser = $data->pwd;
	        }

	        if($cek == 0) {
	            
	            $this->session->set_flashdata('info',"NIS Salah");
	            redirect('sign');
	            
	        } else {
	            if($password != $passuser) {
	                $this->session->set_flashdata('info',"Password salah");
	            	redirect('sign');
	            } else {
	                $this->session->set_userdata('iduser',$iduser);
	                $this->session->set_userdata('namauser',$namauser);
	                $this->session->set_userdata('nisuser',$nis);
	                redirect('');
	            }
	        }

	}

	public function signout()
	{
		$this->session->unset_userdata('iduser');
	    $this->session->unset_userdata('namauser');
	    $this->session->unset_userdata('nisuser');
	    redirect('sign');
	}

}

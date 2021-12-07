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
		$data['aksi']="Administrator";
		$this->load->view('admin/login',$data);
	}

	public function proses_signin()
	{
			$username = $this->input->post('user');
	        $password = md5($this->input->post('pwd'));

	        $cek = $this->model_crud->cekData("admin","WHERE BINARY user='".$username."'");
	        $ambildata = $this->model_crud->selectData("admin","*","BINARY user='".$username."'");

	        foreach ($ambildata as $data) {
	            $idadmin = $data->id_admin;
	            $useradmin = $data->admin;
	            $passadmin = $data->pwd;
	        }

	        if($cek == 0) {
	            
	            $this->session->set_flashdata('info',"Username Salah");
	            redirect('admin/sign');
	            
	        } else {
	            if($password != $passadmin) {
	                $this->session->set_flashdata('info',"Password salah");
	            	redirect('admin/sign');
	            } else {
	                $this->session->set_userdata('idadmin',$idadmin);
	                $this->session->set_userdata('useradmin',$useradmin);
	                redirect('admin/main');
	            }
	        }

	}

	public function signout()
	{
		$this->session->unset_userdata('idadmin');
	    $this->session->unset_userdata('useradmin');
	    redirect('admin/sign');
	}

}

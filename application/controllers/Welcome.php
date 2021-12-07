<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('model_function');
		$this->model_function->cekuser();
		$data['konten']="utama";
		$this->load->model('model_crud');
		
		$data['jloker']=$this->model_crud->cekData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan ","where tutup >= '".date('Y-m-d')."' order by id_loker desc");
		$data['rloker']=$this->model_crud->selectData("loker a join perusahaan b on a.id_perusahaan = b.id_perusahaan","*, b.foto as foto_perusahaan","tutup >= '".date('Y-m-d')."' order by id_loker desc");
		$data['rperusahaan']=$this->model_crud->selectData("perusahaan order by nama_perusahaan asc");
		$this->load->view('index',$data);
	}
}

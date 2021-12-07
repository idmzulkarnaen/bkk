<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sambutan extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index()
	{
		$isi['konten']="sambutan";
		$this->load->view("index",$isi);
	}
}
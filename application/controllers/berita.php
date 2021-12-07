<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('model_crud');
	   $this->load->model('model_function');

	}

	public function index($offset=0)
	{
		$this->model_function->cekuser();
		$data['konten']="berita";
		$data['aksi']="Daftar";
		$jml = $this->db->get('berita');
	   
	   $config['base_url'] = base_url().'berita/index';
	   
	   $config['total_rows'] = $jml->num_rows();
	   $config['per_page'] = 10; /*Jumlah data yang dipanggil perhalaman*/ 
	   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
	   
	   /*Class bootstrap pagination yang digunakan*/
	   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
	   $config['full_tag_close'] ="</ul>";
	   $config['num_tag_open'] = '<li>';
	   $config['num_tag_close'] = '</li>';
	   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
	   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
	   $config['next_tag_open'] = "<li>";
	   $config['next_tagl_close'] = "</li>";
	   $config['prev_tag_open'] = "<li>";
	   $config['prev_tagl_close'] = "</li>";
	   $config['first_tag_open'] = "<li>";
	   $config['first_tagl_close'] = "</li>";
	   $config['last_tag_open'] = "<li>";
	   $config['last_tagl_close'] = "</li>";
	  
	   $this->pagination->initialize($config);
	   
	   $data['halaman'] = $this->pagination->create_links();
	   /*membuat variable halaman untuk dipanggil di view nantinya*/
	   $data['offset'] = $offset;
	   $data['result'] = $this->model_crud->selectData("berita order by tgl desc limit $offset, ".$config['per_page']);
	   $data['result2'] = $this->model_crud->selectData("berita order by tgl desc limit 5");
	   
	   $this->load->view('index',$data);
	}

	public function detail_berita($id)
	{
		$this->model_function->cekuser();
		$data['konten']="berita";
		$data['aksi']="lihat";
		$data['idp']=$id;
	    $data['reskomen']=$this->model_crud->selectData("detail_berita where id_berita='".$id."' order by tgl asc");
		$data['cekkomen']=$this->model_crud->cekData("detail_berita where id_berita='".$id."'");
		$data['result'] = $this->model_crud->selectData("berita","*","id_berita='$id'");
	   
	   $this->load->view('index',$data);
	}


	public function komentar_user($id)
	{
		$id_user = $this->session->userdata('iduser');
		$komen = $this->input->post('komen');
	    $this->model_crud->saveData("detail_berita","id_berita,id_admin,id_user,komentar,tgl","'".$id."','0','".$id_user."','".$komen."',now()");

	    redirect('berita/detail_berita/'.$id);
	}


	
	
}

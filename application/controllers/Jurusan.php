<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller 
{
	public function __construct()   
	{     
	 parent::__construct();
	  $this->load->helper('url');   
	  $this->load->helper('form');   
	  $this->load->library('session');   
      $this->load->model('jurusan_model');
	  $this->load->library('pdf');
	  $user = $this->session->email;
	  if(empty($user)){
		$this->session->set_flashdata('message','<div class=
		"alert-success" role="alert">You must be login!</div>');
		 redirect('auth');
	  } 
    }

    public function index(){
		$data['title'] = 'Jurusan';
		$this->load->view('partial/head',$data);
		$data['data_jurusan'] =  $this->jurusan_model->get();   
    	$data['jumlah_data']  =  $this->jurusan_model->get();
		$data['user'] = $this->db->get_where('user',['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('partial/header',$data);
		$this->load->view('partial/leftbar',$data);
		$this->load->view('jurusan/index',$data);
		$this->load->view('partial/rightbar',$data);
		$this->load->view('partial/footer');  
	}


	public function form_insert()   
	{   
		 $this->form_validation->set_rules('id','ID','required|trim|alpha_numeric|is_unique[tb_jurusan.id]',[
			'is_unique' => '<div class=
			"alert-danger" role="alert">ID has been used!</div>' 
		]);
		 $this->form_validation->set_rules('namaJurusan','Nama Jurusan','required|min_length[3]|max_length[20]');    
		
		 if ($this->form_validation->run() === FALSE)
		 {   
			$data['title'] = 'ADD';
			$this->load->view('partial/head',$data);
			$data['user'] = $this->db->get_where('user',['email' =>
			$this->session->userdata('email')])->row_array();
			$this->load->view('partial/header',$data); 
			$this->load->view('partial/leftbar',$data);
			$this->load->view('jurusan/add');
			$this->load->view('partial/rightbar',$data);
			$this->load->view('partial/footer');   
		 }else{

			$data['id'] = $this->input->post('id');
		  	$data['namaJurusan'] = $this->input->post('namaJurusan');

		  $this->jurusan_model->insert($data);  
		  redirect('jurusan','refresh'); 
		 }    
	}   

	public function ubah($id)   
	{   
		$data['title'] = 'Edit';
		$data['user'] = $this->db->get_where('user',['email' =>
		$this->session->userdata('email')])->row_array();
		 $data['data_jurusan'] =  $this->jurusan_model->get_id($id)->row_array(); 
		 $this->load->view('partial/head',$data);
		 $this->load->view('partial/header',$data);
		 $this->load->view('partial/leftbar',$data);   
		 $this->load->view('jurusan/edit',$data);
		 $this->load->view('partial/footer');   	   
	} 

	public function ubah_data()  
	{   
		$this->form_validation->set_rules('id','ID','required|trim|alpha_numeric');
		 $this->form_validation->set_rules('namaJurusan','Nama Jurusan','required|min_length[3]|max_length[20]');   
		
		 if ($this->form_validation->run() === FALSE)
		 {   
			$data['title'] = 'ADD';
			$this->load->view('partial/head',$data);
			$data['user'] = $this->db->get_where('user',['email' =>
			$this->session->userdata('email')])->row_array();
			$this->load->view('partial/header',$data);
			$this->load->view('partial/leftbar',$data);
			$this->load->view('jurusan/add');
			$this->load->view('partial/rightbar',$data);
			$this->load->view('partial/footer');   
		 }else{

			$syarat['id'] = $this->input->post('id');

			$data['id'] = $this->input->post('id');
			$data['namaJurusan'] = $this->input->post('namaJurusan');      
	
			$this->jurusan_model->update_data($data, $syarat);   
			redirect('jurusan','refresh');
		 }    
	}   
}
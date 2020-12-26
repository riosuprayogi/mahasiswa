<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() == false){
			$data['title'] = 'Admin LTE User Login';
			$this->load->view('partial/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('partial/auth_footer');
		}else{
			$this->_login();		
		}
	}


	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user',['email' => $email])->row_array();
		
		//usernya ada
		if($user){
			//jika usernya aktif
			if($user['is_active'] == 1){
				//cek password
				if(password_verify($password, $user['password'])){
				$data=[
				'email' => $user['email'],
				'role_id' => $user['role_id']
			];
			$this->session->set_userdata($data);
			redirect('user');

				}else{
					$this->session->set_flashdata('message','<div class=
					"alert-danger" role="alert">Wrong Password!</div>');
					redirect('auth');	
				}

			}else{
				$this->session->set_flashdata('message','<div class=
				"alert-warning" role="alert">This email not yet active!</div>');
				redirect('auth');	
			}
		}else{
			$this->session->set_flashdata('message','<div class=
			"alert-danger" role="alert">Email not registered!</div>');
			redirect('auth');
		}
	}


	public function registration()
	{
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => '<div class=
			"alert-danger" role="alert">Email has been registered!</div>'
		]);
		$this->form_validation->set_rules('password1','password','required|trim|min_length[8]|matches[password2]',[
			'matches' => '<div class=
			"alert-danger" role="alert">Password not matches!</div>', 
			'min_length' => '<div class=
			"alert-danger" role="alert">Password too short!</div>'
		]);
		$this->form_validation->set_rules('password2','password','required|trim|min_length[8]|matches[password1]');
		
		if ($this->form_validation->run() == false){
			$data['title'] = 'Admin LTE User Registration';
			$this->load->view('partial/auth_header',$data);
			$this->load->view('auth/registration');
			$this->load->view('partial/auth_footer');
		} else {
			$data =	[
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'),
				PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message','<div class=
			"alert-success" role="alert">Congratulation! Your Register Success!</div>');
			redirect('auth');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message','<div class=
		"alert-success" role="alert">You have been logout!</div>');
		redirect('auth');
	}
}
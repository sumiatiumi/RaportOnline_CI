<?php

class index extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
	}


	public function index(){
		$this->load->view('login');
	}
	public function action(){
		$akses = $this->input->post('akses');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password,
			'akses' => $akses
		);
		$cek = $this->Login->cek_login("user", $where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);
			$this->session->set_userdata($data_session);
 
			redirect(base_url("home"));
 
		}else{
			echo "<script>alert('Username Atau Password Salah')</script>";
			$this->load->view('login');
		} 
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index'));
	}
}

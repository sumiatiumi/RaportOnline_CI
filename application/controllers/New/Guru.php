<?php

class Guru extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_guru");
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$this->load->view('new/guru');
	}

	function add()
	{
		$info = $this->m_guru;
		$info->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('Guru'));
	}
}
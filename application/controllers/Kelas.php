<?php

class Kelas extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_kelas");
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data["kelas"] = $this->m_kelas->getAll();
		$this->load->view('data-kelas', $data);
	}
}
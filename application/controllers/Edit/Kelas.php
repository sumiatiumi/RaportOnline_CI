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
		$this->load->view('edit-kelas', $data);
	}

	function update()
	{
		$info = $this->m_kelas;
		$info->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('Kelas'));
	}
}
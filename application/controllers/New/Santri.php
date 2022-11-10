<?php

class Santri extends CI_Controller{
 
	function __construct(){
		parent::__construct();			
		$this->load->model("m_santri");	
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data["kelas"] = $this->m_santri->getKelas();			
		$data["wali_santri"] = $this->m_santri->getWaliKelas();	
		$this->load->view('new/santri', $data);
	}

	function add()
	{
		$info = $this->m_santri;
		$info->saveSantri();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('Santri'));
	}
	
}
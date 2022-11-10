<?php

class Absensi extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model("m_absensi");	
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data["absensi"] = $this->m_absensi->get_by_role();
		$this->load->view('edit-absensi', $data);
	}

	function update()
	{
		$info = $this->m_absensi;
		$info->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('Absensi'));
	}
}
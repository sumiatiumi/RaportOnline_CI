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
		$data["santri"] = $this->m_absensi->getSantri();
		$data["kelas"] = $this->m_absensi->getKelas();
		$this->load->view('new/absensi', $data);
	}

	function getDataKelas(){
		$id = $this->input->get('kelas');
		$data["santri"] = $this->m_absensi->get_by_value($id);
		$this->load->view('New/get-absensi', $data);
	}

	function add()
	{
		$info = $this->m_absensi;
		$info->saveAbsensi();				
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('Absensi'));
	}
}
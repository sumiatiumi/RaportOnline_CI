<?php

class Nilai extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model("m_nilai");

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){		
		$data["kelas"] = $this->m_nilai->getKelas();		
		$data["santri"] = $this->m_nilai->getSantri();
		$data["mapel"] = $this->m_nilai->getMapel();
		$data["guru"] = $this->m_nilai->getGuru();
		$this->load->view('new/nilai', $data);
	}

	function getDataKelas(){
		$id = $this->input->get('kelas');
		$data["santri"] = $this->m_nilai->get_by_value($id);
		$this->load->view('New/get-nilai', $data);
	}

	function add()
	{
		$info = $this->m_nilai;
		$info->saveNilai();		
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('Nilai'));
	}

}
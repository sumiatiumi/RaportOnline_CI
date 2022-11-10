<?php

class Nilai extends CI_Controller{

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){		
		$this->load->view('edit-nilai');
	}

	function update()
	{
		$info = $this->m_nilai;
		$info->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('Nilai'));
	}
}
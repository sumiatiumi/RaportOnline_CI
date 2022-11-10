<?php

class Santri extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){		
		$this->load->view('edit/santri');
	}

	function update()
	{
		$info = $this->m_Santri;
		$info->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('Santri'));
	}
}
<?php

class Orangtua extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_orangtua");	
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data["orangtua"] = $this->m_orangtua->get_by_role();
		$this->load->view('edit-orangtua', $data);
	}
	function update()
	{
		$info = $this->m_orangtua;
		$info->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('Orangtua'));
	}
}
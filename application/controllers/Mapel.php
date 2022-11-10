<?php

class Mapel extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_mapel");
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data["mapel"] = $this->m_mapel->getAll();
		$this->load->view('data-mapel', $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->m_mapel->delete($id)) {
			redirect(site_url('Mapel'));
		}
 }
}
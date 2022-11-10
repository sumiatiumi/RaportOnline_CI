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
		$this->load->view('data-orangtua', $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->m_orangtua->delete($id)) {
			redirect(site_url('Orangtua'));
		}
	}
}
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
		$data["santri"] = $this->m_santri->get_by_role();
		$data["kelas"] = $this->m_santri->getKelas();
		$this->load->view('data-santri', $data);
	}

	function getDataKelas(){
		$id = $this->input->get('kelas');
		$data["santri"] = $this->m_santri->get_by_class($id);
		$this->load->view('table-santri', $data);
	}

	
public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->m_santri->delete($id)) {
			redirect(site_url('Santri'));
		}
	
}
}
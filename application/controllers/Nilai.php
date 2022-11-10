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
		$data["nilai"] = $this->m_nilai->get_by_role();

		$data["kelas"] = $this->m_nilai->getKelas();
		$data["mapel"] = $this->m_nilai->getMapel();
		$this->load->view('data-nilai', $data);
	}

	function getInfo(){
		$kelas = $this->input->get('kelas');
		$semester = $this->input->get('semester');
		$mapel = $this->input->get('mapel');
		//$package = [$kelas, $semester, $mapel];
		$hasil["nilai"] = $this->m_nilai->get_by_class($mapel);
		var_dump($hasil); die;
		$this->load->view('table-nilai', $hasil);
		$this->load->view('data-nilai', $data);
	}

	 function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->m_nilai->delete($id)) {
			redirect(site_url('Nilai'));
		}
  }
}
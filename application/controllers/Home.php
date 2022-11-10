<?php

class Home extends CI_Controller{
 
	public function __construct(){
		parent::__construct();
		$this->load->model("m_home");		
        $this->load->library('form_validation');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	public function index(){
		$data["pengumuman"] = $this->m_home->getAll();
		$this->load->view("home", $data);
	}
	public function edit_data($where, $table){		
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
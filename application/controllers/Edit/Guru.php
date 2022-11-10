<?php

class Guru extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model("m_guru");
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	public function index(){		
		$this->load->view('Edit/guru');
	}
	

	public function edit($id){
		$where = array('id_guru' => $id);
		$data['guru'] = $this->m_guru->edit_data($where,'guru')->result();
		$this->load->view('edit/guru',$data);
	}

	public function update(){
		$post = $this->input->post();
		$id = $post["id"];
		$nama = $post["nama"];
		$tanggal = $post["tgl"];
		$nomor = $post["nomor"];
		$email = $post["email"];

		$data = array(
			'nama_guru' => $nama,
			'tgl_lahir_guru' => $tanggal,
			'no_hp_guru' => $nomor,
			'email_guru' => $email
		);

		$where = array(
			'id_guru' => $id
		);

		$this->m_guru->update_data($where, $data, 'guru');
		redirect('Guru');
	}
}
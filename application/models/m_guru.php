<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_guru extends CI_Model
{

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$query = $this->db->get();
		return $query->result();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->nama_guru = $post["nama"];
		$this->tgl_lahir_guru = $post["tgl"];
		$this->no_hp_guru = $post["nomor"];
		$this->email_guru = $post["email"];
		$this->db->insert('guru', $this);
	}

	public function getById($id)
	{
		return $this->db->get_where('guru', ["id_guru" => $id])->result();
	}	

	public function delete($id)
	{
		return $this->db->delete('guru', array("id_guru" => $id));
	}

	public function edit_data($where, $table){		
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}



}
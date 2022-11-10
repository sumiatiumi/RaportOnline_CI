<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_mapel extends CI_Model
{

  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('mapel');
    $query = $this->db->get();
    return $query->result();
  }

  public function save()
	{
		$post = $this->input->post();
		$this->kd_mapel = $post["kode"];
		$this->mapel = $post["nama"];
		$this->db->insert('mapel', $this);
	}
  
  public function delete($id)
  {
    return $this->db->delete('mapel', array("kd_mapel" => $id));
  }

}
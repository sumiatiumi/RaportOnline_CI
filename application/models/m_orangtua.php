<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_orangtua extends CI_Model
{
    private $_table = "orang_tua";

    public $id_ortu;
    public $user_ortu;
    public $nama_ayah;
    public $nama_ibu;   
    public $nama_wali;
    public $no_hp_ortu;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function get_by_role()
  {
      $this->db->select('*');
      $this->db->join('siswa', 'orang_tua.ID_ORTU = siswa.ID_ORTU');
      $this->db->from('orang_tua');
      $query = $this->db->get();
      return $query->result();
  }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_ortu" => $id])->row();
    }

    public function delete($id)
    {
         return $this->db->delete('orang_tua', array("id_ortu" => $id));
  }

    
}
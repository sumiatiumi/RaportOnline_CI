<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_Absensi extends CI_Model
{
    private $_table = "absensi";

    public $id_absen;
    public $no_induk;
    public $subuh;
    public $maghrib;   
    public $isyak;
    public $tanggal;
     public $thn_ajar;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function get_by_role()
  {
      $this->db->select('*');
      $this->db->join('siswa', 'siswa.no_induk = absensi.no_induk');
      $this->db->from('absensi');
      $query = $this->db->get();
      return $query->result();
  }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no_induk" => $id])->row();
    }

    public function delete($id)
    {
       return $this->db->delete('absensi', array("id_absen" => $id));
    }

    public function getSantri()
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $query = $this->db->get();
    return $query->result();
  }

  public function getKelas()
  {
    $this->db->select('*');
    $this->db->from('kelas');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_by_value($id)
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');    
    $query = $this->db->where('kelas.id_kelas ='.$id)->get();    
    return $query->result();

  }

  public function saveAbsensi()
  {
    $post = $this->input->post();
    $no = $post["no"];    
    $array = count($no);
    $subuh = $post["subuh"];
    $maghrib = $post["maghrib"];
    $isyak = $post["isyak"];
    $tanggal = $post["tanggal"];
    $semester = $post["semester"];
    $tahun = $post["tahun"];     
    for($i = 0; $i < $array; $i++){
      $data_absensi = array('no_induk' => $no[$i], 'subuh' => $subuh[$i], 'maghrib' => $maghrib[$i], 'isyak' => $isyak[$i], 'tanggal' => $tanggal, 'semester' => $semester, 'thn_ajaran' => $tahun);            
      $this->db->insert('absensi', $data_absensi);
    }    
  }

    
}
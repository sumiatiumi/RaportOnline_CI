<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_Nilai extends CI_Model
{
  private $_table = "nilai";

  public $id_nilai;
  public $id_guru;
  public $no_induk;
  public $kd_mapel;   
  public $nilai;
  public $semester;
  public $thn_ajar;

  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  public function get_by_role()
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('mapel', 'mapel.KD_MAPEL = nilai.KD_MAPEL');
    $this->db->join('guru', 'guru.id_guru = nilai.id_guru');
    $this->db->join('siswa', 'siswa.no_induk = nilai.no_induk');
    $query = $this->db->get();
    return $query->result();
  }

  public function getById($id)
  {
    return $this->db->get_where($this->_table, ["no_induk" => $id])->row();
  }

  public function delete($id)
  {
    return $this->db->delete('nilai', array("id_nilai" => $id));
  }

  public function get_by_class($mapel)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('mapel', 'mapel.KD_MAPEL = nilai.KD_MAPEL');
    $this->db->join('guru', 'guru.id_guru = nilai.id_guru');
    $this->db->join('siswa', 'siswa.no_induk = nilai.no_induk');
    echo "hello";
    //$array = array('nilai.id_kelas' => $kelas, 'nilai.kd_mapel' => $mapel, 'semester' => $semester);
    $query = $this->db->where('mapel.kd_mapel ='.$mapel)->get();
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

  public function getKelas()
  {
    $this->db->select('*');
    $this->db->from('kelas');
    $query = $this->db->get();
    return $query->result();
  }

  public function getSantri()
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $query = $this->db->get();
    return $query->result();
  }

  public function getMapel()
  {
    $this->db->select('*');
    $this->db->from('mapel');
    $query = $this->db->get();
    return $query->result();
  }

  public function getGuru()
  {
    $this->db->select('*');
    $this->db->from('guru');
    $query = $this->db->get();
    return $query->result();
  }

  public function saveNilai()
  {
    $post = $this->input->post();
    $no = $post["no"];    
    $array = count($no);
    $nilai = $post["nilai"];
    $guru = $post["guru"];
    $mapel = $post["mapel"];
    $tahun = $post["tahun"];
    $semester = $post["semester"];    
    for($i = 0; $i < $array; $i++){
      $data_nilai = array('id_guru' => $guru, 'nilai.no_induk' => $no[$i], 'kd_mapel' => $mapel, 'nilai' => $nilai[$i], 'semester' => $semester, 'thn_ajar' => $tahun);
      $this->db->insert('nilai', $data_nilai);
    }    
  }



}
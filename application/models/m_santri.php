<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_Santri extends CI_Model
{

  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  public function get_by_role()
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('orang_tua', 'orang_tua.ID_ORTU = siswa.ID_ORTU');
    $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
    $this->db->join('user', 'user.id_user = siswa.id_user');
    $this->db->join('guru', 'guru.id_guru = siswa.id_guru');
    $query = $this->db->get();
    return $query->result();
  }

  public function getById($id)
  {
    return $this->db->get_where($this->_table, ["id_kelas" => $id])->result();
  }

  public function delete($id)
  {
    return $this->db->delete('guru', array("id_guru" => $id));
  }

  public function get_by_class($id)
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('orang_tua', 'orang_tua.ID_ORTU = siswa.ID_ORTU');
    $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
    $this->db->join('user', 'user.id_user = siswa.id_user');
    $this->db->join('guru', 'guru.id_guru = siswa.id_guru');
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

  public function getWaliKelas()
  {
    $this->db->select('*');
    $this->db->from('guru');
    $query = $this->db->get();
    return $query->result();
  }

  public function saveSantri()
  {
    $post = $this->input->post();
    $no_induk = $post['no_induk'];
    $nama = $post['nama'];
    $tempat = $post['tpl'];
    $tanggal = $post['tl'];
    $goldar = $post['goldar'];
    $nohp = $post['hp'];
    $email = $post['email'];
    $alamat = $post['alamat'];
    $status = $post['status'];
    $angkatan = $post['angkatan'];
    $jk = $post['jk'];
    $kelas = $post['kelas'];
    $wali_k = $post['walik'];
    $ayah = $post['ayah'];
    $ibu = $post['ibu'];
    $wali_m = $post['walim'];
    $hp_o = $post['hpo'];
    $data_wali = array('nama_ayah' => $ayah, 'nama_ibu' => $ibu, 'nama_wali' => $wali_m, 'no_hp_ortu' => $hp_o);
    $data_santri = array('no_induk' => $no_induk, 'id_kelas' => $kelas, 'id_guru' => $wali_k, 'nama_siswa' => $nama, 'tempat_lahir' => $tempat, 'tanggal_lahir' => $tanggal, 'jenis_kelamin' => $jk, 'gol_darah' => $goldar, 'status' => $status, 'angkatan' => $angkatan, 'alamat' => $alamat, 'hp' => $hp, 'email' => $email);
    
    $query1 = $this->db->insert('orang_tua', $data_wali);   
    $idwali = $this->db->insert_id($query1);
    $query2 = $this->db->insert('siswa', $data_santri);

    $this->db->set('id_ortu', $idwali);
    $this->db->where('no_induk', $no_induk);
    $update_santri = $this->db->update('siswa');       
  }


}
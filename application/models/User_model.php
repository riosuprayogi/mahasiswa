<?php

class User_model extends CI_Model {  

  public $nim;
  public $nama;
  public $jenis_kelamin;
  public $id_jurusan;
  public $image = "default.jpg";
  public $alamat;

public function get()   
 {
  $this->db->select('tabel_mahasiswa.*, tb_jurusan.id AS id_jurusan, tb_jurusan.namaJurusan');
  $this->db->join('tb_jurusan', 'tabel_mahasiswa.id_jurusan = tb_jurusan.id');
  $this->db->from('tabel_mahasiswa');
  $query = $this->db->get();
  return $query->result();
 }  

 public function get_nim($nim)   
 {   
   $this->db->where('nim', $nim);   
   $this->db->select("*");   
   $this->db->from("tabel_mahasiswa");   
   return $this->db->get();   
 }  
 
 function insert($data)   
 {   
   $this->db->insert('tabel_mahasiswa', $data);   
 }  

 public function save()
 {
     $post = $this->input->post();
     $this->nim = $post["name"];
     $this->nama = $post["nama"];
     $this->id_jurusan = $post["id_jurusan"];
     $this->alamat = $post["alamat"];
     $this->db->insert($this->tabel_mahasiswa, $this);
 }
 
 function delete($nim)   
 {   
   $this->db->where('nim', $nim);   
   $this->db->delete('tabel_mahasiswa');   
 }  
 
 function update_data($data, $syarat)   
 {   
   $this->db->where($syarat);   
   $this->db->update('tabel_mahasiswa', $data);   
 }
}   
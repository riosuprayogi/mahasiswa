<?php

class Jurusan_model extends CI_Model {  

    public function get()   
    {
     $this->db->select('*');
     $this->db->from('tb_jurusan');
     $query = $this->db->get();
     return $query->result();
    }  

    function insert($data)   
    {   
      $this->db->insert('tb_jurusan', $data);   
    }

    public function get_id($id)   
    {   
      $this->db->where('id', $id);   
      $this->db->select("*");   
      $this->db->from("tb_jurusan");   
      return $this->db->get();   
    } 
    
    function update_data($data, $syarat)   
    {   
      $this->db->where($syarat);   
      $this->db->update('tb_jurusan', $data);   
    }
}
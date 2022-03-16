<?php 

class M_Jurusan extends CI_Model{
    public function jurusan()
    {
        $query = $this->db->query("SELECT * FROM jurusan");
        return $query->result();
    }

}


?>
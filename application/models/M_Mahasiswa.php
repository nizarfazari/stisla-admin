<?php 

class M_Mahasiswa extends CI_Model{
    public function insert_data($data)
    {
        $this->db->insert('mahasiswa',$data);
    }

    public function mahasiswa()
    {
        return $this->db->query("SELECT * FROM mahasiswa 
        INNER JOIN jurusan ON mahasiswa.jurusan = jurusan.id_jurusan
        INNER JOIN tbl_provinsi ON mahasiswa.id_provinsi = tbl_provinsi.id
        INNER JOIN tbl_kabkot ON mahasiswa.id_kabkot = tbl_kabkot.id
        INNER JOIN tbl_kecamatan ON mahasiswa.id_kecamatan = tbl_kecamatan.id");
        
    }

    public function get_data_by_id($id)
    {
        return $this->db->query("SELECT * FROM mahasiswa 
        INNER JOIN jurusan ON mahasiswa.jurusan = jurusan.id_jurusan
        INNER JOIN tbl_provinsi ON mahasiswa.id_provinsi = tbl_provinsi.id
        INNER JOIN tbl_kabkot ON mahasiswa.id_kabkot = tbl_kabkot.id
        INNER JOIN tbl_kecamatan ON mahasiswa.id_kecamatan = tbl_kecamatan.id WHERE id_mhs = '$id'");

    }

    public function update_data($id,$data)
   {
        $this->db->where('id_mhs',$id);
        $this->db->update('mahasiswa',$data);
   }

   public function hapus_data($id)
   {
        $this->db->where('id_mhs',$id);
        $this->db->delete('mahasiswa');
   }

   

}
?>
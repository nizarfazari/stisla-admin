<?php 

class M_Select extends CI_Model{
    function getdataprov()
    {
        $query = $this->db->query("SELECT * FROM tbl_provinsi ORDER BY provinsi ASC");
        return $query->result();
    }

    function getdatakab($id_prov)
    {
        $query = $this->db->query("SELECT * FROM tbl_kabkot WHERE provinsi_id = '$id_prov' ORDER BY kabupaten_kota ASC");
        return $query->result();
    }

    function getdatakec($id_kab)
    {
        $query = $this->db->query("SELECT * FROM tbl_kecamatan WHERE kabkot_id = '$id_kab' ORDER BY kecamatan ASC");
        return $query->result();
    }

}
?>
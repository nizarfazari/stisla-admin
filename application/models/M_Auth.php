<?php
class M_Auth extends CI_Model
{
    public function insert_register($data)
    {
        $this->db->insert('users', $data);
    }

    public function login($username,$password)
    {

        return $this->db->get_where('users', ['username' => $username, 'password' => $password]);
    }


    public function username()
    {
        return $this->db->query("SELECT username FROM users")->result_array();
    }
}

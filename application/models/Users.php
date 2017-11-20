<?php

class Users extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_login($name, $password)
    {
        $password = md5($password);
        $this->db->where('name', $name);
        $this->db->where('password', $password);
        $this->db->from('users');
        if ($this->db->count_all_results() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }

    }
}
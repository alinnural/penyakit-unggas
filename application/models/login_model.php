<?php

class login_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getData($username, $password){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array('username' => $username, 'password' => md5($password)));
        return $this->db->get();
    }
}
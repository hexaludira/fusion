<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function getUserByEmail($email) {
        $this->db->select('user_tbl.*, role_tbl.role_name');
        $this->db->from('user_tbl');
        $this->db->join('role_tbl', 'user_tbl.role_id = role_tbl.role_id', 'left');
        $this->db->where('user_tbl.email', $email);
        return $this->db->get()->row();
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function getUserByEmail($email) {
        return $this->db->get_where('user_tbl',['email' => $email])->row();
    }
}
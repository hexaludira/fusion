<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management_model extends CI_Model{
    public function get_total_user(){
        $total_user = $this->db->count_all_results('user_tbl');
        return $total_user;
    }

    
}
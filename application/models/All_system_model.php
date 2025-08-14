<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_system_model extends CI_Model{
    public function getSystemsByRole($role_name){
        $this->db->select('user_systems.*');
        $this->db->from('user_systems');
        $this->db->join('role_access_system','user_systems.system_id = role_access_system.system_id');
        $this->db->join('role_tbl','role_tbl.role_id = role_access_system.role_id');
        $this->db->where('role_tbl.role_name', $role_name);
        return $this->db->get()->result();
    }

    public function get_roles(){
        return $this->db->get('role_tbl')->result();
    }

    public function get_systems(){
        return $this->db->get('user_systems')->result();
    }

    public function change_password($id, $data){
        $this->db->where('user_id', $id);
        $change_password = $this->db->update('user_tbl',$data);

        return $change_password;
    }
}
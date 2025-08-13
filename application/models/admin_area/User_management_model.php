<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management_model extends CI_Model{
    public function get_total_user(){
        $total_user = $this->db->count_all_results('user_tbl');
        return $total_user;
    }

    public function get_total_role(){
        $total_role = $this->db->count_all_results('role_tbl');
        return $total_role;
    }

    public function get_all_role(){
        $all_role = $this->db->get('role_tbl')->result();
        return $all_role;
    }

    public function get_all_user(){
        $this->db->select('user_tbl.*, role_tbl.role_name');
        $this->db->from('user_tbl');
        $this->db->join('role_tbl', 'role_tbl.role_id = user_tbl.role_id');
        $all_user = $this->db->get()->result();
        return $all_user;
    }

    public function insert_new_role($data){
        $insert_role = $this->db->insert('role_tbl', $data);
        return $insert_role;
    }

    public function delete_role($id){
        $this->db->where('role_id', $id);
        $delete_role = $this->db->delete('role_tbl');
        return $delete_role;
    }

    public function edit_role($id){
        $this->db->where('role_id', $id);
        $edit_role = $this->db->get('role_tbl')->result();
        return $edit_role;
    }

    public function update_role($id, $data){
        $this->db->where('role_id', $id);
        return $this->db->update('role_tbl', $data);
    }

    public function insert_new_user($data){
        $insert_user = $this->db->insert('user_tbl', $data);
        return $insert_user;
    }

    public function reset_password($id, $data){
        $this->db->where('user_id', $id);
        $reset_password = $this->db->update('user_tbl',$data);

        return $reset_password;
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_management_model extends CI_Model{
    public function get_total_system(){
        $total_system = $this->db->count_all_results('user_systems');
        return $total_system;
    }

    public function get_all_system(){
        $all_system = $this->db->get('user_systems')->result();
        return $all_system;
    }

    public function get_system_by_id($id){
        $system_data = $this->db->get_where('user_systems', ['system_id' => $id])->row();
        return $system_data;
    }

    public function insert_new_system($data){
        $insert_system = $this->db->insert('user_systems', $data);
        return $insert_system;
    }

    public function edit_system($id){
        $this->db->where('system_id', $id);
        $edit_system = $this->db->get('user_systems')->result();
        return $edit_system;
    }

    public function update_system($id, $data){
        $this->db->where('system_id', $id);
        return $this->db->update('user_systems', $data);
    }

    public function delete_system($id){
        $this->db->where('system_id', $id);
        $delete_system = $this->db->delete('user_systems');
        return $delete_system;
    }
}
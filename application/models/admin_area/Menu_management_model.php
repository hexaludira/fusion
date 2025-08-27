<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_management_model extends CI_Model{
    public function get_all_menu() {
        $this->db->select('user_menu.*, user_systems.system_name');
        $this->db->from('user_menu');
        $this->db->join('user_systems', 'user_systems.system_id = user_menu.system_id');
        $all_menu = $this->db->get()->result();
        return $all_menu;
    }

    public function get_all_system(){
        $all_system = $this->db->get('user_systems')->result();
        return $all_system;
    }

    public function insert_new_menu($data){
        $insert_menu = $this->db->insert('user_menu',$data);
        return $insert_menu;
    }

    public function edit_menu($id){
        $this->db->where('id', $id);
        $edit_menu = $this->db->get('user_menu')->result();
        return $edit_menu;
    }

    public function update_menu($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('user_menu', $data);
    }

    public function delete_menu($id){
        $this->db->where('id', $id);
        $delete_menu = $this->db->delete('user_menu');
        return $delete_menu;
    }

    
}
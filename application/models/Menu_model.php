<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
    public function getMenuWithSub($role_id){
        $this->db->select('user_menu.*');
        $this->db->join('role_access_menu','user_menu.id = role_access_menu.menu_id');
        $this->db->where('role_access_menu.role_id', $role_id);
        $this->db->order_by('user_menu.sort', 'ASC');
        $menus = $this->db->get('user_menu')->result();

        foreach ($menus as &$menu){
            $menu->submenus = $this->db->get_where('user_sub_menu', [
                'menu_id' => $menu->id,
                'is_active' => 1
            ])->result();
        }

        return $menus;
    }
}
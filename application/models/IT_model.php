<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IT_model extends CI_Model {
    private $db_mes;

    public function __construct(){
        parent::__construct();
        $this->db_mes = $this->load->database('db_mes', TRUE);
    }

    public function getAllDataInspect(){
        $this->db->order_by('room_inspect_datetime','DESC');
        $alldata = $this->db->get('room_inspection_tbl')->result();
        return $alldata;
    }

    // public function getMenuWithSub($role_id){
    //     $this->db->select('user_menu.*');
    //     $this->db->join('role_access_menu','user_menu.id = role_access_menu.menu_id');
    //     $this->db->where('role_access_menu.role_id', $role_id);
    //     $this->db->order_by('user_menu.sort', 'ASC');
    //     $menus = $this->db->get('user_menu')->result();

    //     foreach ($menus as &$menu){
    //         $menu->submenus = $this->db->get_where('user_sub_menu', [
    //             'menu_id' => $menu->id,
    //             'is_active' => 1
    //         ])->result();
    //     }

    //     return $menus;
    // }

    public function getPlanData(){
        $plan_data = $this->db->query("SELECT * FROM coloring_plan_tbl")->row();
        return $plan_data;
    }

    public function getMesData(){
        $mes_data = $this->db_mes->query("SELECT * FROM coloring_mes_tbl")->row();
        return $mes_data;
    }
}
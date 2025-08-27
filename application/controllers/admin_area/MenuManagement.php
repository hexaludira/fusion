<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuManagement extends CI_Controller{
    public function __construct(){
        parent::__construct();
        check_login();
        if($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('error', 'Do not try anything funny!&#128544;');
            redirect('auth');
        }
        $this->load->model('Menu_model');
        $this->load->model('admin_area/Menu_management_model','menu_mgmt_model');
    }

    public function index(){
        $data['title'] = 'FUSION-Menu Management';
        $data['sidebar_title'] = 'Menu Management';
        $data['sidebar'] = 'template/admin_sidebar';
        $data['content'] = 'admin_area/list_menu';
        $data['systems'] = $this->menu_mgmt_model->get_all_system();

        $this->load->view('template/main',$data);
    }

    public function list_menu(){
        $data = $this->menu_mgmt_model->get_all_menu();

        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function add_new_menu(){
        $menu_add = $this->input->post();

        $data = [
            'system_id' => $menu_add['menu_system_add'],
            'menu_name' => $menu_add['menu_name_add'],
            'url' => $menu_add['menu_url_add'],
            'icon' => $menu_add['menu_icon_add'],
            'sort' => $menu_add['menu_sort_add']
        ];

        $this->menu_mgmt_model->insert_new_menu($data);

        echo json_encode([
            'success' => true
        ]);
    }

    public function edit_menu(){
        $menu_id_edit = $this->input->post('menu_id_edit');

        $menu_edit = $this->menu_mgmt_model->edit_menu($menu_id_edit);

        echo json_encode($menu_edit);
    }

    public function update_menu(){
        $data = $this->input->post();
        $data_update = [
            'system_id' => $data['menu_system_edit'],
            'menu_name' => $data['menu_name_edit'],
            'url' => $data['menu_url_edit'],
            'icon' => $data['menu_icon_edit'],
            'sort' => $data['menu_sort_edit']
        ];

        $update_menu = $this->menu_mgmt_model->update_menu($data['menu_id_edit'], $data_update);

        echo json_encode([
            'success' => true
        ]);
    }

    public function delete_menu(){
        $menu_id_delete = $this->input->post('menu_id_delete');

        $menu_delete = $this->menu_mgmt_model->delete_menu($menu_id_delete);

        echo json_encode([
            'success' => true
        ]);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller {
    public function __construct(){
        parent::__construct();
        check_login();
        if($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('error', 'Do not try anything funny!&#128544;');
            redirect('auth');
        }
        $this->load->model('Menu_model');
        $this->load->model('admin_area/User_management_model','user_mgmt_model');
    }

    public function index(){
        $total_user = $this->user_mgmt_model->get_total_user();

        $data['title'] = 'FUSION-Admin Panel';
        $data['sidebar_title'] = 'Admin Panel';
        $data['sidebar'] = 'template/admin_sidebar';
        $data['content'] = 'admin_area/user_management_dashboard';
        // $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));
        $data['total_user'] = $total_user;

        $this->load->view('template/main', $data);
    }

    public function role_management_menu(){
        $data['title'] = 'FUSION-Role Management';
        $data['sidebar_title'] = 'Role Management';
        $data['sidebar'] = 'template/admin_sidebar';
        $data['content'] = 'admin_area/list_role';

        $this->load->view('template/main', $data);
    }

    public function user_management_menu(){
        $data['title'] = 'FUSION-User Management';
        $data['sidebar_title'] = 'User Management';
        $data['sidebar'] = 'template/admin_sidebar';
        $data['content'] = 'admin_area/list_user';

        $this->load->view('template/main', $data);
    }

    public function list_role(){
        $data = $this->user_mgmt_model->get_all_role();

        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function list_user(){
        $data = $this->user_mgmt_model->get_all_user();

        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function add_new_role(){
        $role_names = $this->input->post('role_name_add');
        $role_descs = $this->input->post('role_desc_add');

        if(empty($role_names) || empty($role_descs)) {
            echo json_encode(['status' => 'error', 'message' => 'Role name & Role description is required']);
            return;
        } else if(!empty($role_names)){
            foreach ($role_names as $index => $role_name) {
                $desc = isset($role_descs[$index]) ? $role_descs[$index] : null;

                if (!empty(trim($role_name))){
                    $data = [
                        'role_name' => $role_name,
                        'role_desc' => $desc 
                    ];
                    $this->user_mgmt_model->insert_new_role($data);
                }
            }
            echo json_encode([
                'status' => 'success'
            ]);
        } else {
            echo json_encode([
                'status' => 'error'
            ]);
        }
    }

    public function delete_role(){
        header('Content-Type: application/json');
        $role_id_delete = $this->input->post('role_id_delete');

        $role_delete = $this->user_mgmt_model->delete_role($role_id_delete);

        echo json_encode([
            'success' => true
        ]);
    }
}
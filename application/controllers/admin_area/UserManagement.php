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
        $data['roles'] = $this->user_mgmt_model->get_all_role();

        $this->load->view('template/main', $data);
    }

    public function system_management_menu(){
        $data['title'] = 'FUSION-System Management';
        $data['sidebar_title'] = 'System Management';
        $data['sidebar'] = 'template/admin_sidebar';
        $data['content'] = 'admin_area/list_system';
        $data['system'] = $this->user_mgmt_model->get_all_system();

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

    public function list_system(){
        $data = $this->user_mgmt_model->get_all_system();

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

    public function edit_role(){
        $role_id_edit = $this->input->post('role_id_edit');

        $role_edit = $this->user_mgmt_model->edit_role($role_id_edit);

        echo json_encode($role_edit);
    }

    public function update_role(){
        $data = $this->input->post();
        $data_update = [
            'role_name' => $data['role_name_edit'],
            'role_desc' => $data['role_desc_edit']
        ];

        $update_role = $this->user_mgmt_model->update_role($data['role_id_edit'], $data_update);

        echo json_encode([
            'success' => true
        ]);
    }

    public function add_new_user(){
        $data = $this->input->post();
        date_default_timezone_set('Asia/Jakarta');
        $datetime_now = date('Y-m-d H:i:s');

        $dataSave = $this->user_mgmt_model->insert_new_user([
            'nik' => $data['user_nik_add'],
            'name' => $data['user_name_add'],
            'email' => $data['user_email_add'],
            'password' => password_hash($data['user_password_add'], PASSWORD_DEFAULT),
            'role_id' => $data['user_role_add'],
            'created_date_time' => $datetime_now,
            'created_by' => $this->session->userdata('user_id')
        ]);

        echo json_encode([
            'success' => true
        ]);
    }

    public function edit_user(){
        $user_id_edit = $this->input->post('user_id');

        $user_edit = $this->user_mgmt_model->edit_user($user_id_edit);

        echo json_encode($user_edit);
    }

    public function update_user(){
        $data = $this->input->post();
        date_default_timezone_set('Asia/Jakarta');
        $datetime_now = date('Y-m-d H:i:s');

        $data_update = [
            'nik' => $data['user_nik_edit'],
            'name' => $data['user_name_edit'],
            'email' => $data['user_email_edit'],
            'role_id' => $data['user_role_edit'],
            'updated_date_time' => $datetime_now,
            'updated_by' => $this->session->userdata('user_id')
        ];

        $update_user = $this->user_mgmt_model->update_user($data['user_id_edit'], $data_update);

        echo json_encode([
            'success' => true
        ]);
    }

    public function delete_user(){
        header('Content-Type: application/json');
        $user_id_delete = $this->input->post('user_id_delete');

        $user_delete = $this->user_mgmt_model->delete_user($user_id_delete);

        echo json_encode([
            'success' => true
        ]);
    }

    public function reset_password(){
        $default_password = password_hash('fusion123', PASSWORD_DEFAULT);
        $id = $this->input->post('user_id');
        date_default_timezone_set('Asia/Jakarta');
        $datetime_now = date('Y-m-d H:i:s');

        $data = [
            'password' => $default_password,
            'updated_date_time' => $datetime_now,
            'updated_by' => $this->session->userdata('user_id')
        ];

        $data_reset = $this->user_mgmt_model->reset_password($id,$data);

        echo json_encode([
            'success' => true
        ]);
    }

    public function get_role_access(){
        $role_id = $this->input->post('role_id');

        $systems = $this->db->get('user_systems')->result();

        $result = [];

        foreach($systems as $sys) {
            //Get all menu in this system
            $this->db->where('system_id', $sys->system_id);
            $this->db->order_by('sort', 'ASC');
            $menus = $this->db->get('user_menu')->result();

            $menu_list = [];
            foreach($menus as $menu){
                // Check if the menu already assigned to role
                $is_checked = $this->db
                    ->where('role_id', $role_id)
                    ->where('menu_id', $menu->id)
                    ->count_all_results('role_access_menu') > 0;

                $menu_list[] = [
                    'id' => $menu->id,
                    'name' => $menu->menu_name,
                    'checked' => $is_checked
                ];
            }

            // Cek apakah system ini minimal 1 menu sudah dipilih
            $sys_checked = $this->check_system_checked($role_id, $sys->system_id);

            $result[] = [
                'id'     => $sys->system_id,
                'name'   => $sys->system_name,
                'checked'=> $sys_checked,
                'menus'  => $menu_list
            ];
        }

        echo json_encode(['systems' => $result]);
    }

    private function check_system_checked($role_id, $system_id){
        return $this->db
            ->join('user_menu', 'user_menu.id = role_access_menu.menu_id', 'inner')
            ->where('user_menu.system_id', $system_id)
            ->where('role_access_menu.role_id', $role_id)
            ->count_all_results('role_access_menu') > 0;
    }

    public function save_role_access(){
        $role_id = $this->input->post('role_id');
        $systems = $this->input->post('systems');
        $menus = $this->input->post('menus');

        $systems = is_array($systems) ? $systems : [];
        $menus = is_array($menus) ? $menus : [];

        $this->db->where('role_id', $role_id)->delete('role_access_system');
        $this->db->where('role_id', $role_id)->delete('role_access_menu');

        // insert system access
        foreach($systems as $sys_id){
            $this->db->insert('role_access_system',[
                'role_id' => $role_id,
                'system_id' => $sys_id
            ]);
        }

        // insert menu access
        foreach($menus as $menu_id){
            $this->db->insert('role_access_menu',[
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]);
        }

        echo json_encode(['status' => 'success']);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemManagement extends CI_Controller{
    public function __construct(){
        parent::__construct();
        check_login();
        if($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('error', 'Do not try anything funny!&#128544;');
            redirect('auth');
        }
        $this->load->model('Menu_model');
        $this->load->model('admin_area/System_management_model','system_mgmt_model');
        $this->load->library('upload');
    }

    public function index(){
        $data['title'] = 'FUSION-System Management';
        $data['sidebar_title'] = 'System Management';
        $data['sidebar'] = 'template/admin_sidebar';
        $data['content'] = 'admin_area/list_system';

        $this->load->view('template/main', $data);
    }

    public function list_system(){
        $data = $this->system_mgmt_model->get_all_system();

        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function add_new_system(){
        $system_code = $this->input->post('system_code_add');
        $system_name = $this->input->post('system_name_add');
        $system_desc = $this->input->post('system_desc_add');
        $system_url = $this->input->post('system_url_add');
        $system_color = $this->input->post('system_color_add');

        $icon = $this->_upload_icon();

        $data = [
            'system_code' => $system_code,
            'system_name' => $system_name,
            'system_desc' => $system_desc,
            'url' => $system_url,
            'color' => $system_color,
            'icon' => $icon
        ];

        $this->system_mgmt_model->insert_new_system($data);
        echo json_encode([
            'success' => true
        ]);
    }

    private function _upload_icon(){
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|jpeg|png|svg';
        $config['max_size'] = 2048;
        $config['file_name'] = time().'_'.$_FILES['system_icon_add']['name'];

        $this->upload->initialize($config);

        if($this->upload->do_upload('system_icon_add')){
            $uploadData = $this->upload->data();
            return $uploadData['file_name'];
        }

        return null;
    }
}
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

        $icon = $this->_upload_icon('system_icon_add');

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

    private function _upload_icon($field_name = 'system_icon_add'){
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|jpeg|png|svg';
        $config['max_size'] = 2048;
        // $config['file_name'] = time().'_'.$_FILES['system_icon_add']['name'];

        if(!empty($_FILES[$field_name]['name'])){
            $config['file_name'] = $_FILES[$field_name]['name'];
            $this->upload->initialize($config);

            if($this->upload->do_upload($field_name)){
                $uploadData = $this->upload->data();
                return $uploadData['file_name'];
            }
        }
   
        return null;
    }

    public function edit_system(){
        $system_id_edit = $this->input->post('system_id_edit');

        $system_edit = $this->system_mgmt_model->edit_system($system_id_edit);

        echo json_encode($system_edit);
    }

    public function update_system(){
        $system_id = $this->input->post('system_id_edit');
        $icon_old = $this->input->post('system_icon_old');
    
        $system_code = $this->input->post('system_code_edit');
        $system_name = $this->input->post('system_name_edit');
        $system_desc = $this->input->post('system_desc_edit');
        $system_url = $this->input->post('system_url_edit');
        $system_color = $this->input->post('system_color_edit');

        $icon_new = $this->_upload_icon('system_icon_edit');

        if($icon_new !== null){
            $icon_name = $icon_new;

            if(!empty($icon_old) && file_exists('./assets/img/'. $icon_old)){
                unlink('./assets/img/'. $icon_old);
            }
        } else {
            $icon_name = $icon_old;
        }

        $data = [
            'system_code' => $system_code,
            'system_name' => $system_name,
            'system_desc' => $system_desc,
            'url' => $system_url,
            'color' => $system_color,
            'icon' => $icon_name
        ];

        $this->system_mgmt_model->update_system($system_id, $data);
        echo json_encode([
            'success' => true
        ]);
    }

    public function delete_system(){
        $system_id_delete = $this->input->post('system_id_delete');

        $system_data = $this->system_mgmt_model->get_system_by_id($system_id_delete);

        if($system_data){
            if(!empty($system_data->icon) && file_exists('./assets/img/'. $system_data->icon)){
                unlink('./assets/img/'. $system_data->icon);
            }

            $system_delete = $this->system_mgmt_model->delete_system($system_id_delete);

            echo json_encode([
                'success' => true
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'System not found']);
        }

        
    }
}
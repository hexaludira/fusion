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
    }

    public function index(){
        $data['title'] = 'FUSION-System Management';
        $data['sidebar_title'] = 'System Management';
        $data['sidebar'] = 'template/admin_sidebar';
        $data['content'] = 'admin_area/list_system';

        $this->load->view('template/main', $data);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller {
    public function __construct(){
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        $this->load->model('User_management_model');
    }

    public function index(){
        $data['title'] = 'FUSION-User Management';
        $data['sidebar-title'] = 'User Management';
        $data['sidebar'] = 'template/sidebar';
        $data['content'] = 'admin_area/user_management';

        $this->load->view('template/main', $data);
    }
}
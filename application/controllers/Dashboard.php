<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));
        if($this->session->userdata('role_id') == '2'){ //role user
            $data['content'] = 'dashboard/user';
        } else {
            $data['content'] = 'dashboard/index';
        }
        
        $this->load->view('template/main', $data);
        
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MC_plan_input extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
    }

    public function index() {
        $data['title'] = 'MES Cable-Plan Input';
        $data['sidebar'] = 'template/sidebar';
        $data['content'] = 'mes_cable/plan_input';
        $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));
        // if($this->session->userdata('role_id') == '2'){ //role user
        //     $data['content'] = 'dashboard/user';
        // } else {
        //     $data['content'] = 'dashboard/index';
        // }
        
        $this->load->view('template/main', $data); 
    }

    
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_inspect extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        $this->load->model('IT_model');
    }

    public function index() {
        $data['title'] = 'Room Inspection';
        $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));
        $data['content'] = 'it/roominspect_view';
        $data['inspect_data'] = $this->IT_model->getAllDataInspect();

        $data['plan_coloring_data'] = $this->IT_model->getPlanData();
        $data['mes_actual_data'] = $this->IT_model->getMesData();
        // if($this->session->userdata('role_id') == '2'){ //role user
        //     $data['content'] = 'dashboard/user';
        // } else {
        //     $data['content'] = 'dashboard/index';
        // }
        
        //$this->load->view('template/topbar.')
        $this->load->view('template/main', $data);
        
    }
}
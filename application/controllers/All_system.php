<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_system extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
    }

    public function index() {
        $data['title'] = 'All System';
        $data['sidebar'] = 'template/main_sidebar';
        $data['content'] = 'all_system';
        // $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));
        // if($this->session->userdata('role_id') == '2'){ //role user
        //     $data['content'] = 'dashboard/user';
        // } else {
        //     $data['content'] = 'dashboard/index';
        // }
        
        $this->load->view('template/main', $data); 
    }

    public function show_about(){
        $data['title'] = 'About';
        $data['sidebar'] = 'template/main_sidebar';
        $data['content'] = 'about';
        $this->load->view('template/main', $data);
    }
}
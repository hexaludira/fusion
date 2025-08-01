<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller {
    public function __construct(){
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
    }

    public function index(){
        $data['title'] = '';
    }
}
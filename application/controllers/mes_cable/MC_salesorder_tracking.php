<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class MC_salesorder_tracking extends CI_Controller{
    public function __construct(){
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        $this->load->model('mes_cable/Salesorder_tracking_model','so_tracking_model');
    }

    public function index(){
        $data['title'] = 'MES Cable-Sales Order Tracking';
        $data['sidebar_title'] = 'Dashboard - MES Cable';
        $data['sidebar'] = 'template/sidebar';
        $data['content'] = 'mes_cable/salesorder_tracking';
        $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));

        $this->load->view('template/main', $data);
    }

    // Load salesorder data in datatables
    public function load_sotracking_table(){
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');

        // load model
        $data = $this->so_tracking_model->get_salesorder_tracking($start,$end);
        header('Content-Type: application/json');
        echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
    }
}
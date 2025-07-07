<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MC_stranding_dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        $this->load->model('mes_cable/Stranding_dashboard_model','stranding_model');
    }

    public function index(){
        $data['title'] = 'MES Cable-Stranding Dashboard';
        $data['sidebar'] = 'template/sidebar';
        $data['content'] = 'mes_cable/stranding_dashboard';
        $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));

        $this->load->view('template/main', $data);
    }

    // Load stranding data in datatables based on material name 
    public function load_stranding_table(){
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');

        // load model
        $data = $this->stranding_model->get_stranding_details($start,$end);
        header('Content-Type: application/json');
        echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
    }

    // Get stranding grand total based on date range
    public function get_stranding_summary(){
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');

        $data = $this->stranding_model->get_stranding_plan($start,$end);
        $data_grand_total = $this->stranding_model->get_stranding_grand_total($start,$end);

        $plan = $data->stranding_plan;
        $actual_total = $data_grand_total->grand_total;

        echo json_encode([
            'plan'=> $plan,
            'actual_total' => $actual_total,
            'percentage' => round($actual_total / $plan *100,1),
        ]);
    }
}
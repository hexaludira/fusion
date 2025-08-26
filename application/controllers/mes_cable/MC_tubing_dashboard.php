<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MC_tubing_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        $this->load->model('mes_cable/Tubing_dashboard_model', 'tubing_model');
    }

    public function index(){
        $data['title'] = 'MES Cable-Tubing Dashboard';
        $data['sidebar_title'] = 'Dashboard - MES Cable';
        $data['sidebar'] = 'template/sidebar';
        $data['content'] = 'mes_cable/tubing_dashboard';
        $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));

        $this->load->view('template/main', $data);
    }

    // Load tubing data in datatables based on diameter, color, and core
    public function load_tubing_table(){
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');

        // load model
        $data = $this->tubing_model->get_tubing_details($start,$end);
        header('Content-Type: application/json');
        echo json_encode(["data" => $data], JSON_PRETTY_PRINT);

    }

    public function get_tubing_summary(){
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');

        $data = $this->tubing_model->get_tubing_plan($start,$end);
        $data_grand_total = $this->tubing_model->get_tubing_grand_total($start,$end);

        $plan = $data->tubing_plan;
        $actual_total = $data_grand_total->grand_total;

        echo json_encode([
            'plan' => $plan,
            'actual_total' => $actual_total,
            // 'percentage' => round(($actual_total / $plan) * 100,1),
        ]);
    }
}


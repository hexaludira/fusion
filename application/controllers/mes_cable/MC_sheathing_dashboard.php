<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MC_sheathing_dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        $this->load->model('mes_cable/Sheathing_dashboard_model','sheathing_model');
    }

    public function index(){
        $data['title'] = 'MES Cable-Sheathing Dashboard';
        $data['sidebar_title'] = 'Dashboard - MES Cable';
        $data['sidebar'] = 'template/sidebar';
        $data['content'] = 'mes_cable/sheathing_dashboard';
        $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));

        $this->load->view('template/main', $data);
    }

    //Load sheathing data in datatables based on Sales Order No, Customer Name, material name, Unqualified Qty, Uninspected Qty, Prod length (CKM), Prod Length (FKM)
    public function load_sheathing_table(){
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');

        // Load model
        $data = $this->sheathing_model->get_sheathing_details($start, $end);
        header('Content-Type: application/json');
        echo json_encode(["data" => $data],JSON_PRETTY_PRINT);
    }

    public function get_sheathing_summary(){
        $start = $this->input->post("start_date");
        $end = $this->input->post("end_date");

        $data = $this->sheathing_model->get_sheathing_plan($start, $end);
        $data_grand_total = $this->sheathing_model->get_sheathing_grand_total($start, $end);

        $plan_ckm = $data->sheathing_plan_ckm;
        $plan_fkm = $data->sheathing_plan_fkm;
        $actual_total_ckm = $data_grand_total->grand_total_ckm / 1000;
        $actual_total_fkm = $data_grand_total->grand_total_fkm / 1000;

        echo json_encode([
            "plan_ckm"=> $plan_ckm,
            "actual_total_ckm" => $actual_total_ckm,
            "percentage_ckm" => round(($actual_total_ckm / $plan_ckm) * 100,1),
            "plan_fkm" => $plan_fkm,
            "actual_total_fkm" => $actual_total_fkm,
            "percentage_fkm" => round(($actual_total_fkm / $plan_fkm) * 100,1),
        ]);
    }

    
}
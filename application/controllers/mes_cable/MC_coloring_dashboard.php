<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MC_coloring_dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        // sleep(1);
        usleep(500 * 1000);
        $this->load->model('mes_cable/Coloring_dashboard_model', 'coloring_model');
    }

    public function index() {
        $data['title'] = 'MES Cable-Coloring Dashboard';
        $data['sidebar_title'] = 'Dashboard - MES Cable';
        $data['sidebar'] = 'template/sidebar';
        $data['content'] = 'mes_cable/coloring_dashboard';
        $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));
        // if($this->session->userdata('role_id') == '2'){ //role user
        //     $data['content'] = 'dashboard/user';
        // } else {
        //     $data['content'] = 'dashboard/index';
        // }
        
        $this->load->view('template/main', $data); 
    }

    public function load_coloring_table(){
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');
        // $no = $this->input->post('start');

        $data = $this->coloring_model->get_coloring_details($start,$end);

        header('Content-Type: application/json');
        // foreach($data as $item){
        //     // $no++;
        //     $row = [];
        //     // $row[] = $no;
        //     $row[] = $item->color;
        //     $row[] = $item->G652D;
        //     $row[] = $item->G655;
        //     $row[] = $item->G657A1;
        //     $row[] = $item->G657A1_200;
        //     $row[] = $item->G657A2;
        //     $data[] = $row;
        // }

        // $output = [
        //     // "draw" => intval($this->input->post('draw')),
        //     // "recordsTotal" => $this->coloring_model->count_all(),
        //     // "recordsFiltered" => $this->coloring_model->count_filtered(),
        //     "data" => $data,
        // ];
        
        echo json_encode(["data" => $data],JSON_PRETTY_PRINT);
    }

    public function get_coloring_km_summary(){
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');

        $data = $this->coloring_model->get_coloring_plan($start,$end);
        // $data_actual = $this->plan_model->get_actual_coloring($start,$end);
        $data_grand_total = $this->coloring_model->get_coloring_grand_total($start,$end);

        $plan = $data->coloring_plan;
        $actual_total = $data_grand_total->grand_total; 

        // echo $plan;

        echo json_encode([
            'plan' => $plan,
            'actual_total' => $actual_total,
            // 'percentage' => round(($actual_total / $plan) * 100,1)
        ]);
    }


    
}
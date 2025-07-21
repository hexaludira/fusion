<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MC_plan_input extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        $this->load->model('mes_cable/Plan_daily_model','plan_model');
    }

    public function index() {
        $data['title'] = 'MES Cable-Plan Input';
        $data['sidebar_title'] = 'Dashboard - MES Cable';
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

    public function getPlanData(){
        $data = $this->plan_model->getPlanDataAll();
        echo json_encode($data);
        // header('Content-Type: application/json');
        // $list = $this->
    }
    
    public function addPlan() {
        header('Content-Type: application/json');
        $data = $this->input->post();
        date_default_timezone_set('Asia/Jakarta');
        $datetime_now = date('Y-m-d H:i:s');

        $dataSave = $this->plan_model->insertPlanData([
            'date_plan' => $data['plan_date_add'],
            'sales_order_no' => $data['plan_so_number_add'],
            'coloring_plan_qty'=> $data['plan_coloring_add'],
            'tubing_plan_qty'=> $data['plan_tubing_add'],
            'stranding_plan_qty'=> $data['plan_stranding_add'],
            'sheathing_plan_qty'=> $data['plan_sheathing_add'],
            'created_user_name'=> $this->session->userdata('name'),
            'created_date_time'=> $datetime_now,
            'is_delete'=>0 
        ]);

        echo json_encode([
            'success' => true
        ]);
    }

    public function editPlan() {
        $plan_id = $this->input->post('plan_id');
        $data = $this->plan_model->getPlanDataByID($plan_id);

        echo json_encode($data);
    }

    public function updatePlan() {
        header('Content-Type: application/json');
        $data = $this->input->post();
        date_default_timezone_set('Asia/Jakarta');
        $datetime_now = date('Y-m-d H:i:s');

        $dataAll = [
            'date_plan' => $data['plan_date_edit'],
            'sales_order_no' => $data['plan_so_number_edit'],
            'coloring_plan_qty'=> $data['plan_coloring_edit'],
            'tubing_plan_qty'=> $data['plan_tubing_edit'],
            'stranding_plan_qty'=> $data['plan_stranding_edit'],
            'sheathing_plan_qty'=> $data['plan_sheathing_edit'],
            'updated_user_name'=> $this->session->userdata('name'),
            'updated_date_time'=> $datetime_now,
        ];

        $dataUpdate = $this->plan_model->updatePlanData($data['plan_id_edit'],$dataAll);
        echo json_encode([
            'success' => true
        ]);
    }

    public function deletePlan() {
        header('Content-Type: application/json');
        $plan_id_delete = $this->input->post('plan_id_delete');
        date_default_timezone_set('Asia/Jakarta');
        $datetime_now = date('Y-m-d H:i:s');

        $dataAll = [
            'updated_user_name'=> $this->session->userdata('name'),
            'updated_date_time'=> $datetime_now,
            'is_delete'=> '1',
        ];

        $dataDelete = $this->plan_model->deletePlanData($plan_id_delete, $dataAll);

        echo json_encode([
            'success'=> true
        ]);
    }

    
}
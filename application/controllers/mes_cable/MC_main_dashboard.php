<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MC_main_dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        $this->load->model('mes_cable/Main_dashboard_model','main_model');
    }

    public function index() {
        $data['title'] = 'MES Cable-Main Dashboard';
        $data['sidebar_title'] = 'Dashboard - MES Cable';
        $data['sidebar'] = 'template/sidebar';
        $data['content'] = 'mes_cable/main_dashboard';
        $data['menus'] = $this->Menu_model->getMenuWithSub($this->session->userdata('role_id'));
        // if($this->session->userdata('role_id') == '2'){ //role user
        //     $data['content'] = 'dashboard/user';
        // } else {
        //     $data['content'] = 'dashboard/index';
        // }
        
        $this->load->view('template/main', $data); 
    }

    public function load_main_dashboard_today(){
        if (!$this->db->conn_id || !$this->db->simple_query('SELECT 1')) {
            log_message('error', 'Database connection lost. Reconnecting...');
            $this->db->reconnect();
        }

        $data_plan = $this->main_model->get_total_plan_by_today();
        $data_actual = $this->main_model->get_actual_by_today();
        
        $plan_ckm = $data_plan->sheathing_plan_ckm;
        $plan_fkm = $data_plan->sheathing_plan_fkm;
        $actual_ckm = $data_actual->grand_total_ckm / 1000;
        $actual_fkm = $data_actual->grand_total_fkm / 1000;

        $plan_ckm = is_null($plan_ckm) ? 0 : $plan_ckm;
        $plan_fkm = is_null($plan_fkm) ? 0 : $plan_fkm;

        if(($plan_ckm == 0) || ($plan_fkm == 0)){
            echo json_encode([
                'status' => 'error',
                'message' => 'Plan CKM or Plan FKM have not been inputted for today',
                'actual_ckm' => number_format($actual_ckm,2),
                'actual_fkm' => number_format($actual_fkm,2),
            ]);
            return;
        } else {
            echo json_encode([
                'plan_ckm' => number_format($plan_ckm,2),
                'actual_ckm' => number_format($actual_ckm,2),
                'percentage_ckm' => round(($actual_ckm / $plan_ckm) * 100,1),
                'plan_fkm' => number_format($plan_fkm,2),
                'actual_fkm' => number_format($actual_fkm,2),
                'percentage_fkm' => round(($actual_fkm / $plan_fkm) * 100,1)
            ]);
        }

    }

    public function load_main_dashboard_month(){
        $data_plan = $this->main_model->get_total_plan_by_month();
        $data_actual = $this->main_model->get_actual_by_month();

        $plan_ckm = $data_plan->sheathing_plan_ckm;
        $plan_fkm = $data_plan->sheathing_plan_fkm;
        $actual_ckm = $data_actual->grand_total_ckm / 1000;
        $actual_fkm = $data_actual->grand_total_fkm / 1000;

        $plan_ckm = $plan_ckm ?? 0;
        $plan_fkm = $plan_fkm ?? 0;

        if(($plan_ckm == 0) || ($plan_fkm == 0)){
            echo json_encode([
                'status' => 'error',
                'message' => 'No Data for Plan CKM or Plan FKM for this month',
                'actual_ckm' => number_format($actual_ckm,2),
                'actual_fkm' => number_format($actual_fkm,2)
            ]);
            return;
        } else {
            echo json_encode([
                'plan_ckm' => number_format($plan_ckm,2),
                'actual_ckm' => number_format($actual_ckm,2),
                'percentage_ckm' => round(($actual_ckm / $plan_ckm) * 100,1),
                'plan_fkm' => number_format($plan_fkm,2),
                'actual_fkm' => number_format($actual_fkm,2),
                'percentage_fkm' => round(($actual_fkm / $plan_fkm) * 100,1)
            ]);
        }
        
    }

    public function load_main_dashboard_year(){
        $data_plan = $this->main_model->get_total_plan_by_year();
        $data_actual = $this->main_model->get_actual_by_year();

        $plan_ckm = $data_plan->sheathing_plan_ckm;
        $plan_fkm = $data_plan->sheathing_plan_fkm;

        $actual_ckm = $data_actual->grand_total_ckm / 1000;
        $actual_fkm = $data_actual->grand_total_fkm / 1000;

        $plan_ckm = $plan_ckm ?? 0;
        $plan_fkm = $plan_fkm ?? 0;

        if(($plan_ckm == 0) || ($plan_fkm == 0)){
            echo json_encode([
                'status' => 'error',
                'message' => 'No Data for Plan CKM or Plan FKM for this year',
                'actual_ckm' => number_format($actual_ckm,2),
                'actual_fkm' => number_format($actual_fkm,2)
            ]);
            return;
        } else {
            echo json_encode([
                'plan_ckm' => number_format($plan_ckm,2),
                'actual_ckm' => number_format($actual_ckm,2),
                'percentage_ckm' => round(($actual_ckm / $plan_ckm) * 100,1),
                'plan_fkm' => number_format($plan_fkm,2),
                'actual_fkm' => number_format($actual_fkm,2),
                'percentage_fkm' => round(($actual_fkm / $plan_fkm) * 100,1)
            ]);
        }
    }

    
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_system extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_login();
        $this->load->model('Menu_model');
        $this->load->model('All_system_model','system_model');
    }

    public function index() {
        $data['title'] = 'All System';
        $data['sidebar'] = 'template/main_sidebar';
        $data['content'] = 'all_system';
        $role = $this->session->userdata('role_name');
        $systems = $this->system_model->getSystemsByRole($role);
        // echo 'Role ID: ' . $role;

        // show boxes depend on role
        $data['boxes'] = [];
        foreach ($systems as $sys) {
            $data['boxes'][$sys->system_code] = [
                'title' => $sys->system_name,
                'desc' => 'Dashboard & Report',
                'color' => $sys->color,
                'img' => $sys->icon,
                'url' => base_url($sys->url)
            ];
        }
        $data['role'] = $role;

        // $boxes = [
        //     'wms' => [
        //         'title' => 'WMS',
        //         'desc' => 'Dashboard & Report',
        //         'color' => 'bg-info',
        //         'img' => 'wms.png',
        //         'url' => base_url('wms/wms_main_dashboard')
        //     ],
        //     'mes_cable' => [
        //         'title' => 'MES Cable',
        //         'desc' => 'Dashboard & Report',
        //         'color' => 'bg-danger',
        //         'img' => 'mesc.png',
        //         'url' => base_url('mes_cable/mc_main_dashboard')
        //     ],
        //     'mes_fiber' => [
        //         'title' => 'MES Fiber',
        //         'desc' => 'Dashboard & Report',
        //         'color' => 'bg-warning',
        //         'img' => 'mesf.png',
        //         'url' => base_url('mes_fiber/mf_main_dashboard')
        //     ]
        // ];

        // $role_boxes = [
        //     'Administrator' => ['wms', 'mes_cable', 'mes_fiber'],
        //     'Cable_PPIC' => ['mes_cable'],
        //     'Cable_Non-PPIC' => ['wms']
        // ];

        // $visible_boxes = isset($role_boxes[$role]) ? $role_boxes[$role] : [];

        // $data['boxes'] = array_filter($boxes, function ($key) use ($visible_boxes) {
        //     return in_array($key,$visible_boxes);
        // }, ARRAY_FILTER_USE_KEY);
        
        $this->load->view('template/main', $data); 
    }

    public function show_about(){
        $data['title'] = 'About';
        $data['sidebar'] = 'template/main_sidebar';
        $data['content'] = 'about';
        $this->load->view('template/main', $data);
    }

    public function back_allsystem(){
        $this->index();
    }
}
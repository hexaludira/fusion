<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_daily_model extends CI_Model {
    public function getPlanDataAll() {
        $this->db->where('is_delete',0);
        return $this->db->get('mc_daily_plan_tbl')->result();
    }

    public function insertPlanData($data) {
        return $this->db->insert('mc_daily_plan_tbl', $data);
    }

    public function getPlanDataByID($plan_id) {
        $this->db->where('plan_id', $plan_id);
        return $this->db->get('mc_daily_plan_tbl')->result();
    }

    public function updatePlanData($plan_id, $data) {
        $this->db->where('plan_id', $plan_id);
        return $this->db->update('mc_daily_plan_tbl', $data);
    }

    public function deletePlanData($plan_id) {
        $this->db->where('plan_id', $plan_id);
        return $this->db->delete('mc_daily_plan_tbl');
    }   
}
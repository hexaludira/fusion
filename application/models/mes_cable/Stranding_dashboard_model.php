<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stranding_dashboard_model extends CI_Model{
    private $db_mes;

    public function __construct(){
        parent::__construct();
        $this->db_mes = $this->load->database('db_mes', TRUE);
    }

    // Query get stranding plan from table
    public function get_stranding_plan($start, $end){
        $plan_data = $this->db->query("SELECT
                                            SUM(stranding_plan_qty) AS stranding_plan
                                            FROM mc_daily_plan_tbl
                                            WHERE date_plan >= '$start'
                                            AND date_plan <= '$end'
                                            AND is_delete = 0
		")->row();

        return $plan_data;
    }

    public function get_stranding_details($start, $end){
        $detail_data = $this->db_mes->query("WITH RankedInspections AS(
			SELECT 
					A.inspection_no, 
					A.lot, 
					A.result, 
					A.matnr,
					C.name, 
					A.state, 
					A.test_no,
                        -- DATE_FORMAT(A.last_updated_date_time, '%Y-%m') AS bulan,
					ROW_NUMBER() OVER (PARTITION BY A.lot ORDER BY A.test_no DESC) AS rn,
					B.sample_data
			FROM qc_inspection AS A
			LEFT JOIN qc_inspection_item_detail AS B 
					ON A.inspection_no = B.inspection_no 
					AND B.is_deleted = 0
					AND B.item_no = '23081500007'
			LEFT JOIN basic_material AS C
					ON A.matnr = C.matnr
			WHERE 
					A.Procedures = 'ST'
					AND A.biz_type = 1 
					AND A.state = 1 
					AND A.result = 1
					AND A.is_deleted = 0
					AND A.created_date_time >= '$start'
                    AND A.created_date_time <= '$end'
			GROUP BY A.inspection_no
 	)
	SELECT matnr, name, SUM(sample_data) AS production_length
	FROM RankedInspections
	WHERE rn = 1
	GROUP BY matnr
	ORDER BY matnr")->result();
        return $detail_data;
    }

	public function get_stranding_grand_total($start, $end){
		$actual_grand_total = $this->db_mes->query("WITH RankedInspections AS(
			SELECT 
					A.inspection_no, 
					A.lot, 
					A.result, 
					A.matnr,
					C.name, 
					A.state, 
					A.test_no,
                        -- DATE_FORMAT(A.last_updated_date_time, '%Y-%m') AS bulan,
					ROW_NUMBER() OVER (PARTITION BY A.lot ORDER BY A.test_no DESC) AS rn,
					B.sample_data
			FROM qc_inspection AS A
			LEFT JOIN qc_inspection_item_detail AS B 
					ON A.inspection_no = B.inspection_no 
					AND B.is_deleted = 0
					AND B.item_no = '23081500007'
			LEFT JOIN basic_material AS C
					ON A.matnr = C.matnr
			WHERE 
					A.Procedures = 'ST'
					AND A.biz_type = 1 
					AND A.state = 1 
					AND A.result = 1
					AND A.is_deleted = 0
					AND A.created_date_time >= '$start'
                    AND A.created_date_time <= '$end'
			GROUP BY A.inspection_no
			),
			Summary AS (
				SELECT matnr, name, SUM(sample_data) AS production_length
				FROM RankedInspections
				WHERE rn = 1
				GROUP BY matnr, name 
			)
			SELECT ROUND((SUM(production_length) / 1000), 2) AS grand_total
			FROM Summary
		")->row();

		return $actual_grand_total;
	}
}
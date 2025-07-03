<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tubing_dashboard_model extends CI_Model{
    private $db_mes;

    public function __construct(){
        parent::__construct();
        $this->db_mes = $this->load->database('db_mes', TRUE);
    }

    public function get_tubing_plan($start,$end){
        $plan_data = $this->db->query("SELECT  
                                            SUM(tubing_plan_qty) as tubing_plan  
                                            FROM mc_daily_plan_tbl 
                                            WHERE date_plan >= '$start' 
                                            AND date_plan <= '$end'
                                            AND is_delete = 0
        ")->row();

        return $plan_data;
    }

    public function get_tubing_details($start,$end){
        $detail_data = $this->db_mes->query("WITH RankedInspections AS(
			SELECT 
					A.inspection_no, 
					A.lot, 
					A.result, 
					A.matnr,
					C.name, 
					A.state, 
					A.test_no,
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
					A.Procedures = 'SC'
					AND A.biz_type = 1 
					AND A.state = 1 
					AND A.result = 1
					AND A.is_deleted = 0
					AND DATE(A.last_updated_date_time) >= '$start'
					AND DATE(A.last_updated_date_time) <= '$end'
			GROUP BY A.inspection_no
            )
                SELECT 
                    TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 5), ',', -1)) AS color,
                    TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 3), ',', -1)) AS core,
                    SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 2), ',', -1)) = '1.9' THEN sample_data ELSE 0 END) AS 'diam_1_9',
                    SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 2), ',', -1)) = '2' THEN sample_data ELSE 0 END) AS 'diam_2',
                    SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 2), ',', -1)) = '2.1' THEN sample_data ELSE 0 END) AS 'diam_2_1',
                    SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 2), ',', -1)) = '2.2' THEN sample_data ELSE 0 END) AS 'diam_2_2',
                    SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 2), ',', -1)) = '2.4' THEN sample_data ELSE 0 END) AS 'diam_2_4',
                    SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 2), ',', -1)) = '3.2' THEN sample_data ELSE 0 END) AS 'diam_3_2'
                FROM RankedInspections
                WHERE rn = 1
                GROUP BY core,color
                ORDER BY core,color")->result();
        return $detail_data;
    }

    public function get_tubing_grand_total($start,$end){
        $actual_grand_total = $this->db_mes->query("WITH RankedInspections AS (
            SELECT
                A.inspection_no,
                A.lot,
                A.result,
                A.matnr,
                C.name,
                A.state,
                A.test_no,
                ROW_NUMBER() OVER (PARTITION BY A.lot ORDER BY A.test_no DESC) AS rn,
                B.sample_data
            FROM
                qc_inspection AS A
            LEFT JOIN
                qc_inspection_item_detail AS B
                ON A.inspection_no = B.inspection_no
                AND B.is_deleted = 0
                AND B.item_no = '23081500007'
            LEFT JOIN
                basic_material AS C
                ON A.matnr = C.matnr
            WHERE
                A.procedures = 'SC'
                AND A.biz_type = 1
                AND A.state = 1
                AND A.result = 1
                AND A.is_deleted = 0
                AND DATE(A.last_updated_date_time) >= '$start'
                AND DATE(A.last_updated_date_time) <= '$end'
            GROUP BY
                A.inspection_no
            ORDER BY
                A.last_updated_date_time DESC
            ),
            Grouped AS (
                SELECT
                    TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name,',',2),',',-1)) AS diameter,
                    TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name,',',5),',',-1)) AS color,
                    SUM(sample_data) AS total_qty
                FROM RankedInspections
                WHERE rn = 1
                GROUP BY diameter, color
            )
            SELECT SUM(total_qty) / 1000 AS grand_total
            FROM Grouped
        ")->row();

        return $actual_grand_total;
    }
}
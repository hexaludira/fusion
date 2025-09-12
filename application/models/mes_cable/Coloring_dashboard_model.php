<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coloring_dashboard_model extends CI_Model {
    private $db_mes;

    public function __construct(){
        parent::__construct();
        $this->db_mes = $this->load->database('db_mes', TRUE);
    }
    public function get_coloring_plan($start, $end){
        // $start_input = date('Y-m-d', strtotime($start));
        // $end_input = date('Y-m-d', strtotime($end));
        $plan_data = $this->db->query("SELECT 
                                        SUM(coloring_plan_qty) as coloring_plan
                                        FROM mc_daily_plan_tbl 
                                        WHERE date_plan >= '$start' 
                                        AND date_plan <= '$end'
                                        AND is_delete = 0
        ")->row();

        return $plan_data;
    }

    public function get_coloring_details($start, $end){
        $detail_data = $this->db_mes->query("WITH RankedInspections AS(
                                                SELECT 
                                                    A.inspection_no, 
                                                    A.lot, 
                                                    A.result, 
                                                    A.matnr,
                                                    C.name, 
                                                    A.state, 
                                                    A.test_no,
                                                    DATE_FORMAT(A.last_updated_date_time, '%Y-%m') AS bulan,
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
                                                    A.Procedures = 'CL'
                                                    AND A.biz_type = 1 
                                                    AND A.state = 1 
                                                    AND A.result = 1
                                                    AND A.is_deleted = 0
                                                    AND DATE(A.last_updated_date_time) >= '$start'
                                                    AND DATE(A.last_updated_date_time) <= '$end'
                                                GROUP BY A.inspection_no
                                            )
                                            SELECT 
                                                TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 4), ',', -1)) AS color,
                                                SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 3), ',', -1)) = 'G652D' THEN sample_data ELSE 0 END) AS G652D,
                                                SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 3), ',', -1)) = 'G655' THEN sample_data ELSE 0 END) AS G655,
                                                SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 3), ',', -1)) = 'G657A1' THEN sample_data ELSE 0 END) AS G657A1,
                                                SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 3), ',', -1)) = 'G657A1-200' THEN sample_data ELSE 0 END) AS G657A1_200,
                                                SUM(CASE WHEN TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name, ',', 3), ',', -1)) = 'G657A2' THEN sample_data ELSE 0 END) AS G657A2
                                            FROM RankedInspections
                                            WHERE rn = 1
                                            GROUP BY color
                                            ORDER BY color")->result();

        return $detail_data;
    }

    public function get_actual_coloring ($start, $end){
        $actual_data = $this->db_mes->query("WITH RankedInspections AS (
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
                                                    A.procedures = 'CL'
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
                                                )
                                                SELECT
                                                    TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name,',',3),',',-1)) AS cable_type,
                                                    TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name,',',4),',',-1)) AS color,
                                                    SUM(sample_data) AS total_qty
                                                FROM RankedInspections
                                                WHERE rn = 1
                                                GROUP BY cable_type, color
                                                ORDER BY cable_type, color
        ")->result();

        return $actual_data;
    }

    public function get_coloring_grand_total ($start, $end){
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
                A.procedures = 'CL'
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
                    TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name,',',3),',',-1)) AS cable_type,
                    TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(name,',',4),',',-1)) AS color,
                    SUM(sample_data) AS total_qty
                FROM RankedInspections
                WHERE rn = 1
                GROUP BY cable_type, color
            )
            SELECT ROUND((SUM(total_qty) / 1000), 2) AS grand_total
            FROM Grouped
        ")->row();

        return $actual_grand_total;
    }
}
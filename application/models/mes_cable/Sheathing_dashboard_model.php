<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheathing_dashboard_model extends CI_Model{
    private $db_mes;

    public function __construct(){
        parent::__construct();
        $this->db_mes = $this->load->database('db_mes', TRUE);
    }

    public function get_sheathing_plan($start, $end){
        $plan_data = $this->db->query("SELECT
                                            SUM(sheathing_plan_ckm_qty) AS sheathing_plan_ckm,
                                            SUM(sheathing_plan_fkm_qty) AS sheathing_plan_fkm
                                            FROM mc_daily_plan_tbl
                                            WHERE date_plan >= '$start'
                                            AND date_plan <= '$end'
                                            AND is_delete = 0
        ")->row();

        return $plan_data;
    }

    public function get_sheathing_details( $start, $end){
        $detail_data = $this->db_mes->query("WITH RankedInspections AS(
			SELECT 
					A.inspection_no, 
					A.lot, 
					A.result, 
					A.matnr,
					C.name AS material_name, 
					A.state, 
					A.test_no,
					D.name AS customer_name,
					E.shop_lot AS lot_number,
					F.sales_order_no AS sales_order_no,
					ROW_NUMBER() OVER (PARTITION BY A.lot ORDER BY A.test_no DESC) AS rn,
					B.sample_data
			FROM qc_inspection AS A
			LEFT JOIN qc_inspection_item_detail AS B 
					ON A.inspection_no = B.inspection_no 
					AND B.is_deleted = 0
					AND B.item_no = '23081500007'
			LEFT JOIN basic_material AS C
					ON A.matnr = C.matnr
			LEFT JOIN shop_lot AS E
					ON A.lot = E.shop_lot
			LEFT JOIN shoporder AS F
					ON E.shoporder_no = F.shoporder_no
			LEFT JOIN sales_order AS G
					ON F.sales_order_no = G.sales_order_no
			LEFT JOIN basic_customer AS D
					ON G.customer_no = D.customer_no
			WHERE 
					A.Procedures = 'SH'
					AND A.biz_type = 1 
					AND A.state = 1
					AND A.is_deleted = 0
					AND A.created_date_time >= '$start'
                    AND A.created_date_time <= '$end'
			GROUP BY A.inspection_no
        )
            SELECT 
            IFNULL(sales_order_no,'-') AS sales_order_no, 
            lot_number, 
            matnr,
            material_name, 
            IFNULL(customer_name,'-') AS customer_name, 
            SUM(CASE WHEN result = 1 THEN sample_data ELSE 0 END) AS ckm,
            SUM(
                CASE WHEN result = 1
                    THEN CAST(
                                    CASE 
                                        WHEN LENGTH(material_name) - LENGTH(REPLACE(material_name,',','')) = 4 THEN
                                            SUBSTRING_INDEX(SUBSTRING_INDEX(material_name,',',4),',',-1)
                                        WHEN LENGTH(material_name) - LENGTH(REPLACE(material_name, ',', '')) = 3 THEN
                                            SUBSTRING_INDEX(SUBSTRING_INDEX(material_name, ',', 3), ',', -1)
                                        ELSE
                                            REGEXP_SUBSTR(material_name, '\\b\\d{1,3}(?=C?\\b)')
                                        END AS UNSIGNED
                                ) * sample_data
                    ELSE 0 END
                ) AS fkm,
            SUM(CASE WHEN result = 2 THEN sample_data ELSE 0 END) AS unqualified,
            SUM(CASE WHEN result = 0 THEN sample_data ELSE 0 END) AS uninspected
            FROM RankedInspections
            WHERE rn = 1
            GROUP BY sales_order_no
            ORDER BY matnr
        ")->result();

        return $detail_data;
    }

    public function get_sheathing_grand_total( $start, $end ){
        $actual_grand_total = $this->db_mes->query("SELECT
                SUM(ckm) AS grand_total_ckm,
                SUM(fkm) AS grand_total_fkm
            FROM (
            WITH RankedInspections AS(
                        SELECT 
                                A.inspection_no, 
                                A.lot, 
                                A.result, 
                                A.matnr,
                                C.name AS material_name, 
                                A.state, 
                                A.test_no,
                                D.name AS customer_name,
                                E.shop_lot AS lot_number,
                                F.sales_order_no AS sales_order_no,
                                ROW_NUMBER() OVER (PARTITION BY A.lot ORDER BY A.test_no DESC) AS rn,
                                B.sample_data
                        FROM qc_inspection AS A
                        LEFT JOIN qc_inspection_item_detail AS B 
                                ON A.inspection_no = B.inspection_no 
                                AND B.is_deleted = 0
                                AND B.item_no = '23081500007'
                        LEFT JOIN basic_material AS C
                                ON A.matnr = C.matnr
                        LEFT JOIN shop_lot AS E
                                ON A.lot = E.shop_lot
                        LEFT JOIN shoporder AS F
                                ON E.shoporder_no = F.shoporder_no
                        LEFT JOIN sales_order AS G
                                ON F.sales_order_no = G.sales_order_no
                        LEFT JOIN basic_customer AS D
                                ON G.customer_no = D.customer_no
                        WHERE 
                                A.Procedures = 'SH'
                                AND A.biz_type = 1 
                                AND A.state = 1
                                AND A.is_deleted = 0
                                AND A.created_date_time >= '$start'
                                AND A.created_date_time <= '$end'
                        GROUP BY A.inspection_no
            )
                SELECT 
                IFNULL(sales_order_no,'-') AS sales_order_no, 
                lot_number, 
                matnr,
                material_name, 
                IFNULL(customer_name,'-') AS customer_name, 
                SUM(CASE WHEN result = 1 THEN sample_data ELSE 0 END) AS ckm,
                SUM(
                    CASE WHEN result = 1
                        THEN CAST(
                                        CASE 
                                            WHEN LENGTH(material_name) - LENGTH(REPLACE(material_name,',','')) = 4 THEN
                                                SUBSTRING_INDEX(SUBSTRING_INDEX(material_name,',',4),',',-1)
                                            WHEN LENGTH(material_name) - LENGTH(REPLACE(material_name, ',', '')) = 3 THEN
                                                SUBSTRING_INDEX(SUBSTRING_INDEX(material_name, ',', 3), ',', -1)
                                            ELSE
                                                REGEXP_SUBSTR(material_name, '\\b\\d{1,3}(?=C?\\b)')
                                            END AS UNSIGNED
                                    ) * sample_data
                        ELSE 0 END
                    ) AS fkm,
                SUM(CASE WHEN result = 2 THEN sample_data ELSE 0 END) AS unqualified,
                SUM(CASE WHEN result = 0 THEN sample_data ELSE 0 END) AS uninspected
                FROM RankedInspections
                WHERE rn = 1
                GROUP BY sales_order_no
                ORDER BY matnr
                ) AS summary
        ")->row();

        return $actual_grand_total;
    }

}
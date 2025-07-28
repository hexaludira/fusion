<?php
defined ("BASEPATH") OR exit("No direct script access allowed");

class Salesorder_tracking_model extends CI_Model{
    private $db_mes;

    public function __construct(){
        parent::__construct ();
        $this->db_mes = $this->load->database ('db_mes', TRUE);
    }

    public function get_salesorder_tracking($start, $end){
        $detail_data = $this->db_mes->query("WITH RankedInspections AS(
			SELECT
					G.order_created_date_time,
					D.name AS customer_name,
					A.lot, 
					A.result, 
					A.matnr,
					C.name AS material_name, 
					A.state, 
					A.test_no,
					A.procedures AS procedures,
					E.shop_lot AS lot_number,
					F.sales_order_no AS sales_order_no,
					F.sales_order_item_no AS sales_order_item_no,
					F.plan_quantity AS qty_order,
					F.shoporder_no AS shoporder_no,
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
					A.biz_type = 1 
					AND A.state = 1
					AND A.is_deleted = 0
					AND F.sales_order_no = 'SO2507170002'
					AND DATE(A.last_updated_date_time) >= '$start'
					AND DATE(A.last_updated_date_time) <= '$end'
			GROUP BY A.inspection_no
            ), 
            Pivoted AS (
                SELECT
                order_created_date_time AS created_date,
                IFNULL(customer_name,'-') AS customer_name,
                IFNULL(sales_order_no,'-') AS sales_order_no, 
                sales_order_item_no,
                shoporder_no,
                matnr,
                material_name,
                qty_order,
                SUM(CASE WHEN procedures = 'CL' THEN sample_data ELSE 0 END) AS coloring,
                SUM(CASE WHEN procedures = 'SC' THEN sample_data ELSE 0 END) AS tubing,
                SUM(CASE WHEN procedures = 'ST' THEN sample_data ELSE 0 END) AS stranding,
                SUM(CASE WHEN procedures = 'SH' THEN sample_data ELSE 0 END) AS sheathing
                FROM RankedInspections
                WHERE rn = 1
                GROUP BY sales_order_no,
                                    sales_order_item_no,
                                    procedures,
                                    shoporder_no,
                                    customer_name,
                                    material_name
            )
            SELECT *
            FROM Pivoted
            ORDER BY sales_order_no, sales_order_item_no
                    
        ")->result();

        return $detail_data;
    }
}
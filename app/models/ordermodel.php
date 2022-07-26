<?php

class ordermodel extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_order($table_order, $data_order)
    {
        return $this->db->insert($table_order, $data_order);
    }

    public function insert_import_order($table_import_order, $data_order)
    {
        return $this->db->insert($table_import_order, $data_order);
    }

    public function add_import($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_import_order DESC";
        return $this->db->select($sql);
    }

    public function insert_order_details($table_order_details, $data_details)
    {
        return $this->db->insert($table_order_details, $data_details);
    }
    public function list_order($table_order)
    {
        $sql = "SELECT * FROM $table_order ORDER BY order_id DESC";
        return $this->db->select($sql);
    }
    public function list_order_customer($table_order, $cus_id)
    {
        $sql = "SELECT * FROM $table_order WHERE customer_id=$cus_id ORDER BY order_id DESC";
        return $this->db->select($sql);
    }

    public function list_import_order($table_import_order, $table_product, $cond)

    {
        $sql = "SELECT * FROM $table_import_order,$table_product WHERE $cond ORDER BY $table_import_order.id_import_order DESC";
        return $this->db->select($sql);
    }

    public function list_order_details($table_order_details, $table_product, $cond)
    {
        $sql = "SELECT * FROM $table_order_details,$table_product WHERE $cond ";
        return $this->db->select($sql);
    }


    public function list_info($table_order_details, $cond2)
    {
        $sql = "SELECT * FROM $table_order_details WHERE $cond2 LIMIT 1";
        return $this->db->select($sql);
    }

    public function order_confirm($table_order, $data, $cond)
    {
        return $this->db->update($table_order, $data, $cond);
    }

    public function thongke()
    {
        $sql = "SELECT Month(tbl_order.order_date) AS 'thang',SUM(tbl_order_details.product_quantity*tbl_product.price_product) AS 'tongban' FROM tbl_order_details INNER JOIN tbl_order ON tbl_order.order_code=tbl_order_details.order_code INNER JOIN tbl_product ON tbl_order_details.product_id=tbl_product.id_product WHERE tbl_order.order_status=1 GROUP BY Month(tbl_order.order_date)";
        return $this->db->select($sql);
    }
}

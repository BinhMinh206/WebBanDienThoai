<?php

class categorymodel extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function category($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond ORDER BY id_category_product DESC";
        return $this->db->select($sql);
    }

    public function add_product($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
        return $this->db->select($sql);
    }

    public function category_home($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
        return $this->db->select($sql);
    }

    public function categorybyid_home($table, $table_product, $id)
    {
        $sql = "SELECT * FROM $table,$table_product WHERE $table.id_category_product=$table_product.id_category_product AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);
    }

    public function categorybyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }

    public function insertcategory($table_category_product, $data)
    {
        return $this->db->insert($table_category_product, $data);
    }

    public function updatecategory($table_category_product, $data, $cond)
    {
        return $this->db->update($table_category_product, $data, $cond);
    }

    public function deletecategory($table_category_product, $cond)
    {
        return $this->db->delete($table_category_product, $cond);
    }
    //product
    public function insertproduct($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function list_product_home($table_product)
    {
        $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);
    }

    public function list_product_index($table_product)
    {
        $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);
    }

    public function list_product_index_search($table_product, $cond)
    {
        $sql = "SELECT * FROM $table_product WHERE $cond ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);
    }

    public function product($table_product, $table_category, $cond)
    {
        $sql = "SELECT * FROM $table_product,$table_category WHERE $table_product.id_category_product=$table_category.id_category_product AND $cond ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);
    }
    public function deleteproduct($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }

    public function productbyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }

    public function updateproduct($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
    public function details_product_home($table, $table_product, $cond)
    {
        $sql = "SELECT * FROM $table_product,$table WHERE $cond";
        return $this->db->select($sql);
    }
    public function thongkeloai()
    {
        $sql = "SELECT tbl_category_product.*,COUNT(tbl_category_product.id_category_product) AS 'number_cate' FROM tbl_product INNER JOIN tbl_category_product ON tbl_product.id_category_product=tbl_category_product.id_category_product GROUP BY tbl_product.id_category_product";
        return $this->db->select($sql);
    }
    public function thongkesp($cond)
    {
        $sql = "SELECT tbl_product.*,SUM(tbl_order_details.product_quantity) AS 'tongban' FROM tbl_order_details INNER JOIN tbl_order ON tbl_order.order_code=tbl_order_details.order_code INNER JOIN tbl_product ON tbl_order_details.product_id=tbl_product.id_product WHERE Month(tbl_order.order_date)=$cond AND tbl_order.order_status=1 GROUP BY tbl_order_details.product_id,tbl_product.id_product";
        return $this->db->select($sql);
    }
}

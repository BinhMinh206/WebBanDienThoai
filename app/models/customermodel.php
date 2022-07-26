<?php

class customermodel extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }

    // public function category($table)
    // {
    //     $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
    //     return $this->db->select($sql);
    // }

    // public function category_home($table)
    // {
    //     $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
    //     return $this->db->select($sql);
    // }

    // public function categorybyid_home($table, $table_product, $id)
    // {
    //     $sql = "SELECT * FROM $table,$table_product WHERE $table.id_category_product=$table_product.id_category_product AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product DESC";
    //     return $this->db->select($sql);
    // }

    // public function categorybyid($table, $cond)
    // {
    //     $sql = "SELECT * FROM $table WHERE $cond";
    //     return $this->db->select($sql);
    // }

    public function insertcustomer($table_customer, $data)
    {
        return $this->db->insert($table_customer, $data);
    }

    public function edit_customer($table_cus, $cond)
    {
        $sql = "SELECT * FROM $table_cus WHERE $cond";
        return $this->db->select($sql);
    }

    public function update_customer($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    public function login($table_customer, $username, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=?";
        return $this->db->affectedRows($sql, $username, $password);
    }

    public function getLogin($table_customer, $username, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=?";
        return $this->db->selectUser($sql, $username, $password);
    }
    // public function updatecategory($table_category_product, $data, $cond)
    // {
    //     return $this->db->update($table_category_product, $data, $cond);
    // }

    // public function deletecategory($table_category_product, $cond)
    // {
    //     return $this->db->delete($table_category_product, $cond);
    // }
}

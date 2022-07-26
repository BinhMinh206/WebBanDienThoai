<?php

class adminmodel extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_admin($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function list_admin($table)
    {
        $sql = "SELECT * FROM $table ORDER BY admin_id ASC";
        return $this->db->select($sql);
    }

    public function delete_admin($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }

    public function edit_admin($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }

    public function update_admin($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
}

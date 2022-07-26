<?php

class admin extends DController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->admin();
    }
    public function admin()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/admin/add_admin');
        $this->load->view('cpanel/footer');
    }

    public function list_admin()
    {
        $table = "tbl_admin";
        $adminmodel = $this->load->model('adminmodel');
        $data['admin'] = $adminmodel->list_admin($table);
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/admin/list_admin', $data);
        $this->load->view('cpanel/footer');
    }
    
    public function insert_admin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $table = "tbl_admin";
        $data = array(
            'username' => $username,
            'password' => $password
        );
        $adminmodel = $this->load->model('adminmodel');
        $result = $adminmodel->insert_admin($table, $data);
        if ($result == 1) {
            $message['msg'] = "Thêm admin thành công";
            header('Location:' . BASE_URL . "/admin/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Thêm admin thất bại";
            header('Location:' . BASE_URL . "/admin/?msg=" . urlencode(serialize($message)));
        }
    }
    public function delete_admin($id)
    {

        $table = "tbl_admin";
        $cond = "tbl_admin.admin_id='$id'";
        $adminmodel = $this->load->model('adminmodel');
        $result = $adminmodel->delete_admin($table, $cond);
        if ($result == 1) {
            $message['msg'] = "Xoá admin thành công";
            header('Location:' . BASE_URL . "/admin/list_admin?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Xoá admin thất bại";
            header('Location:' . BASE_URL . "/admin/list_admin?msg=" . urlencode(serialize($message)));
        }
    }
    public function edit_admin($id)
    {
        $table = "tbl_admin";
        $cond = "tbl_admin.admin_id='$id'";
        $adminmodel = $this->load->model('adminmodel');
        $data['admin'] = $adminmodel->edit_admin($table, $cond);
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/admin/edit_admin', $data);
        $this->load->view('cpanel/footer');
    }

    public function update_admin($id)
    {
        $table = "tbl_admin";
        $cond = "tbl_admin.admin_id='$id'";

        $password = $_POST['password'];
        $data = array(
            'password' => $password
        );

        $adminmodel = $this->load->model('adminmodel');
        $result = $adminmodel->update_admin($table, $data, $cond);
        if ($result == 1) {
            $message['msg'] = "Đổi mật khẩu thành công";
            header('Location:' . BASE_URL . "/admin/list_admin?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Đổi mật khẩu  thất bại";
            header('Location:' . BASE_URL . "/admin/list_admin?msg=" . urlencode(serialize($message)));
        }
    }
}

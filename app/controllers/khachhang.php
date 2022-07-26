<?php

class khachhang extends DController
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->khachhang();
    }
    public function khachhang()
    {
        $table = 'tbl_category_product';
        $table_product = 'tbl_product';
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['product_home'] = $categorymodel->list_product_index($table_product);

        $this->load->view('header', $data);
        $this->load->view('slider');
        $this->load->view('home', $data);
        $this->load->view('footer');
    }


    public function dangnhap()
    {
        $table = 'tbl_category_product';
        $table_product = 'tbl_product';
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['product_home'] = $categorymodel->list_product_index($table_product);
        Session::init();

        $this->load->view('header', $data);
        $this->load->view('customer_login');
        $this->load->view('footer');
    }

    public function dangxuat()
    {

        Session::init();
        Session::destroy();
        $message['msg'] = "Đăng xuất thành công";
        header('Location:' . BASE_URL . "/khachhang/dangnhap?msg=" . urlencode(serialize($message)));
    }

    public function login_customer()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $table_customer = "tbl_customers";
        $customermodel = $this->load->model('customermodel');

        $count = $customermodel->login($table_customer, $username, $password);

        if ($count == 0) {
            $message['msg'] = "Đăng nhập thất bại";
            header('Location:' . BASE_URL . "/khachhang/dangnhap?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Đăng nhập thành công";

            $result = $customermodel->getLogin($table_customer, $username, $password);
            Session::init();
            Session::set('customer', true);
            Session::set('customer_name', $result[0]['customer_name']);
            Session::set('customer_id', $result[0]['customer_id']);
            Session::set('customer_phone', $result[0]['customer_phone']);
            Session::set('customer_email', $result[0]['customer_email']);
            Session::set('customer_address', $result[0]['customer_address']);
            header('Location:' . BASE_URL);
        }
    }
    public function insert_dangky()
    {
        $name = $_POST['txtHoTen'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['txtDienThoai'];
        $address = $_POST['txtDiaChi'];
        $password = $_POST['txtPassword'];

        $table_customer = "tbl_customers";
        $data = array(
            'customer_name' => $name,
            'customer_email' => $email,
            'customer_phone' => $phone,
            'customer_address' => $address,
            'customer_password' => $password
        );
        $customermodel = $this->load->model('customermodel');
        $result = $customermodel->insertcustomer($table_customer, $data);
        if ($result == 1) {
            $message['msg'] = "Đăng ký thành công";
            header('Location:' . BASE_URL . "/khachhang/dangnhap?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Đăng ký thất bại";
            header('Location:' . BASE_URL . "/khachhang/dangnhap?msg=" . urlencode(serialize($message)));
        }
    }

    public function customer_order()
    {
        Session::init();
        $table = 'tbl_category_product';
        $table_product = 'tbl_product';
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['product_home'] = $categorymodel->list_product_index($table_product);
        $ordermodel = $this->load->model('ordermodel');
        $table_order = 'tbl_order';
        $cus_id = $_SESSION['customer_id'];
        $data['order'] = $ordermodel->list_order_customer($table_order, $cus_id);

        $this->load->view('header', $data);
        $this->load->view('customer_order', $data);
        //  $this->load->view('footer');
    }

    public function order_details_customer($order_code)
    {
        Session::init();
        $table = 'tbl_category_product';
        $table_product = 'tbl_product';
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['product_home'] = $categorymodel->list_product_index($table_product);
        $ordermodel = $this->load->model('ordermodel');

        $table_product = 'tbl_product';
        $table_order_details = 'tbl_order_details';

        $cond = "$table_product.id_product=$table_order_details.product_id AND $table_order_details.order_code='$order_code'";

        $cond2 = "$table_order_details.order_code='$order_code'";


        $data['order_details'] = $ordermodel->list_order_details($table_order_details, $table_product, $cond);
        $data['order_info'] = $ordermodel->list_info($table_order_details, $cond2);

        $this->load->view('header', $data);

        $this->load->view('order_details_customer', $data);
    }

    public function edit_customer()
    {
        Session::init();
        $table = 'tbl_category_product';
        $table_product = 'tbl_product';
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['product_home'] = $categorymodel->list_product_index($table_product);
        $table_cus = "tbl_customers";
        $id = $_SESSION['customer_id'];
        $cond = "tbl_customers.customer_id='$id'";
        $customermodel = $this->load->model('customermodel');
        $data['customer'] = $customermodel->edit_customer($table_cus, $cond);
        $this->load->view('header', $data);
        $this->load->view('edit_customer', $data);
    }

    public function update_customer($id)
    {
        Session::init();
        $table = "tbl_customers";
        $id = $_SESSION['customer_id'];
        $cond = "tbl_customers.customer_id='$id'";


        $password = $_POST['password'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $data = array(
            'customer_password' => $password,
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_address' => $address
        );

        $customermodel = $this->load->model('customermodel');
        $result = $customermodel->update_customer($table, $data, $cond);

        if ($result == 1) {
            $message['msg'] = "Đổi thông tin thành công";
            header('Location:' . BASE_URL . "/khachhang/edit_customer?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Đổi thông tin thất bại";
            header('Location:' . BASE_URL . "/khachhang/edit_customerx?msg=" . urlencode(serialize($message)));
        }
    }
}

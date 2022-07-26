<?php

class order extends DController
{
    public function __construct()
    {
        Session::checkSession();
        parent::__construct();
    }
    public function index()
    {
        $this->order();
    }
    public function order()
    {
        $ordermodel = $this->load->model('ordermodel');
        $table_order = 'tbl_order';
        $data['order'] = $ordermodel->list_order($table_order);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $this->load->view('cpanel/order/order', $data);
        $this->load->view('cpanel/footer');
    }

    public function list_import_order()
    {
        $ordermodel = $this->load->model('ordermodel');
        $table_import_order = 'tbl_import_order';
        $cond = "tbl_import_order.product_id=tbl_product.id_product";
        $table_product = "tbl_product";
        $data['import'] = $ordermodel->list_import_order($table_import_order, $table_product, $cond);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $this->load->view('cpanel/order/list_import_order', $data);
        $this->load->view('cpanel/footer');
    }
    public function add_import()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $table_product = "tbl_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['product'] = $categorymodel->list_product_home($table_product);

        $this->load->view('cpanel/order/add_import_order', $data);
        $this->load->view('cpanel/footer');
    }

    public function thongke()
    {
        $ordermodel = $this->load->model('ordermodel');
        $data['doanhthu'] = $ordermodel->thongke();
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/order/thongkedoanhthu', $data);
        $this->load->view('cpanel/footer');
    }

    public function insert_import_order()
    {
        $ncc = $_POST['supplier'];
        $product_id = $_POST['product'];
        $quantity = $_POST['soluong'];
        $price = $_POST['gianhap'];
        $id_admin = $_SESSION['adminid'];
        $name_admin = $_SESSION['adminname'];
        $table_import_order = "tbl_import_order";
        date_default_timezone_set('asia/ho_chi_minh');
        $date = date("d-m-Y");
        $hour = date("h:i:sa");
        $order_date = $date . $hour;

        $data = array(
            'supplier' => $ncc,
            'date' => $date . ' ' . $hour,
            'id_admin' => $id_admin,
            'admin_name' => $name_admin,
            'product_id' => $product_id,
            'product_quantity' => $quantity,
            'product_price' => $price
        );
        $ordermodel = $this->load->model('ordermodel');
        $result = $ordermodel->insert_import_order($table_import_order, $data);
        if ($result == 1) {
            $message['msg'] = "Thêm loại sản phẩm thành công";
            header('Location:' . BASE_URL . "/order/list_import_order?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Thêm loại sản phẩm thất bại";
            header('Location:' . BASE_URL . "/order/list_import_order?msg=" . urlencode(serialize($message)));
        }
    }
    public function order_details($order_code)
    {
        $ordermodel = $this->load->model('ordermodel');

        $table_product = 'tbl_product';
        $table_order_details = 'tbl_order_details';

        $cond = "$table_product.id_product=$table_order_details.product_id AND $table_order_details.order_code='$order_code'";

        $cond2 = "$table_order_details.order_code='$order_code'";


        $data['order_details'] = $ordermodel->list_order_details($table_order_details, $table_product, $cond);
        $data['order_info'] = $ordermodel->list_info($table_order_details, $cond2);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $this->load->view('cpanel/order/order_details', $data);
        $this->load->view('cpanel/footer');
    }
    public function order_confirm($order_code)
    {


        $ordermodel = $this->load->model('ordermodel');
        $table_order = 'tbl_order';
        $cond = "$table_order.order_code='$order_code'";
        $data = array(
            'order_status' => 1
        );
        $result = $ordermodel->order_confirm($table_order, $data, $cond);

        if ($result == 1) {
            $message['msg'] = "Đã xử lí đơn hàng thành công";
            header('Location:' . BASE_URL . "/order?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Đã xử lí đơn hàng thất bại";
            header('Location:' . BASE_URL . "/order?msg=" . urlencode(serialize($message)));
        }
    }
}

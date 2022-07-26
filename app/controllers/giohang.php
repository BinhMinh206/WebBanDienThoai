<?php

class giohang extends DController
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->giohang();
    }
    public function giohang()
    {
        Session::init();

        $table = 'tbl_category_product';
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $this->load->view('header', $data);
        $this->load->view('cart');
        $this->load->view('footer');
    }

    public function themgiohang()
    {
        Session::init();
        if (isset($_SESSION["shopping_cart"])) {
            $avaiable = 0;
            foreach ($_SESSION["shopping_cart"] as $key => $value) {
                if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id']) {
                    $avaiable++;
                    $_SESSION["shopping_cart"][$key]['product_quantity'] = $_SESSION["shopping_cart"][$key]['product_quantity'] + $_POST['product_quantity'];
                }
            }
            if ($avaiable == 0) {
                $item = array(
                    'product_id' => $_POST["product_id"],
                    'product_title' => $_POST["product_title"],
                    'product_price' => $_POST["product_price"],
                    'product_image' => $_POST["product_image"],
                    'product_quantity' => $_POST["product_quantity"]
                );
                $_SESSION["shopping_cart"][] = $item;
            }
        } else {
            $item = array(
                'product_id' => $_POST["product_id"],
                'product_title' => $_POST["product_title"],
                'product_price' => $_POST["product_price"],
                'product_image' => $_POST["product_image"],
                'product_quantity' => $_POST["product_quantity"]
            );
            $_SESSION["shopping_cart"][] = $item;
        }
        header("Location:" . BASE_URL . '/giohang');
    }

    public function updategiohang()
    {
        Session::init();
        if (isset($_POST['delete_cart'])) {
            if (isset($_SESSION["shopping_cart"])) {
                foreach ($_SESSION["shopping_cart"] as $key => $values) {
                    if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['delete_cart']) {
                        unset($_SESSION["shopping_cart"][$key]);
                    }
                }
                header("Location:" . BASE_URL . '/giohang');
            } else {
                header("Location:" . BASE_URL);
            }
        } else {
            foreach ($_POST['qty'] as $key => $qty) {
                foreach ($_SESSION["shopping_cart"] as $session => $values) {
                    if ($values['product_id'] == $key && $qty >= 1) {
                        $_SESSION["shopping_cart"][$session]['product_quantity'] = $qty;
                    } elseif ($values['product_id'] == $key && $qty <= 0) {
                        unset($_SESSION["shopping_cart"][$session]);
                    }
                }
            }
            header("Location:" . BASE_URL . '/giohang');
            // if(isset($_SESSION["shopping_cart"])){
            //     foreach($_SESSION["shopping_cart"] as $key=>$value){
            //         if($_SESSION["shopping_cart"][$key]['product_id']==$_POST['delete_cart']){
            //             unset($_SESSION["shopping_cart"][$key]);
            //         }   
            //     } 
            //     header("Location:".BASE_URL.'/giohang');
            //     }else{
            //     header("Location:".BASE_URL);
            //     }
        }
    }

    public function dathang()
    {
        Session::init();
        if (Session::get('customer') == true) {
            $table_order = 'tbl_order';
            $table_order_details = 'tbl_order_details';
            $ordermodel = $this->load->model('ordermodel');
            $name = $_SESSION['customer_name'];
            $sdt = $_SESSION['customer_phone'];
            $email = $_SESSION['customer_email'];
            $noidung = $_POST['noidung'];
            $diachi = $_SESSION['customer_address'];
            $cus_id = $_SESSION['customer_id'];
            $order_code = rand(0, 9999);

            date_default_timezone_set('asia/ho_chi_minh');
            $date = date("Y-m-d");
            $hour = date("h:i:sa");
            $order_date = $date . $hour;
            $data_order = array(
                'order_status' => 0,
                'order_date' => $date . ' ' . $hour,
                'order_code' => $order_code,
                'customer_id' => $cus_id
            );

            $result_order = $ordermodel->insert_order($table_order, $data_order);

            if (Session::get("shopping_cart") == true) {
                foreach (Session::get("shopping_cart") as $key => $value) {
                    $data_details = array(
                        'order_code' => $order_code,
                        'product_id' => $value['product_id'],
                        'product_quantity' => $value['product_quantity'],
                        'name' => $name,
                        'sdt' => $sdt,
                        'email' => $email,
                        'noidung' => $noidung,
                        'diachi' => $diachi
                    );
                    $result_order_details = $ordermodel->insert_order_details($table_order_details, $data_details);
                }
                unset($_SESSION["shopping_cart"]);
            }
            if ($result_order_details) {
                $message['msg'] = "Đặt hàng thành công";
                header('Location:' . BASE_URL . "/giohang?msg=" . urldecode(serialize($message)));
            }
        } else {
            $message['msg'] = "Vui lòng đăng nhập để mua hàng";
            header('Location:' . BASE_URL . "/khachhang/dangnhap?msg=" . urldecode(serialize($message)));
        }
    }
}

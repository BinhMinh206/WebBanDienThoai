<?php

class product extends DController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->add_category();
    }
    public function add_category()
    {

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/add_category');
        $this->load->view('cpanel/footer');
    }
    public function add_product()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $table = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->add_product($table);

        $this->load->view('cpanel/product/add_product', $data);
        $this->load->view('cpanel/footer');
    }

    public function insert_product()
    {
        $title = $_POST['title_product'];
        $desc = $_POST['desc_product'];
        $price = $_POST['price_product'];
        $hot = $_POST['product_hot'];
        $quantity = $_POST['quantity_product'];

        $image = $_FILES['image_product']['name'];
        $tmp_image = $_FILES['image_product']['tmp_name'];

        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/product/" . $unique_image;

        $category = $_POST['category_product'];

        $table = "tbl_product";
        $data = array(
            'title_product' => $title,
            'price_product' => $price,
            'desc_product' => $desc,
            'product_hot' => $hot,
            'quantity_product' => $quantity,
            'image_product' => $unique_image,
            'id_category_product' => $category
        );
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->insertproduct($table, $data);
        if ($result == 1) {
            move_uploaded_file($tmp_image, $path_uploads);
            $message['msg'] = "Thêm sản phẩm thành công";
            header('Location:' . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Thêm sản phẩm thất bại";
            header('Location:' . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        }
    }
    public function insert_category()
    {
        $title = $_POST['title_category_product'];
        $table = "tbl_category_product";
        $data = array(
            'title_category_product' => $title
        );
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->insertcategory($table, $data);
        if ($result == 1) {
            $message['msg'] = "Thêm loại sản phẩm thành công";
            header('Location:' . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Thêm loại sản phẩm thất bại";
            header('Location:' . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        }
    }

    public function list_category()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $table = "tbl_category_product";
        if (!isset($_POST['timkiem'])) {
            $tukhoa = '';
        } else {
            $tukhoa = $_POST['tukhoa'];
        }
        $cond = "tbl_category_product.title_category_product LIKE '%" . $tukhoa . "%'";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category($table, $cond);

        $this->load->view('cpanel/product/list_category', $data, $cond);
        $this->load->view('cpanel/footer');
    }

    public function list_product()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        if (!isset($_POST['timkiem'])) {
            $tukhoa = '';
        } else {
            $tukhoa = $_POST['tukhoa'];
        }
        $cond = "tbl_product.title_product LIKE '%" . $tukhoa . "%'";
        $table_product = "tbl_product";
        $table_category = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['product'] = $categorymodel->product($table_product, $table_category, $cond);

        $this->load->view('cpanel/product/list_product', $data);
        $this->load->view('cpanel/footer');
    }

    public function delete_category($id)
    {

        $table = "tbl_category_product";
        $cond = "tbl_category_product.id_category_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->deletecategory($table, $cond);
        if ($result == 1) {
            $message['msg'] = "Xoá loại sản phẩm thành công";
            header('Location:' . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Xoá lại sản phẩm thất bại";
            header('Location:' . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        }
    }

    public function delete_product($id)
    {

        $table = "tbl_product";
        $cond = "tbl_product.id_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->deleteproduct($table, $cond);
        if ($result == 1) {
            $message['msg'] = "Xoá sản phẩm thành công";
            header('Location:' . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Xoá sản phẩm thất bại";
            header('Location:' . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        }
    }
    public function edit_category($id)
    {
        $table = "tbl_category_product";
        $cond = "tbl_category_product.id_category_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $data['categorybyid'] = $categorymodel->categorybyid($table, $cond);
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/edit_category', $data);
        $this->load->view('cpanel/footer');
    }

    public function edit_product($id)
    {
        $table = "tbl_product";
        $table_category = "tbl_category_product";
        $cond = "tbl_product.id_product='$id'";
        $categorymodel = $this->load->model('categorymodel');

        $data['productbyid'] = $categorymodel->productbyid($table, $cond);
        $data['category'] = $categorymodel->add_product($table_category);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/edit_product', $data);
        $this->load->view('cpanel/footer');
    }

    public function update_category($id)
    {
        $table = "tbl_category_product";
        $cond = "tbl_category_product.id_category_product='$id'";

        $title = $_POST['title_category_product'];
        $data = array(
            'title_category_product' => $title
        );

        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->updatecategory($table, $data, $cond);
        if ($result == 1) {
            $message['msg'] = "Cập nhật loại sản phẩm thành công";
            header('Location:' . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Cập nhật loại sản phẩm thất bại";
            header('Location:' . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        }
    }

    public function update_product($id)
    {
        $table = "tbl_product";
        $cond = "id_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $hot = $_POST['product_hot'];

        $title = $_POST['title_product'];
        $desc = $_POST['desc_product'];
        $price = $_POST['price_product'];
        $quantity = $_POST['quantity_product'];
        $category = $_POST['category_product'];


        $image = $_FILES['image_product']['name'];
        $tmp_image = $_FILES['image_product']['tmp_name'];
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $uniqueimage = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/product/" . $uniqueimage;

        if ($image) {
            $data['productbyid'] = $categorymodel->productbyid($table, $cond);
            foreach ($data['productbyid']  as $key => $value) {
                $path_unlink = "public/uploads/product/";
                unlink($path_unlink . $value['image_product']);
            }
            $data = array(
                'title_product' => $title,
                'price_product' => $price,
                'desc_product' => $desc,
                'product_hot' => $hot,
                'quantity_product' => $quantity,
                'image_product' => $uniqueimage,
                'id_category_product' => $category
            );
            move_uploaded_file($tmp_image, $path_uploads);
        } else {
            $data = array(
                'title_product' => $title,
                'price_product' => $price,
                'product_hot' => $hot,
                'desc_product' => $desc,
                'quantity_product' => $quantity,
                'id_category_product' => $category
            );
        }





        $result = $categorymodel->updateproduct($table, $data, $cond);


        if ($result == 1) {
            $message['msg'] = "Cập nhật sản phẩm thành công";
            header('Location:' . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Cập nhật sản phẩm thất bại";
            header('Location:' . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        }
    }

    public function thongkeloai()
    {

        $categorymodel = $this->load->model('categorymodel');
        $data['product'] = $categorymodel->thongkeloai();
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/thongkeloai', $data);
        $this->load->view('cpanel/footer');
    }
    public function thongkesp()
    {
        $categorymodel = $this->load->model('categorymodel');
        if (!isset($_POST['month'])) {
            $cond = 7;
        } else {
            $cond = $_POST['month'];
        }
        $data['product'] = $categorymodel->thongkesp($cond);
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/thongkesp', $data);
        $this->load->view('cpanel/footer');
    }
}

<?php

class index extends DController
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->homepage();
    }
    public function homepage()
    {
        Session::init();
        if (!isset($_POST['timkiem'])) {
            $tukhoa = '';
        } else {
            $tukhoa = $_POST['tukhoa'];
        }
        $cond = "tbl_product.title_product LIKE '%" . $tukhoa . "%'";
        $table = 'tbl_category_product';
        $table_product = 'tbl_product';
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table,);
        $data['product_home'] = $categorymodel->list_product_index_search($table_product, $cond);

        $this->load->view('header', $data);
        $this->load->view('slider');
        $this->load->view('home', $data);
        $this->load->view('footer');
    }


    public function notfound()
    {
        Session::init();

        $table = 'tbl_category_product';
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $this->load->view('header', $data);
        $this->load->view('404');
        $this->load->view('footer');
    }
}

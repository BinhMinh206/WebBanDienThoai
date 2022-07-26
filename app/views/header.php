<!DOCTYPE html>
<html lang="en-CA">

<head>
    <title>Bài tập lớn MVC</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cleartype" content="on" />
    <link rel="icon" href="template/Default/img/favicon.ico" type="image/x-icon" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <!--rieng-->
    <meta property='og:title' name="title" content='' />
    <meta property='og:url' content='' />
    <meta property='og:image' content='' />
    <meta property='og:description' itemprop='description' name="description" content='' />
    <!--rieng-->
    <!--tkw-->
    <meta property="og:type" content="article" />
    <meta property="article:section" content="" />
    <meta property="og:site_name" content='' />
    <meta property="article:publisher" content="" />
    <meta property="article:author" content="" />
    <meta property="fb:app_id" content="1639622432921466" />
    <meta vary="User-Agent" />
    <meta name="geo.region" content="VN-SG" />
    <meta name="geo.placename" content="Ho Chi Minh City" />
    <meta name="geo.position" content="10.823099;106.629664" />
    <meta name="ICBM" content="10.823099, 106.629664" />
    <link rel="icon" type="image/png" href="template/Default/img/favicon.png">
    <!--tkw-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/product.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/font-awesome.min.css" type="text/css" />


</head>

<body>
    <header>
        <div class="info_top">
            <div class="bg_in">
                <p class="p_infor">
                    <!-- <span><i class="fa fa-phone" aria-hidden="true"></i> Hotline: 0999-990-999</span> -->
                    <span>
                        <button class=''><a href='<?php echo BASE_URL ?>/login'>Đăng nhập Admin</a></button>
                    </span>

                </p>
            </div>
        </div>
        <div class="btn_menu_search">
            <div class="bg_in">
                <div class="table_row_search">
                    <div class="menu_top_cate">
                        <div class="">
                            <div class="menu" id="menu_cate">
                                <div class="menu_left">
                                    <i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm
                                </div>
                                <div class="cate_pro">
                                    <div id='cssmenu_flyout' class="display_destop_menu">
                                        <ul>
                                            <?php
                                            foreach ($category as $key => $cate) {
                                            ?>
                                                <li class='active has-sub'>

                                                    <a href='<?php echo BASE_URL ?>/sanpham/loaisanpham/<?php echo $cate['id_category_product'] ?>'><span><?php echo $cate['title_category_product'] ?></span></a>

                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search_top">
                        <div id='cssmenu'>
                            <ul>
                                <li class='active'><a href='<?php echo BASE_URL ?>'>Trang chủ</a></li>

                                <li class=''>

                                    <a href='<?php echo BASE_URL ?>/sanpham/tatca'>Tất cả sản phẩm</a>
                                </li>

                                <li class=''><a href="<?php echo BASE_URL ?>/giohang">Giỏ hàng</a></li>
                                <!-- <td>
                                    <?php if (isset($_SESSION['login'])) { ?>
                                        <li class=''><a href='<?php echo BASE_URL ?>/login/login'>Đăng nhập</a></li>

                                    <?php } else { ?>
                                        <li class=''><a href='<?php echo BASE_URL ?>/login/logout'>Đăng xuất</a></li>
                                    <?php } ?>
                                </td> -->
                                <?php
                                if (Session::get('customer') == true) {
                                ?>
                                    <li class=''><a href='<?php echo BASE_URL ?>/khachhang/edit_customer'>Thông tin của bạn</a></li>

                                    <li class=''><a href='<?php echo BASE_URL ?>/khachhang/customer_order'>Đơn hàng của bạn</a></li>

                                    <li class=''><a href='<?php echo BASE_URL ?>/khachhang/dangxuat'>Đăng xuất</a></li>

                                <?php
                                } else {
                                ?>
                                    <li class=''><a href='<?php echo BASE_URL ?>/khachhang/dangnhap'>Đăng nhập</a></li>
                                <?php
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        </div>
    </header>
    <div class="clear"></div>
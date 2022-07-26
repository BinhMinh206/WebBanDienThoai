<section>
    <style>
        .title_login {
            margin: 10px 0;
            padding: 0;
            font-size: 20px;
            text-align: center;
        }
    </style>
    <div class="bg_in">
        <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<span style="color:blue">' . $value . '</span>';
            }
        }
        ?>
        <div class="contact_form">

            <form action="<?php echo BASE_URL ?>/khachhang/insert_dangky" method="POST">
                <div class="contact_left">
                    <h5 class="title_login">Đăng ký khách hàng</h5>
                    <div class="form_contact_in">
                        <div class="box_contact">
                            <form name="FormDatHang" method="post" action="gio-hang/">
                                <div class="content-box_contact">
                                    <div class="row">
                                        <div class="input">
                                            <label>Họ và tên: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtHoTen" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                        <div class="input">
                                            <label>Số điện thoại: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtDienThoai" required onkeydown="return checkIt(event)" class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                        <div class="input">
                                            <label>Địa chỉ: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtDiaChi" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                        <div class="input">
                                            <label>Email: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtEmail" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="row">
                                        <div class="input">
                                            <label>Mật khẩu: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtPassword" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->

                                    <!---row---->
                                    <div class="row btnclass">
                                        <div class="input ipmaxn ">
                                            <input type="submit" class="btn-gui" name="dangky" id="frmSubmit" value="Đăng ký">

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="clear"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
            <form autocomplete="on" action="<?php echo BASE_URL ?>/khachhang/login_customer" method="POST">
                <div class="contact_right">
                    <h5 class="title_login">Đăng nhập khách hàng</h5>
                    <div class="form_contact_in">
                        <div class="box_contact">
                            <form name="FormDatHang" method="post" action="gio-hang/">
                                <div class="content-box_contact">
                                    <div class="row">
                                        <div class="input">
                                            <label>Email: <span style="color:red;">*</span></label>
                                            <input type="text" name="username" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                        <div class="input">
                                            <label>Password: <span style="color:red;">*</span></label>
                                            <input type="password" name="password" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row btnclass">
                                        <div class="input ipmaxn ">
                                            <input type="submit" class="btn-gui" name="dangnhap" id="frmSubmit" value="Đăng nhập">

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="clear"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue">' . $value . '</span>';
    }
}
?>
<h1 align="center">Cập nhật tài khoản</h1>

<div class="col-md-8">
    <?php
    foreach ($customer as $key => $cus) {
    ?>
        <form action="<?php echo BASE_URL ?>/khachhang/update_customer/<?php echo $cus['customer_id'] ?>" method="POST">

            <div class="form-group">
                <label for="pwd">Tên:</label>
                <input type="text" value="<?php echo $cus['customer_name'] ?>" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Địa chỉ:</label>
                <input type="text" value="<?php echo $cus['customer_address'] ?>" name="address" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Số điện thoại:</label>
                <input type="text" value="<?php echo $cus['customer_phone'] ?>" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input type="text" value="<?php echo $cus['customer_password'] ?>" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-default">Thay đổi thông tin</button>
        </form>
    <?php
    }
    ?>
</div>
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
    foreach ($admin as $key => $adm) {
    ?>
        <form action="<?php echo BASE_URL ?>/admin/update_admin/<?php echo $adm['admin_id'] ?>" method="POST">

            <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input type="text" value="<?php echo $adm['password'] ?>" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-default">Đổi mật khẩu</button>
        </form>
    <?php
    }
    ?>
</div>
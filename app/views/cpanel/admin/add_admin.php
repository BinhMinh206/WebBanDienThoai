<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue">' . $value . '</span>';
    }
}
?>
<h1 align="center">Thêm admin</h1>
<div class="col-md-8">
    <form action="<?php echo BASE_URL ?>/admin/insert_admin" method="POST">

        <div class="form-group">
            <label for="pwd">Tên tài khoản:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pwd">Mật khẩu :</label>
            <input type="text" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-default">Thêm admin</button>
    </form>
</div>
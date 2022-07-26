<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue">' . $value . '</span>';
    }
}

?>
<h1 align="center">Danh sách admin</h1>
<form action="<?php echo BASE_URL ?>/admin/list_admin" method="POST">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên tài khoản</th>
                <th>Mật khẩu</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($admin as $key => $adm) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $adm['admin_id'] ?></td>
                    <td><?php echo $adm['username'] ?></td>
                    <td><?php echo $adm['password'] ?></td>
                    <td><a href="<?php echo BASE_URL ?>/admin/delete_admin/<?php echo $adm['admin_id'] ?>">Xoá</a>||<a href="<?php echo BASE_URL ?>/admin/edit_admin/<?php echo $adm['admin_id'] ?>">Đổi mật khẩu</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</form>
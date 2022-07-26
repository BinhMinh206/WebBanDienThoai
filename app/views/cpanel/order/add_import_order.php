<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue">' . $value . '</span>';
    }
}
?>
<h1 align="center">Thêm đơn nhập hàng</h1>
<div class="col-md-8">
    <form action="<?php echo BASE_URL ?>/order/insert_import_order" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pwd">Nhà cung cấp:</label>
            <input type="text" name="supplier" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pwd">Sản phẩm nhập:</label>
            <select class="form-control" name="product" required>
                <?php
                foreach ($product as $key => $pro) {
                ?>
                    <option value="<?php echo $pro['id_product'] ?>"><?php echo $pro['title_product'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pwd">Số lượng sản phẩm:</label>
            <input type="text" name="soluong" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pwd">Giá nhập:</label>
            <input type="text" name="gianhap" class="form-control" required>
        </div>




        <button type="submit" class="btn btn-default">Thêm đơn nhập hàng</button>
    </form>
</div>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue">' . $value . '</span>';
    }
}
?>
<h1 align="center">Liệt kê đơn nhập hàng </h1>
<form action="<?php echo BASE_URL ?>/order/list_import_order" method="POST">
    <!-- <div style="padding: 20px;">
        <input type="text" name="tukhoa" id="" placeholder="Nhập mã đơn hàng cần tìm">
        <input type="submit" name="timkiem" id="" value="Tìm Kiếm">
    </div> -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: top;">Mã đơn hàng</th>
                <th style="vertical-align: top;">Tên admin </th>
                <th style="vertical-align: top;">Nhà cung cấp</th>
                <th style="vertical-align: top;">Ngày nhập</th>
                <th style="vertical-align: top;">Tên sản phẩm nhập</th>
                <th style="vertical-align: top;">Số lượng nhập</th>
                <th style="vertical-align: top;">Giá nhập</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($import as $key => $imp) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $imp['id_import_order'] ?></td>
                    <td><?php echo $imp['admin_name'] ?></td>
                    <td><?php echo $imp['supplier'] ?></td>
                    <td><?php echo $imp['date'] ?></td>
                    <td><?php echo $imp['title_product'] ?></td>
                    <td><?php echo $imp['product_quantity'] ?></td>
                    <td><?php echo number_format($imp['product_price'], 0, ',', '.') . 'đ ' ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</form>
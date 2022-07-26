<h1 align="center">Liệt kê chi tiết đơn hàng</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="vertical-align: top;">ID</th>
            <th style="vertical-align: top;">Tên người đặt</th>
            <th style="vertical-align: top;">Email</th>
            <th style="vertical-align: top;">Số điện thoại</th>
            <th style="vertical-align: top;">Địa chỉ</th>
            <th style="vertical-align: top;">Nội dung</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;

        foreach ($order_info as $key => $ord) {
            $i++;
        ?>
            <tr>
                <th><?php echo $i ?></th>
                <th><?php echo $ord['name'] ?></th>
                <th><?php echo $ord['email'] ?></th>
                <th><?php echo $ord['sdt'] ?></th>
                <th><?php echo $ord['diachi'] ?></th>
                <th><?php echo $ord['noidung'] ?></th>

            </tr>
        <?php
        }
        ?>

    </tbody>
</table>
<table class="table table-striped">
    <thead>
        <tr>
            <th style="vertical-align: top;">ID</th>
            <th style="vertical-align: top;">Tên sản phẩm</th>
            <th style="vertical-align: top;">Hình ảnh</th>
            <th style="vertical-align: top;">Số lượng</th>
            <th style="vertical-align: top;">Đơn giá</th>
            <th style="vertical-align: top;">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        $total = 0;
        foreach ($order_details as $key => $ord) {
            $total += $ord['price_product'] * $ord['product_quantity'];
            $i++;
        ?>
            <tr>
                <th><?php echo $i ?></th>
                <th><?php echo $ord['title_product'] ?></th>
                <th><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $ord['image_product'] ?>" alt="" height="100" width="100"></th>
                <th><?php echo $ord['product_quantity'] ?></th>
                <th><?php echo number_format($ord['price_product'], 0, ',', '.') . ' đ' ?></th>
                <th><?php echo number_format(($ord['price_product'] * $ord['product_quantity']), 0, ',', '.') . ' đ' ?></th>

            </tr>
        <?php
        }
        ?>
        <form action="<?php echo BASE_URL ?>/order/order_confirm/<?php echo $ord['order_code'] ?>" method="POST">
            <tr>
                <td align="right" colspan="6">Tổng tiền: <?php echo number_format($total, 0, ',', '.') . ' đ' ?></td>
            </tr>
        </form>
    </tbody>
</table>
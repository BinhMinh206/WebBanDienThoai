<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue">' . $value . '</span>';
    }
}
?>
<h1 align="center">Đơn hàng của bạn</h1>
<table class="table table-striped" style="align-items: left;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th style="vertical-align: top;">Ngày đặt</th>
            <th style="vertical-align: top;">Mã khách</th>
            <th style="vertical-align: top;">Tình trạng</th>
            <th style="vertical-align: top;">Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($order as $key => $ord) {
            $i++;
        ?>
            <tr>
                <th style="color:#555555;"><?php echo $ord['order_id'] ?></th>
                <th style="color:#555555;"><?php echo $ord['order_code'] ?></th>
                <th style="color:#555555;"><?php echo $ord['order_date'] ?></th>
                <th style="color:#555555;"><?php echo $ord['customer_id'] ?></th>
                <th style="color:#555555;"><?php if ($ord['order_status'] == 0) {
                                                echo 'Đơn hàng mới';
                                            } else {
                                                echo 'Đã xử lí';
                                            } ?></th>
                <th style="color:#FFCC33;"><a href=" <?php echo BASE_URL ?>/khachhang/order_details_customer/<?php echo $ord['order_code'] ?>">Xem đơn hàng</a></th>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
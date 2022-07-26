<?php
if (!empty($_GET['msg'])) {
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo '<span style="color:blue">' . $value . '</span>';
  }
}
?>
<h1 align="center">Liệt kê đơn hàng</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th style="vertical-align: top;">ID</th>
      <th style="vertical-align: top;">Mã đơn hàng</th>
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
        <td><?php echo $ord['order_id'] ?></td>
        <td><?php echo $ord['order_code'] ?></td>
        <td><?php echo $ord['order_date'] ?></td>
        <td><?php echo $ord['customer_id'] ?></td>
        <td><?php if ($ord['order_status'] == 0) {
              echo 'Đơn hàng mới';
            } else {
              echo 'Đã xử lí';
            } ?></td>
        <td><a href="<?php echo BASE_URL ?>/order/order_details/<?php echo $ord['order_code'] ?>">Xem đơn hàng</a></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
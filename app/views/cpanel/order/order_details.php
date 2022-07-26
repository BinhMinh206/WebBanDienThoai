<h1 align="center">Liệt kê chi tiết đơn hàng</h1>

<h2 align="left" style=" font-weight: bold;">Thông tin khách hàng</h2>

<table class="table table-bordered">
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
        <td><?php echo $i ?></td>
        <td><?php echo $ord['name'] ?></td>
        <td><?php echo $ord['email'] ?></td>
        <td><?php echo $ord['sdt'] ?></td>
        <td><?php echo $ord['diachi'] ?></td>
        <td><?php echo $ord['noidung'] ?></td>

      </tr>
    <?php
    }
    ?>

  </tbody>
</table>
<br>
<h2 align="left" style=" font-weight: bold;">Chi tiết đơn hàng </h2>

<table class="table table-bordered">
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
        <td><?php echo $i ?></td>
        <td><?php echo $ord['title_product'] ?></td>
        <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $ord['image_product'] ?>" alt="" height="100" width="100"></td>
        <td><?php echo $ord['product_quantity'] ?></td>
        <td><?php echo number_format($ord['price_product'], 0, ',', '.') . ' đ' ?></td>
        <td><?php echo number_format(($ord['price_product'] * $ord['product_quantity']), 0, ',', '.') . ' đ' ?></td>

      </tr>
    <?php
    }
    ?>
    <form action="<?php echo BASE_URL ?>/order/order_confirm/<?php echo $ord['order_code'] ?>" method="POST">
      <tr>
        <td><input type="submit" name="update_order" value="Xác nhận đơn hàng" class="btn btn-default"></td>
        <td align="right" colspan="6">Tổng tiền: <?php echo number_format($total, 0, ',', '.') . ' đ' ?></td>
      </tr>
    </form>
  </tbody>
</table>
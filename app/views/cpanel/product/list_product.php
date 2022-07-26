<?php
if (!empty($_GET['msg'])) {
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo '<span style="color:blue">' . $value . '</span>';
  }
}
?>
<h1 align="center">Liệt kê sản phẩm </h1>
<form action="<?php echo BASE_URL ?>/product/list_product" method="POST">
  <div style="padding: 20px;">
    <input type="text" name="tukhoa" id="" placeholder="Nhập tên sản phẩm ">
    <input type="submit" name="timkiem" id="" value="Tìm Kiếm">
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="vertical-align: top;">ID</th>
        <th style="vertical-align: top;">Tên </th>
        <th style="vertical-align: top;">Hình ảnh</th>
        <th style="vertical-align: top;">Loại sản phẩm</th>
        <th style="vertical-align: top;">Giá</th>
        <th style="vertical-align: top;">Số lượng</th>
        <th style="vertical-align: top;">S/p hot</th>
        <th style="vertical-align: top;">Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      foreach ($product as $key => $pro) {
        $i++;
      ?>
        <tr>
          <td><?php echo $pro['id_product'] ?></td>
          <td><?php echo $pro['title_product'] ?></td>
          <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>" height="100" width="100"></td>
          <td><?php echo $pro['title_category_product'] ?></td>

          <td><?php echo number_format($pro['price_product'], 0, ',', '.') . 'đ ' ?></td>
          <td><?php echo $pro['quantity_product'] ?></td>
          <td>
            <?php if ($pro['product_hot'] == 0) {
              echo 'Không';
            } else {
              echo 'Có';
            }
            ?></td>

          <td>
            <a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro['id_product'] ?>">Xoá</a>||
            <a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $pro['id_product'] ?>">Cập nhật</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</form>
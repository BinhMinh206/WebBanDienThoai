<?php
if (!empty($_GET['msg'])) {
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo '<span style="color:blue">' . $value . '</span>';
  }
}

?>
<h1 align="center">Liệt kê loại sản phẩm</h1>
<form action="<?php echo BASE_URL ?>/product/list_category" method="POST">
  <div style="padding: 20px;">
    <input type="text" name="tukhoa" id="" placeholder="Nhập tên loại sản phẩm">
    <input type="submit" name="timkiem" id="" value="Tìm Kiếm">
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên loại sản phẩm</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      foreach ($category as $key => $cate) {
        $i++;
      ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $cate['title_category_product'] ?></td>
          <td><a href="<?php echo BASE_URL ?>/product/delete_category/<?php echo $cate['id_category_product'] ?>">Xoá</a>||<a href="<?php echo BASE_URL ?>/product/edit_category/<?php echo $cate['id_category_product'] ?>">Cập nhật</a></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</form>
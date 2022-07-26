<?php
if (!empty($_GET['msg'])) {
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo '<span style="color:blue">' . $value . '</span>';
  }
}
?>
<h1 align="center">Thêm loại sản phẩm</h1>
<div class="col-md-8">
  <form action="<?php echo BASE_URL ?>/product/insert_category" method="POST">

    <div class="form-group">
      <label for="pwd">Tên loại sản phẩm :</label>
      <input type="text" name="title_category_product" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-default">Thêm</button>
  </form>
</div>
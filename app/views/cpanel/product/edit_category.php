<?php
if (!empty($_GET['msg'])) {
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo '<span style="color:blue">' . $value . '</span>';
  }
}
?>
<h1 align="center">Cập nhật loại sản phẩm</h1>

<div class="col-md-8">
  <?php
  foreach ($categorybyid as $key => $cate) {
  ?>
    <form action="<?php echo BASE_URL ?>/product/update_category/<?php echo $cate['id_category_product'] ?>" method="POST">

      <div class="form-group">
        <label for="pwd">Tên loại sản phẩm:</label>
        <input type="text" value="<?php echo $cate['title_category_product'] ?>" name="title_category_product" class="form-control">
      </div>

      <button type="submit" class="btn btn-default">Cập nhật</button>
    </form>
  <?php
  }
  ?>
</div>
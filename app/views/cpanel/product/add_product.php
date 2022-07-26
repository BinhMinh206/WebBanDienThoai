<?php
if (!empty($_GET['msg'])) {
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo '<span style="color:blue">' . $value . '</span>';
  }
}
?>
<h1 align="center">Thêm sản phẩm</h1>
<div class="col-md-8">
  <form action="<?php echo BASE_URL ?>/product/insert_product" method="POST" enctype="multipart/form-data">

    <div class="form-group">
      <label for="pwd">Tên sản phẩm:</label>
      <input type="text" name="title_product" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="pwd">Hình ảnh sản phẩm:</label>
      <input type="file" name="image_product" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="pwd">Giá sản phẩm:</label>
      <input type="text" name="price_product" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="pwd">Mô tả sản phẩm:</label>
      <textarea name="desc_product" rows="5" style="resize:none" class="form-control" required></textarea>
    </div>
    <div class="form-group">
      <label for="pwd">Số Lượng sản phẩm:</label>
      <input type="text" name="quantity_product" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="pwd">Loại sản phẩm:</label>
      <select class="form-control" name="category_product" required>
        <?php
        foreach ($category as $key => $cate) {
        ?>
          <option value="<?php echo $cate['id_category_product'] ?>"><?php echo $cate['title_category_product'] ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="pwd">Sản phẩm hot</label>
      <select class="form-control" name="product_hot" required>
        <option value="1">Có</option>
        <option value="0">Không</option>
      </select>
    </div>



    <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
  </form>
</div>
<?php
if (!empty($_GET['msg'])) {
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key =>
    $value) {
    echo '<span style="color: blue">' . $value . '</span>';
  }
} ?>
<h1 align="center"> Cập nhật sản phẩm</h1>
<div class="col-md-8">
  <?php
  foreach ($productbyid as $key => $pro) {
  ?>
    <form action="<?php echo BASE_URL ?>/product/update_product/<?php echo $pro['id_product'] ?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="pwd">Tên sản phẩm:</label>
        <input type="text" value="<?php echo $pro['title_product'] ?>" name="title_product" class="form-control" />
      </div>
      <div class="form-group">
        <label for="pwd">Hình ảnh sản phẩm:</label>
        <input type="file" name="image_product" class="form-control" />
        <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>" height="100" width="100">
      </div>

      <div class="form-group">
        <label for="pwd">Giá:</label>
        <input type="text" value="<?php echo $pro['price_product'] ?>" name="price_product" class="form-control" />
      </div>
      <div class="form-group">
        <label for="pwd">Mô tả sản phẩm:</label>
        <textarea name="desc_product" rows="5" style="resize: none" class="form-control"> <?php echo $pro['desc_product'] ?>
        </textarea>
      </div>
      <div class="form-group">
        <label for="pwd">Số lượng sản phẩm:</label>
        <input type="text" value="<?php echo $pro['quantity_product'] ?>" name="quantity_product" class="form-control" />
      </div>
      <div class="form-group">
        <label for="pwd">Loại sản phẩm:</label>
        <select class="form-control" name="category_product">
          <?php
          foreach ($category as $key => $cate) { ?>
            <option <?php if ($cate['id_category_product'] == $pro['id_category_product']) {
                      echo 'selected';
                    } ?> value="<?php echo $cate['id_category_product'] ?>">
              <?php echo $cate['title_category_product'] ?>
            </option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="pwd">Sản phẩm hot</label>
        <select class="form-control" name="product_hot">
          <?php
          if ($pro['product_hot'] == 0) {
          ?>
            <option value="1">Có</option>
            <option selected value="0">Không</option>
          <?php
          } else {
          ?>
            <option selected value="1">Có</option>
            <option value="0">Không</option>
          <?php
          }
          ?>


        </select>
      </div>

      <button type="submit" class="btn btn-default">Cập nhật sản phẩm</button>
    </form>
  <?php
  }
  ?>
</div>
</h3>
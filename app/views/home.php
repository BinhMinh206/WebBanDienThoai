<section>
   <form name="f" action="<?php echo BASE_URL ?>/index/" method="POST">
      <style>
         .timkiem {
            width: 300px;
            margin-left: 175px;
         }

         .nuttimkiem {
            width: 200px;
            background: #ffbf00;
            color: white;
            border: #ffbf00;
         }
      </style>
      <input type="text" class="timkiem" name="tukhoa" id="" placeholder="Nhập tên sản phẩm " width="200px">
      <input type="submit" class="nuttimkiem" name="timkiem" id="" value="Tìm Kiếm">
      <div class="bg_in">
         <div class="module_pro_all">
            <div class="box-title">
               <div class="title-bar">
                  <h1>Sản phẩm HOT</h1>
               </div>
            </div>
            <div class="pro_all_gird">
               <style type="text/css">
                  .grids.grids-list-product {
                     height: 375px;
                  }
               </style>
               <div class="girds_all list_all_other_page ">
                  <?php
                  foreach ($product_home as $key => $product) {
                     if ($product['product_hot'] == 1 && $product['quantity_product'] > 0) {
                  ?>
                        <form action="<?php echo BASE_URL ?>/giohang/themgiohang/" method="POST">
                           <input type="hidden" value="<?php echo $product['id_product'] ?>" name="product_id">
                           <input type="hidden" value="<?php echo $product['title_product'] ?>" name="product_title">
                           <input type="hidden" value="<?php echo $product['image_product'] ?>" name="product_image">
                           <input type="hidden" value="1" name="product_quantity">
                           <input type="hidden" value="<?php echo $product['price_product'] ?>" name="product_price">
                           <div class="grids grids-list-product">
                              <div class="grids_in">
                                 <div class="content">
                                    <div class="img-right-pro">

                                       <a href="sanpham.php">
                                          <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $product['image_product'] ?>" />
                                       </a>

                                       <div class="content-overlay"></div>
                                       <div class="content-details fadeIn-top">
                                          <ul class="details-product-overlay">
                                             <h3><?php echo $product['desc_product'] ?></h3>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="name-pro-right">
                                       <a href="<?php echo BASE_URL ?>/sanpham/chitietsanpham/<?php echo $product['id_product'] ?>">
                                          <h3><?php echo $product['title_product'] ?></h3>
                                       </a>
                                    </div>
                                    <div class="">
                                       <input type="submit" name="addcart" class="btn btn-success" value="Đặt hàng" style="box-shadow:none">
                                    </div>
                                    <div class="price_old_new">
                                       <div class="price">
                                          <span class="news_price"><?php echo number_format($product['price_product'], 0, ',', '.') . 'đ' ?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </form>
               </div>
         <?php
                     }
                  }
         ?>
         <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <?php
      foreach ($category as $key => $cate) {

      ?>
         <div class="module_pro_all">
            <div class="box-title">
               <div class="title-bar">
                  <h1><?php echo $cate['title_category_product'] ?></h1>
               </div>
            </div>
            <div class="pro_all_gird">
               <div class="girds_all list_all_other_page ">
                  <?php
                  foreach ($product_home as $key => $pro_cate) {
                     if ($cate['id_category_product'] == $pro_cate['id_category_product'] && $pro_cate['quantity_product'] > 0) {
                  ?>
                        <form action="<?php echo BASE_URL ?>/giohang/themgiohang/" method="POST">
                           <input type="hidden" value="<?php echo $pro_cate['id_product'] ?>" name="product_id">
                           <input type="hidden" value="<?php echo $pro_cate['title_product'] ?>" name="product_title">
                           <input type="hidden" value="<?php echo $pro_cate['image_product'] ?>" name="product_image">
                           <input type="hidden" value="1" name="product_quantity">
                           <input type="hidden" value="<?php echo $pro_cate['price_product'] ?>" name="product_price">
                           <div class="grids">

                              <div class="grids_in">
                                 <div class="content">
                                    <div class="img-right-pro">

                                       <a href="sanpham.php">
                                          <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro_cate['image_product'] ?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                                       </a>

                                       <div class="content-overlay"></div>
                                       <div class="content-details fadeIn-top">
                                          <h3><?php echo $pro_cate['desc_product'] ?></h3>
                                       </div>
                                    </div>
                                    <div class="name-pro-right">
                                       <a href="<?php echo BASE_URL ?>/sanpham/chitietsanpham/<?php echo $pro_cate['id_product'] ?>">
                                          <h3><?php echo $pro_cate['title_product'] ?></h3>
                                       </a>
                                    </div>
                                    <div class="">
                                       <input type="submit" name="addcart" class="btn btn-success" value="Đặt hàng" style="box-shadow:none">
                                    </div>
                                    <div class="price_old_new">
                                       <div class="price">
                                          <span class="news_price"><?php echo number_format($pro_cate['price_product'], 0, ',', '.') . 'đ' ?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                  <?php
                     }
                  }
                  ?>

                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
      <?php
      }
      ?>
   </form>
</section>
<!--end:body-->
<div class="clear"></div>
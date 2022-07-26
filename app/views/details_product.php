<?php
$name_product = 'Danh mục chưa có sản phẩm';
foreach ($details_product as $key => $value) {
   $name_product = $value['title_product'];
   $name_category_product = $value['title_category_product'];
   $id_cate = $value['id_category_product'];
   //$image_product=$value['image_product'];
}
?>
<section>

   <div class="bg_in">
      <?php
      foreach ($details_product as $key => $details) {
      ?>
         <div class="wrapper_all_main">
            <div class="wrapper_all_main_right no-padding-left" style="width:100%;">

               <div class="breadcrumbs">
                  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>">
                           <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                     </li>
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>/sanpham/loaisanpham/<?php echo $id_cate ?>">
                           <span itemprop="name"><?php echo $name_category_product ?></span></a>
                        <meta itemprop="position" content="2" />
                     </li>
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                           <strong itemprop="name">
                              <?php echo $name_product ?>
                           </strong>
                        </span>
                        <meta itemprop="position" content="3" />
                     </li>
                  </ol>
               </div>
               <div class="content_page">
                  <div class="content-right-items margin0">
                     <div class="title-pro-des-ct">
                        <h1><?php echo $name_product ?></h1>
                     </div>
                     <div class="slider-galery ">
                        <div id="sync1" class="owl-carousel owl-theme">
                           <div class="item">
                              <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $details['image_product'] ?>" width="100%">
                           </div>
                           <div class="item">
                              <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $details['image_product'] ?>" width="100%">
                           </div>
                           <div class="item">
                              <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $details['image_product'] ?>" width="100%">
                           </div>
                        </div>

                        <div id="sync2" class="owl-carousel owl-theme">
                           <div class="item">
                              <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $details['image_product'] ?>" width="100%">
                           </div>
                           <div class="item">
                              <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $details['image_product'] ?>" width="100%">
                           </div>

                           <div class="item">
                              <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $details['image_product'] ?>" width="100%">
                           </div>

                        </div>

                     </div>
                     <div class="content-des-pro">
                        <div class="content-des-pro_in">
                           <div class="pro-des-sum">
                              <div class="price">
                                 <div class="status_pro">
                                    <span><b>Trạng thái:</b> Còn hàng</span>
                                 </div>
                              </div>
                              <div class="color_price">
                                 <span class="title_price bg_green">Giá bán</span><?php echo number_format($details['price_product'], 0, ',', '.') ?><span>vnđ</span>(GIÁ CHƯA VAT)
                                 <div class="clear"></div>
                              </div>
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="content-pro-des">
                           <div class="content_des">
                              <?php echo $details['desc_product'] ?>
                           </div>
                        </div>
                        <div class="ct">
                           <div class="number_price">
                              <div class="custom pull-left">
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="wp_a">
                              <div class="clear"></div>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>

                     <div class="clear"></div>
                  </div>
               </div>
            </div>


            <!--end:left-->
            <div class="clear"></div>
         </div>
         <div class="clear"></div>

   </div>
<?php
      }
?>

<script>
   jQuery(document).ready(function() {



      var div_fixed = jQuery('.product_detail_info').offset().top;

      jQuery(window).scroll(function() {

         if (jQuery(window).scrollTop() > div_fixed) {

            jQuery('.tabs-animation').addClass('fix_top');

         } else {

            jQuery('.tabs-animation').removeClass('fix_top');

         }

      });

      jQuery(window).load(function() {

         if (jQuery(window).scrollTop() > div_fixed) {

            jQuery('.tabs-animation').addClass('fix_top');

         }

      });

   });
</script>
</section>
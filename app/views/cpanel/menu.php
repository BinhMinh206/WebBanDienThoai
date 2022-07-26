<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo BASE_URL ?>/login/dashboard">Thông tin nhóm</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo BASE_URL ?>">Trang chủ</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Loại sản phẩm
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>/product/">Thêm</a></li>
          <li><a href="<?php echo BASE_URL ?>/product/list_category">Liệt kê</a></li>
          <li><a href="<?php echo BASE_URL ?>/product/thongkeloai">Thống kê</a></li>

        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sản phẩm
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>/product/add_product">Thêm</a></li>
          <li><a href="<?php echo BASE_URL ?>/product/list_product">Liệt kê</a></li>
          <li><a href="<?php echo BASE_URL ?>/product/thongkesp">Thống kê</a></li>

        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Đơn hàng
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>/order/order">Tất cả đơn hàng</a></li>
          <li><a href="<?php echo BASE_URL ?>/order/thongke">Thống kê doanh thu</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Nhập hàng
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>/order/add_import">Thêm</a></li>

          <li><a href="<?php echo BASE_URL ?>/order/list_import_order">Tất cả đơn nhập hàng</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>/admin/">Thêm</a></li>

          <li><a href="<?php echo BASE_URL ?>/admin/list_admin">Danh sách admin</a></li>
        </ul>
      </li>
      <li class=""><a href="<?php echo BASE_URL ?>/login/logout">Đăng xuất</a></li>
    </ul>
  </div>
</nav>
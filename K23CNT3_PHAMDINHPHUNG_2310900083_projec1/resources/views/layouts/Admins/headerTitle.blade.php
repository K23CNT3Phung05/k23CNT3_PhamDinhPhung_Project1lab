<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <!-- Bootstrap 5.3.3 (Nếu bạn đã có liên kết, không cần gán lại) -->
</head>
<body>

<header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->

        <div class="logo">
            <a href="/vtd-admins" class="text-white text-decoration-none">
                <!-- Đường dẫn đến logo trong thư mục public/storage/img/san_pham/ -->
                <img src="{{ asset('storage/img/san_pham/logoD.jpg') }}" alt="Logo" class="img-fluid" style="max-height: 40px;" />
            </a>
        </div>


        <!-- Menu Navigation -->
        <nav class="navbar navbar-expand-md navbar-dark">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/dashboard" style="font-size: 14px;">Bảng điều khiển</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pdpadmins/pdpdanhsachquantri/pdp_SanPham" style="font-size: 14px;">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/orders" style="font-size: 14px;">Đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vtd-admins/pdpdanhsachquantri/pdpnguoidung" style="font-size: 14px;">Người dùng</a>
                </li>
            </ul>
        </nav>

        <!-- Thông tin tài khoản & Đăng xuất -->
        <div class="d-flex align-items-center">
            <span class="me-3" style="font-size: 14px;">Xin chào, Admin</span> <!-- Tên tài khoản -->
            <a href="{{route('admins.vtdLogin')}}" class="text-white text-decoration-none" style="font-size: 14px;">Đăng xuất</a> <!-- Link đăng xuất -->
        </div>
    </div>
</header>

<!-- Bootstrap JS (nếu chưa có trong project của bạn) -->
<!-- <script src="path/to/bootstrap.bundle.min.js"></script> -->

</body>
</html>




<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Bán Điện Thoại</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gradient-to-r from-red-500 to-orange-500 text-white">
  <div class="container mx-auto">
    <!-- Top Navigation -->
    <div class="flex justify-between items-center py-2 text-sm">
      <div>
        <a class="mr-4 hover:underline" href="#">Kênh Người Bán</a>
        <a class="mr-4 hover:underline" href="#">Trở thành Người bán Shopee</a>
        <a class="mr-4 hover:underline" href="#">Tải ứng dụng</a>
        <a class="mr-4 hover:underline" href="#">Kết nối</a>
        <a class="mr-2" href="https://www.facebook.com/CellphoneSVietnam/about_privacy_and_legal_info" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-facebook"></i>
          </a>
          <a href="https://www.instagram.com/cellphonesvn/" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
      </div>
      <div class="flex items-center space-x-4">
        <a class="hover:underline" href="#"><i class="fas fa-bell"></i> Thông Báo</a>
        <a class="hover:underline" href="vtd-user/support">
            <i class="fas fa-question-circle"></i> Hỗ Trợ
        </a>
        <a class="hover:underline" href="#"><i class="fas fa-globe"></i> Tiếng Việt</a>
        <a class="flex items-center space-x-1" href="#">
            <i class="fas fa-user"></i>
            <span>{{ Session::has('username1') ? 'Hello, ' . Session::get('username1') : '' }}</span>
        </a>
        @if(Session::has('username1'))
            <a class="hover:underline" href="{{ route('vtduser.home') }}">
                Đăng Xuất
            </a>
        @else
            <a class="hover:underline" href="{{ route('vtduser.login') }}">
                Đăng Nhập
            </a>
        @endif
    </div>
    
   
    </div>
    <!-- Main Navigation -->
    <div class="flex items-center py-4">
      <div class="flex items-center">
        <img alt="logo" class="mr-2" height="40" src="/storage/img/san_pham/logoD.jpg" width="40"/>
        <span class="text-2xl font-bold">buyphone</span>
      </div>
      <div class="flex-grow mx-4">
        <form action="{{route('vtduser.search')}}" method="GET" class="flex">
          <input class="w-full py-2 px-4 rounded-l-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Tìm Kiếm... !" type="text" name="search"/>
          <button type="submit" class="bg-white text-red-500 py-2 px-4 rounded-r-md hover:bg-red-500 hover:text-white transition duration-200">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
      <div>
        <i class="fas fa-shopping-cart text-2xl"></i>
      </div>
    </div>
  </div>
</body>
</html>

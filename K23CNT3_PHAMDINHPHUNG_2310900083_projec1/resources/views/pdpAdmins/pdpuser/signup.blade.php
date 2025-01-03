
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Đăng Ký</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light background for the entire page */
        }
        .form-container {
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px; /* Rounded corners for the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for the form */
            padding: 30px; /* Padding inside the form */
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group .is-invalid {
            border-color: #e74a3b;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="form-container">
        <h2 class="text-center mb-4">Đăng Ký</h2>

        <!-- Display errors from backend if validation fails -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('pdpuser.pdpsignupSubmit') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="pdpHoTenKhachHang">Họ và Tên</label>
                <input type="text" class="form-control @error('pdpHoTenKhachHang') is-invalid @enderror" 
                       id="pdpHoTenKhachHang" name="pdpHoTenKhachHang" value="{{ old('pdpHoTenKhachHang') }}" required>
                @error('pdpHoTenKhachHang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="pdpEmail">Email</label>
                <input type="email" class="form-control @error('pdpEmail') is-invalid @enderror" 
                       id="pdpEmail" name="pdpEmail" value="{{ old('pdpEmail') }}" required>
                @error('pdpEmail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="pdpMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control @error('pdpMatKhau') is-invalid @enderror" 
                       id="pdpMatKhau" name="pdpMatKhau" required>
                @error('pdpMatKhau')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="pdpDienThoai">Số Điện Thoại</label>
                <input type="text" class="form-control @error('pdpDienThoai') is-invalid @enderror" 
                       id="pdpDienThoai" name="pdpDienThoai" value="{{ old('pdpDienThoai') }}" required>
                @error('pdpDienThoai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="pdpDiaChi">Địa Chỉ</label>
                <input type="text" class="form-control @error('pdpDiaChi') is-invalid @enderror" 
                       id="pdpDiaChi" name="pdpDiaChi" value="{{ old('pdpDiaChi') }}" required>
                @error('pdpDiaChi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100">Đăng Ký</button>
        </form>

        <div class="mt-3 text-center">
            <p>Đã có tài khoản? <a href="{{ route('pdpuser.login') }}">Đăng nhập</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

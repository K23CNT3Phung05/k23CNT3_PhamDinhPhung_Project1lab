
@extends('_layouts.admins._master')
@section('title', 'Thêm Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('pdpadmin.pdpquantri.pdpCreateSubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pdpTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="pdpTaiKhoan" name="pdpTaiKhoan" required>
                @error('pdpTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="pdpMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="pdpMatKhau" name="pdpMatKhau" required>
                @error('pdpMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="pdpTrangThai">Trạng Thái</label>
                <select name="pdpTrangThai" id="pdpTrangThai" class="form-control" required>
                    <option value="0">Cho Phép Đăng Nhập</option>
                    <option value="1">Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Thêm Quản Trị Viên</button>
        </form>
    </div>
@endsection

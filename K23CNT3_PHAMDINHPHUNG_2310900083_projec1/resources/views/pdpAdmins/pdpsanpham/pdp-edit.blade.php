
@extends('_layouts.admins._master')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa sản phẩm -->
                    <form action="{{ route('pdpadmin.pdpsanpham.pdpEditSubmit', $pdpsanpham->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Mã sản phẩm -->
                        <div class="mb-3">
                            <label for="pdpMaSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="pdpMaSanPham" class="form-control" value="{{ old('pdpMaSanPham', $pdpsanpham->pdpMaSanPham) }}">
                            @error('pdpMaSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="pdpTenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="pdpTenSanPham" class="form-control" value="{{ old('pdpTenSanPham', $pdpsanpham->pdpTenSanPham) }}">
                            @error('pdpTenSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="pdpHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="pdpHinhAnh" class="form-control">
                            @if($pdpsanpham->pdpHinhAnh)
                                <img src="{{ asset('storage/' . $pdpsanpham->pdpHinhAnh) }}" alt="Sản phẩm {{ $pdpsanpham->pdpMaSanPham }}" width="200" class="mt-2">
                            @endif
                            @error('pdpHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="pdpSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="pdpSoLuong" class="form-control" value="{{ old('pdpSoLuong', $pdpsanpham->pdpSoLuong) }}">
                            @error('pdpSoLuong')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Đơn giá -->
                        <div class="mb-3">
                            <label for="pdpDonGia" class="form-label">Đơn giá</label>
                            <input type="number" name="pdpDonGia" class="form-control" value="{{ old('pdpDonGia', $pdpsanpham->pdpDonGia) }}">
                            @error('pdpDonGia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mã Loại -->
                        <div class="mb-3">
                            <label for="pdpMaLoai" class="form-label">Loại Danh Muc</label>
                            <select name="pdpMaLoai" id="pdpMaLoai" class="form-control">
                                @foreach ($pdploaisanpham as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('pdpMaLoai', $pdpsanpham->pdpMaLoai) == $item->id ? 'selected' : '' }}>
                                        {{ $item->pdpTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pdpMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="pdpTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="pdpTrangThai1" name="pdpTrangThai" value="1" {{ old('pdpTrangThai', $pdpsanpham->pdpTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="pdpTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="pdpTrangThai0" name="pdpTrangThai" value="0" {{ old('pdpTrangThai', $pdpsanpham->pdpTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="pdpTrangThai0">Hiển Thị</label>
                            </div>
                            @error('pdpTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nút lưu -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Nút quay lại danh sách sản phẩm -->
                    <a href="{{ route('pdpadims.pdpsanpham') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

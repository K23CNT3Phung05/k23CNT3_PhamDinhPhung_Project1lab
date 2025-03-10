
@extends('_layouts.admins._master')

@section('title', 'Chi Tiết Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chi Tiết Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Mã sản phẩm -->
                    <p class="card-text">
                        <b>Mã sản phẩm:</b> {{ $pdpsanpham->pdpMaSanPham }}
                    </p>

                    <!-- Tên sản phẩm -->
                    <p class="card-text">
                        <b>Tên sản phẩm:</b> {{ $pdpsanpham->pdpTenSanPham }}
                    </p>

                    <!-- Hình ảnh sản phẩm -->
                    <p class="card-text">
                        <b>Hình Ảnh:</b><br>
                        <img src="{{ asset('storage/' . $pdpsanpham->pdpHinhAnh) }}" alt="Sản phẩm {{ $pdpsanpham->pdpMaSanPham }}" width="200" class="img-fluid">
                    </p>

                    <!-- Số lượng -->
                    <p class="card-text">
                        <b>Số Lượng:</b> {{ $pdpsanpham->pdpSoLuong }}
                    </p>

                    <!-- Đơn giá -->
                    <p class="card-text">
                        <b>Đơn Giá:</b> {{ number_format($pdpsanpham->pdpDonGia, 0, ',', '.') }} VND
                    </p>

                    <!-- Mã Loại -->
                    <p class="card-text">
                        <b>Mã Loại:</b> {{ $pdpsanpham->pdpMaLoai }}
                    </p>

                    <!-- Trạng thái -->
                    <p class="card-text">
                        <b>Trạng Thái:</b>
                        @if($pdpsanpham->pdpTrangThai == 0)
                            <span class="badge bg-success">Hiển Thị</span>
                        @else
                            <span class="badge bg-danger">Khóa</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer">
                    <!-- Nút Quay lại -->
                    <a href="{{ route('pdpadims.pdpsanpham') }}" class="btn btn-primary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


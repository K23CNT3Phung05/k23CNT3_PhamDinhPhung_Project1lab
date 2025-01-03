
@extends('_layouts.admins._master')

@section('title', 'Create Tin Tức')

@section('content-body')
<div class="container border">
    <div class="row">
        <div class="col">
            <form action="{{ route('pdpadmin.pdptintuc.pdpCreateSubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h1>Thêm Mới Tin Tức</h1>
                    </div>
                    <div class="card-body">
                        <!-- Mã Tin Tức -->
                        <div class="mb-3">
                            <label for="pdpMaTT" class="form-label">Mã Tin Tức</label>
                            <input type="text" class="form-control" id="pdpMaTT" name="pdpMaTT" value="{{ old('pdpMaTT') }}">
                            @error('pdpMaTT')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="pdpTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" class="form-control" id="pdpTieuDe" name="pdpTieuDe" value="{{ old('pdpTieuDe') }}">
                            @error('pdpTieuDe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="pdpMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" class="form-control" id="pdpMoTa" name="pdpMoTa" value="{{ old('pdpMoTa') }}">
                            @error('pdpMoTa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="pdpNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea class="form-control" id="pdpNoiDung" name="pdpNoiDung" rows="5">{{ old('pdpNoiDung') }}</textarea>
                            @error('pdpNoiDung')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="pdpHinhAnh" class="form-label">Hình Ảnh</label>
                            <input type="file" class="form-control" id="pdpHinhAnh" name="pdpHinhAnh" accept="image/*">
                            @error('pdpHinhAnh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày đăng tin -->
                        <div class="mb-3">
                            <label for="pdpNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" class="form-control" id="pdpNgayDangTin" name="pdpNgayDangTin" value="{{ old('pdpNgayDangTin') }}">
                            @error('pdpNgayDangTin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="pdpNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" class="form-control" id="pdpNgayCapNhap" name="pdpNgayCapNhap" value="{{ old('pdpNgayCapNhap') }}">
                            @error('pdpNgayCapNhap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="pdpTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="pdpTrangThai1" name="pdpTrangThai" value="0" checked/>
                                <label for="pdpTrangThai1"> Hiển Thị</label>
                                &nbsp;
                                <input type="radio" id="pdpTrangThai0" name="pdpTrangThai" value="1"/>
                                <label for="pdpTrangThai0">Khóa</label>
                            </div>
                            @error('pdpTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Create</button>
                        <a href="{{ route('pdpadmins.pdptintuc') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

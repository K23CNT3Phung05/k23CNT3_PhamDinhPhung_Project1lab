
@extends('_layouts.admins._master')

@section('title', 'Chỉnh Sửa Tin Tức')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Tin Tức</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa tin tức -->
                    <form action="{{ route('pdpadmin.pdptintuc.pdpEditSubmit', $pdptinTuc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="pdpTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" name="pdpTieuDe" class="form-control" value="{{ old('pdpTieuDe', $pdptinTuc->pdpTieuDe) }}">
                            @error('pdpTieuDe')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="pdpMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" name="pdpMoTa" class="form-control" value="{{ old('pdpMoTa', $pdptinTuc->pdpMoTa) }}">
                            @error('pdpMoTa')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="pdpNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea name="pdpNoiDung" class="form-control" rows="5">{{ old('pdpNoiDung', $pdptinTuc->pdpNoiDung) }}</textarea>
                            @error('pdpNoiDung')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="pdpHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="pdpHinhAnh" class="form-control">
                            @if($pdptinTuc->pdpHinhAnh)
                                <img src="{{ asset('storage/' . $pdptinTuc->pdpHinhAnh) }}" alt="Tin tức {{ $pdptinTuc->pdpTieuDe }}" width="200" class="mt-2">
                            @endif
                            @error('pdpHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày đăng -->
                        <div class="mb-3">
                            <label for="pdpNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" name="pdpNgayDangTin" class="form-control" value="{{ old('pdpNgayDangTin', $pdptinTuc->pdpNgayDangTin) }}">
                            @error('pdpNgayDangTin')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="pdpNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" name="pdpNgayCapNhap" class="form-control" value="{{ old('pdpNgayCapNhap', $pdptinTuc->pdpNgayCapNhap) }}">
                            @error('pdpNgayCapNhap')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="pdpTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="pdpTrangThai1" name="pdpTrangThai" value="1" {{ old('pdpTrangThai', $pdptinTuc->pdpTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="pdpTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="pdpTrangThai0" name="pdpTrangThai" value="0" {{ old('pdpTrangThai', $pdptinTuc->pdpTrangThai) == 0 ? 'checked' : '' }} />
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
                    <!-- Nút quay lại danh sách tin tức -->
                    <a href="{{ route('pdpadmins.pdptintuc') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

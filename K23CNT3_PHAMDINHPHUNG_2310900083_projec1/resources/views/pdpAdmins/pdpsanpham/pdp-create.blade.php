
@extends('_layouts.admins._master')
@section('title','Create  Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('pdpadmin.pdpsanpham.pdpCreateSubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="pdpMaSanPham" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="pdpMaSanPham" name="pdpMaSanPham" value="{{ old('pdpMaSanPham') }}" >
                                @error('pdpMaSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pdpTenSanPham" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="pdpTenSanPham" name="pdpTenSanPham" value="{{ old('pdpTenSanPham') }}" >
                                @error('pdpTenSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="pdpHinhAnh" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" id="pdpHinhAnh" name="pdpHinhAnh" accept="image/*">
                                @error('pdpHinhAnh')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="pdpSoLuong" class="form-label">Số Lượng</label>
                                <input type="number" class="form-control" id="pdpSoLuong" name="pdpSoLuong" value="{{ old('pdpSoLuong') }}" >
                                @error('pdpSoLuong')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pdpDonGia" class="form-label">Đơn Giá</label>
                                <input type="number" class="form-control" id="pdpDonGia" name="pdpDonGia" value="{{ old('pdpDonGia') }}" >
                                @error('pdpDonGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pdpMaLoai" class="form-label">Loại Danh Muc</label>
                                <select name="pdpMaLoai" id="pdpMaLoai" class="form-control">
                                    @foreach ($pdploaisanpham as $item)
                                        <option value="{{ $item->id }}">{{ $item->pdpTenLoai }}</option>
                                    @endforeach
                                </select>
                                @error('pdpMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

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
                            <a href="{{route('pdpadims.pdpsanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

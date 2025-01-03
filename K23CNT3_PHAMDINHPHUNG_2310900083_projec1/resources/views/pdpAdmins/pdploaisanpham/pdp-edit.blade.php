
@extends('_layouts.admins._master')
@section('title','Sửa Loại Sản Phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the pdpMaLoai as a parameter -->
                <form action="{{ route('pdpadmin.pdploaisanpham.pdpEditSubmit') }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $pdploaisanpham->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="pdpMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="pdpMaLoai" name="pdpMaLoai" value="{{ $pdploaisanpham->pdpMaLoai }}" >
                                @error('pdpMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="pdpTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="pdpTenLoai" name="pdpTenLoai" value="{{ old('pdpTenLoai', $pdploaisanpham->pdpTenLoai) }}" >
                                @error('pdpTenLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="pdpTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="pdpTrangThai1" name="pdpTrangThai" value="1" {{ old('pdpTrangThai', $pdploaisanpham->pdpTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="pdpTrangThai1">Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="pdpTrangThai0" name="pdpTrangThai" value="0" {{ old('pdpTrangThai', $pdploaisanpham->pdpTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="pdpTrangThai0">Hiển Thị</label>
                                </div>
                                @error('pdpTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('pdpadmins.pdploaisanpham') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

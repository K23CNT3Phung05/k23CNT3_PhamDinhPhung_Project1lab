
@extends('_layouts.admins._master')
@section('title', 'Danh Sách Sản Phẩm')

@section('content-body')

<div class="container border mt-4">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-xl font-semibold">Danh Sách Sản Phẩm</h1>
            <!-- Nút Thêm Mới -->
            <a href="{{ route('pdpadmin.pdpsanpham.pdpcreate') }}" class="btn btn-success btn-lg">
                <i class="fa-solid fa-plus-circle"></i> Thêm Mới
            </a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình Ảnh</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Mã Loại</th>
                    <th>Trạng Thái</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pdpsanphams as $item)
                <tr>
                    <td >{{ ($pdpsanphams->currentPage() - 1) * $pdpsanphams->perPage() + $loop->index + 1 }}</td>
                    <td>{{ $item->pdpMaSanPham }}</td>
                    <td>{{ $item->pdpTenSanPham }}</td>
                    <td class="text-center" style="height: 100px;">
                        <img src="{{ asset('storage/' . $item->pdpHinhAnh) }}" alt="Sản phẩm {{ $item->pdpMaSanPham }}" class="img-fluid" style="max-height: 80px;">
                    </td>
                    <td>{{ $item->pdpSoLuong }}</td>
                    <td>{{ number_format($item->pdpDonGia, 0, ',', '.') }} VND</td>
                    <td>{{ $item->pdpMaLoai }}</td>
                    <td>
                        @if($item->pdpTrangThai == 0)
                            <span class="badge bg-success">Hiển Thị</span>
                        @else
                            <span class="badge bg-danger">Khóa</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <!-- Xem chi tiết -->
                            <a href="{{ route('pdpadmin.pdpsanpham.pdpDetail', $item->id) }}" class="btn btn-success btn-sm" title="Xem">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <!-- Chỉnh sửa -->
                            <a href="{{ route('pdpadmin.pdpsanpham.pdpedit', $item->id) }}" class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <!-- Xóa -->
                            <a href="{{ route('pdpadmin.pdpsanpham.pdpdelete', $item->id) }}" class="btn btn-danger btn-sm" 
                               onclick="return confirm('Bạn muốn xóa Mã sản phẩm này không? ID: {{ $item->id }}');" title="Xóa">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">
                        Chưa có thông tin sản phẩm
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="d-flex justify-content-center mt-3">
            {{ $pdpsanphams->links('pagination::bootstrap-5') }}
        </div>
     
    </div>
</div>

@endsection
<style>
    .pagination .page-link {
    color: #007bff; /* Màu sắc cho số trang */
}

.pagination .page-link:hover {
    color: #0056b3; /* Màu sắc khi hover */
}

.pagination .active .page-link {
    background-color: #007bff; /* Màu nền cho trang đang hoạt động */
    color: white; /* Màu chữ cho trang đang hoạt động */
}
</style>

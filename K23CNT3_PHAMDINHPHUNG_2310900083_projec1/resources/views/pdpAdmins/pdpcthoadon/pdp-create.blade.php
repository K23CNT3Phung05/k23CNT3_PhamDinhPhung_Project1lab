
@extends('_layouts.admins._master')
@section('title','Create chi tiết Hóa Đơn')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('pdpadmin.pdpcthoadon.pdpCreateSubmit') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới chi tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="pdpHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="pdpHoaDonID" id="pdpoaDonID" class="form-control">
                                @foreach ($pdphoadon as $item)
                                    <option value="{{ $item->id }}">{{ $item->pdpMaHoaDon }}</option>
                                @endforeach
                            </select>
                            @error('pdpHoaDonID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pdpSanPhamID" class="form-label">Mã Sản Phẩm</label>
                            <select name="pdpSanPhamID" id="pdpSanPhamID" class="form-control">
                                @foreach ($pdpsanpham as $item)
                                    <option value="{{ $item->id }}" data-price="{{ $item->pdpDonGia }}">{{ $item->pdpMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('pdpSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pdpSoLuongMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="pdpSoLuongMua" name="pdpSoLuongMua" value="{{ old('pdpSoLuongMua') }}" min="1" oninput="calculateThanhTien()">
                            @error('pdpSoLuongMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pdpDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="pdpDonGiaMua" name="pdpDonGiaMua" value="{{ old('pdpDonGiaMua') }}" oninput="calculateThanhTien()">
                            @error('pdpDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pdpThanhTien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="pdpThanhTien" name="pdpThanhTien" value="{{ old('pdpThanhTien') }}" readonly>
                            @error('pdpThanhTien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pdpTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="pdpTrangThai0" name="pdpTrangThai" value="0" checked />
                                <label for="pdpTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="pdpTrangThai1" name="pdpTrangThai" value="1" />
                                <label for="pdpTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="pdpTrangThai2" name="pdpTrangThai" value="2" />
                                <label for="pdpTrangThai2">Xóa</label>
                            </div>
                            @error('pdpTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{ route('pdpadmins.pdpcthoadon') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Hàm tính Thành Tiền
        function calculateThanhTien() {
            var quantity = parseFloat(document.getElementById('pdpSoLuongMua').value);
            var unitPrice = parseFloat(document.getElementById('pdpDonGiaMua').value);
            var thanhTien = quantity * unitPrice;
            document.getElementById('pdpThanhTien').value = thanhTien.toFixed(2);  // Làm tròn đến 2 chữ số thập phân
        }

        // Sự kiện khi chọn sản phẩm, tự động cập nhật Đơn Giá Mua
        document.getElementById('pdpSanPhamID').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            document.getElementById('pdpDonGiaMua').value = price;
            calculateThanhTien();
        });
    </script>
@endsection

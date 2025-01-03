<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDP_KHACHHANG; 
class PDP_KHACHHANGController extends Controller
{
    //
    // CRUD
    // list
    public function pdpList()
    {
        $khachhangs = PDP_KHACHHANG::all();
        return view('pdpAdmins.pdpkhachhang.pdp-list',['khachhangs'=>$khachhangs]);
    }
    // detail 
    public function pdpDetail($id)
    {
        $pdpkhachhang = PDP_KHACHHANG::where('id',$id)->first();
        return view('pdpAdmins.pdpkhachhang.pdp-detail',['pdpkhachhang'=>$pdpkhachhang]);
    }
    // create
    public function pdpCreate()
    {
        return view('pdpAdmins.pdpkhachhang.pdp-create');
    }
    //post
    public function pdpCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'pdpMaKhachHang' => 'required|unique:PDP_KHACHHANG,pdpMaKhachHang',
            'pdpHoTenKhachHang' => 'required|string',
            'pdpEmail' => 'required|email|unique:PDP_KHACHHANG,pdpEmail',  
            'pdpMatKhau' => 'required|min:6',
            'pdpDienThoai' => 'required|numeric|unique:PDP_KHACHHANG,pdpDienThoai',  
            'pdpDiaChi' => 'required|string',
            'pdpNgayDangKy' => 'required|date',  
            'pdpTrangThai' => 'required|in:0,1,2',
        ]);

        $pdpkhachhang = new PDP_KHACHHANG;
        $pdpkhachhang->pdpMaKhachHang = $request->pdpMaKhachHang;
        $pdpkhachhang->pdpHoTenKhachHang = $request->pdpHoTenKhachHang;
        $pdpkhachhang->pdpEmail = $request->pdpEmail;
        $pdpkhachhang->pdpMatKhau = $request->pdpMatKhau;
        $pdpkhachhang->pdpDienThoai = $request->pdpDienThoai;
        $pdpkhachhang->pdpDiaChi = $request->pdpDiaChi;
        $pdpkhachhang->pdpNgayDangKy = $request->pdpNgayDangKy;
        $pdpkhachhang->pdpTrangThai = $request->pdpTrangThai;

        $pdpkhachhang->save();

        return redirect()->route('pdpadmins.pdpkhachhang');


    }

    // edit
    public function pdpEdit($id)
    {
        // Lấy khách hàng theo id
        $pdpkhachhang = PDP_KHACHHANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$pdpkhachhang) {
            return redirect()->route('pdpadmins.pdpkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('pdpAdmins.pdpkhachhang.pdp-edit', ['pdpkhachhang' => $pdpkhachhang]);
    }
    
    public function pdpEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validate = $request->validate([
            'pdpMaKhachHang' => 'required|unique:PDP_KHACHHANG,pdpMaKhachHang,' . $id, // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'pdpHoTenKhachHang' => 'required|string',
            'pdpEmail' => 'required|email|unique:PDP_KHACHHANG,pdpEmail,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'pdpMatKhau' => 'nullable|min:6', // Mật khẩu không bắt buộc khi cập nhật
            'pdpDienThoai' => 'required|numeric|unique:PDP_KHACHHANG,pdpDienThoai,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'pdpDiaChi' => 'required|string',
            'pdpNgayDangKy' => 'required|date',
            'pdpTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Lấy khách hàng theo id
        $pdpkhachhang = PDP_KHACHANG   ::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$pdpkhachhang) {
            return redirect()->route('pdpadmins.pdpkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $pdpkhachhang->pdpMaKhachHang = $request->pdpMaKhachHang;
        $pdpkhachhang->pdpHoTenKhachHang = $request->pdpHoTenKhachHang;
        $pdpkhachhang->pdpEmail = $request->pdpEmail;           
        $pdpkhachhang->pdpMatKhau = $request->pdpMatKhau;              
        $pdpkhachhang->pdpDienThoai = $request->pdpDienThoai;
        $pdpkhachhang->pdpDiaChi = $request->pdpDiaChi;
        $pdpkhachhang->pdpNgayDangKy = $request->pdpNgayDangKy;
        $pdpkhachhang->pdpTrangThai = $request->pdpTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $pdpkhachhang->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('pdpadmins.pdpkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    
    //delete
    public function pdpDelete($id)
    {
        PDP_KHACHHANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}


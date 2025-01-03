<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pdp_HOA_DON; 
use App\Models\pdp_KHACH_HANG; 
class PDP_HOADONController extends Controller
{
    //
      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function pdpList()
    {
        $pdphoadons = pdp_HOADON::all();
        return view('pdpAdmins.pdphoadon.pdp-list',['pdphoadons'=>$pdphoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function pdpDetail($id)
    {
        // Tìm sản phẩm theo ID
        $pdphoadon = pdp_HOADON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('pdpAdmins.pdphoadon.pdp-detail', ['pdphoadon' => $pdphoadon]);
    }
    // create
    public function pdpCreate()
    {
        $pdpkhachhang = pdp_KHACHHANG::all();
        return view('pdpAdmins.pdphoadon.pdp-create',['pdpkhachhang'=>$pdpkhachhang]);
    }
    //post
    public function pdpCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'pdpMaHoaDon' => 'required|unique:pdp_hoa_don,pdpMaHoaDon',
            'pdpMaKhachHang' => 'required|exists:pdp_khach_hang,id',
            'pdpNgayHoaDon' => 'required|date',  
            'pdpNgayNhan' => 'required|date',
            'pdpHoTenKhachHang' => 'required|string',  
            'pdpEmail' => 'required|email',
            'pdpDienThoai' => 'required|numeric',  
            'pdpDiaChi' => 'required|string',  
            'pdpTongGiaTri' => 'required|numeric',  // Đã thay đổi thành numeric (cho kiểu double)
            'pdpTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Tạo một bản ghi hóa đơn mới
        $pdphoadon = new pdp_HOADON;
    
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $pdphoadon->pdpMaHoaDon = $request->pdpMaHoaDon;
        $pdphoadon->pdpMaKhachHang = $request->pdpMaKhachHang;  // Giả sử đây là khóa ngoại
        $pdphoadon->pdpHoTenKhachHang = $request->pdpHoTenKhachHang;
        $pdphoadon->pdpEmail = $request->pdpEmail;
        $pdphoadon->pdpDienThoai = $request->pdpDienThoai;
        $pdphoadon->pdpDiaChi = $request->pdpDiaChi;
        
        // Lưu 'pdpTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $pdphoadon->pdpTongGiaTri = (double) $request->pdpTongGiaTri; // Chuyển đổi sang double
        
        $pdphoadon->pdpTrangThai = $request->pdpTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $pdphoadon->pdpNgayHoaDon = $request->pdpNgayHoaDon;
        $pdphoadon->pdpNgayNhan = $request->pdpNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $pdphoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('pdpadmins.pdphoadon');
    }
    


    public function pdpEdit($id)
    {
        $pdphoadon = pdp_HOADON::where('id', $id)->first();
        $pdpkhachhang = pdp_KHACHHANG::all();
        return view('pdpAdmins.pdphoadon.pdp-edit',['pdpkhachhang'=>$pdpkhachhang,'pdphoadon'=>$pdphoadon]);
    }
    //post
    public function pdpEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'pdpMaHoaDon' => 'required|unique:pdp_hoa_don,pdpMaHoaDon,'. $id,
            'pdpMaKhachHang' => 'required|exists:pdp_khach_hang,id',
            'pdpNgayHoaDon' => 'required|date',  
            'pdpNgayNhan' => 'required|date',
            'pdpHoTenKhachHang' => 'required|string',  
            'pdpEmail' => 'required|email',
            'pdpDienThoai' => 'required|numeric',  
            'pdpDiaChi' => 'required|string',  
            'pdpTongGiaTri' => 'required|numeric', 
            'pdpTrangThai' => 'required|in:0,1,2',
        ]);
    
        $pdphoadon = pdp_HOA_DON::where('id', $id)->first();
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $pdphoadon->pdpMaHoaDon = $request->pdpMaHoaDon;
        $pdphoadon->pdpMaKhachHang = $request->pdpMaKhachHang;  // Giả sử đây là khóa ngoại
        $pdphoadon->pdpHoTenKhachHang = $request->pdpHoTenKhachHang;
        $pdphoadon->pdpEmail = $request->pdpEmail;
        $pdphoadon->pdpDienThoai = $request->pdpDienThoai;
        $pdphoadon->pdpDiaChi = $request->pdpDiaChi;
        
        // Lưu 'pdpTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $pdphoadon->pdpTongGiaTri = (double) $request->pdpTongGiaTri; // Chuyển đổi sang double
        
        $pdphoadon->pdpTrangThai = $request->pdpTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $pdphoadon->pdpNgayHoaDon = $request->pdpNgayHoaDon;
        $pdphoadon->pdpNgayNhan = $request->pdpNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $pdphoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('pdpadmins.pdphoadon');
    }
    
        //delete
        public function pdpDelete($id)
        {
            pdp_HOA_DON::where('id',$id)->delete();
            return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}

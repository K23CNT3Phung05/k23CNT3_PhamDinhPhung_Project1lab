<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDP_CTHOADON; 
use App\Models\PDP_SANPHAM; 
use App\Models\PDP_HOADON; 

class PDP_CTHOADONController extends Controller
{
    // thanh toán

    
  // thanh toán
 // Hiển thị sản phẩm khi nhấn vào "Mua"
 public function pdpthanhtoan($product_id)
 {
     // Lấy sản phẩm theo ID sử dụng model
     $sanPham = PDP_SANPHAM::find($product_id);

     // Kiểm tra nếu không có sản phẩm
     if (!$sanPham) {
         abort(404, 'Sản phẩm không tồn tại');
     }

     // Trả về view với thông tin sản phẩm
     return view('pdpuser.thanhtoan', compact('sanPham'));
 }

 // Lưu thông tin thanh toán (chỉ cần lưu vào bảng thanh toán nếu cần, ở đây ta không tạo bảng ThanhToan)
 public function storeThanhtoan(Request $request)
 {
     // Lấy thông tin sản phẩm từ model SanPham
     $sanPham = PDP_SANPHAM::find($request->product_id);

     // Kiểm tra nếu không có sản phẩm
     if (!$sanPham) {
         return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
     }

     // Tính tổng tiền thanh toán
     $tongTien = $request->pdpSoLuong * $sanPham->pdpDonGia;

     // Nếu muốn lưu vào bảng thanh toán, bạn có thể thêm logic ở đây.
     // Nhưng ở đây chỉ cần hiển thị thông tin và tính tổng tiền.

     return view('pdpuser.thanhtoan', [
         'sanPham' => $sanPham,
         'pdpSoLuong' => $request->pdpSoLuong,
         'tongTien' => $tongTien
     ]);
 }

      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function pdpList()
    {
        $pdpcthoadons = PDP_CTHOADON::all();
        return view('pdpAdmins.pdpcthoadon.pdp-list',['pdpcthoadons'=>$pdpcthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function pdpDetail($id)
    {
        // Tìm sản phẩm theo ID
        $pdpcthoadon = PDP_CTHOADON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('pdpAdmins.pdpcthoadon.pdp-detail', ['pdpcthoadon' => $pdpcthoadon]);
    }

     // create-----------------------------------------------------------------------------------------------------------------------------------------
     public function pdpCreate()
     {
         $pdphoadon = PDP_HOADON::all();
         $pdpsanpham = PDP_SANPHAM::all();
         return view('pdpAdmins.pdpcthoadon.pdp-create',['pdphoadon'=>$pdphoadon,'pdpsanpham'=>$pdpsanpham]);
     }
     //post-----------------------------------------------------------------------------------------------------------------------------------------
     public function pdpCreateSubmit(Request $request)
     {
         // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
         $validate = $request->validate([
             'pdpHoaDonID' => 'required|exists:pdp_hoa_don,id',
             'pdpSanPhamID' => 'required|exists:pdp_san_pham,id',
             'pdpSoLuongMua' => 'required|numeric',  
             'pdpDonGiaMua' => 'required|numeric',
             'pdpThanhTien' => 'required|numeric',  
             'pdpTrangThai' => 'required|in:0,1,2',
         ]);
     
         // Tạo một bản ghi hóa đơn mới
         $pdpcthoadon = new PDP_CTHOADON;
     
         // Gán dữ liệu xác thực vào các thuộc tính của mô hình
         $pdpcthoadon->pdpHoaDonID = $request->pdpHoaDonID;
         $pdpcthoadon->pdpSanPhamID = $request->pdpSanPhamID;  
         $pdpcthoadon->pdpSoLuongMua = $request->pdpSoLuongMua;
         $pdpcthoadon->pdpDonGiaMua = $request->pdpDonGiaMua;
         $pdpcthoadon->pdpThanhTien = $request->pdpThanhTien;
         $pdpcthoadon->pdpTrangThai = $request->pdpTrangThai;
     
        
     
         // Lưu bản ghi mới vào cơ sở dữ liệu
         $pdpcthoadon->save();
     
         // Chuyển hướng đến danh sách hóa đơn
         return redirect()->route('pdpadmins.pdpcthoadon');
     }

      // edit-----------------------------------------------------------------------------------------------------------------------------------------
      public function pdpEdit($id)
{
    $pdphoadon = PDP_HOADON::all(); // Lấy tất cả các hóa đơn
    $pdpsanpham = PDP_SANPHAM::all(); // Lấy tất cả các sản phẩm

    // Lấy chi tiết hóa đơn cần chỉnh sửa
    $pdpcthoadon = PDP_CTHOADON::where('id', $id)->first();

    if (!$pdpcthoadon) {
        // Nếu không tìm thấy chi tiết hóa đơn, chuyển hướng với thông báo lỗi
        return redirect()->route('pdpadmins.pdpcthoadon')->with('error', 'Không tìm thấy chi tiết hóa đơn!');
    }

    // Trả về view với dữ liệu
    return view('pdpAdmins.pdpcthoadon.pdp-edit', [
        'pdphoadon' => $pdphoadon,
        'pdpsanpham' => $pdpsanpham,
        'pdpcthoadon' => $pdpcthoadon
    ]);
}

      //post-----------------------------------------------------------------------------------------------------------------------------------------
      public function pdpEditSubmit(Request $request,$id)
      {
          // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
          $validate = $request->validate([
              'pdpHoaDonID' => 'required|exists:pdp_hoa_don,id',
              'pdpSanPhamID' => 'required|exists:pdp_san_pham,id',
              'pdpSoLuongMua' => 'required|numeric',  
              'pdpDonGiaMua' => 'required|numeric',
              'pdpThanhTien' => 'required|numeric',  
              'pdpTrangThai' => 'required|in:0,1,2',
          ]);
         
      
          // Tạo một bản ghi hóa đơn mới
          $pdpcthoadon = PDP_CTHOADON::where('id', $id)->first();
      
          // Gán dữ liệu xác thực vào các thuộc tính của mô hình
          $pdpcthoadon->pdpHoaDonID = $request->pdpHoaDonID;
          $pdpcthoadon->pdpSanPhamID = $request->pdpSanPhamID;  
          $pdpcthoadon->pdpSoLuongMua = $request->pdpSoLuongMua;
          $pdpcthoadon->pdpDonGiaMua = $request->pdpDonGiaMua;
          $pdpcthoadon->pdpThanhTien = $request->pdpThanhTien;
          $pdpcthoadon->pdpTrangThai = $request->pdpTrangThai;
      
         
      
          // Lưu bản ghi mới vào cơ sở dữ liệu
          $pdpcthoadon->save();
      
          // Chuyển hướng đến danh sách hóa đơn
          return redirect()->route('pdpadmins.pdpcthoadon');
      }

        //delete
        public function pdpDelete($id)
        {
            PDP_CTHOADONN::where('id',$id)->delete();
            return back()->with('cthoadon_deleted','Đã xóa Khách hàng thành công!');
        }
     
}

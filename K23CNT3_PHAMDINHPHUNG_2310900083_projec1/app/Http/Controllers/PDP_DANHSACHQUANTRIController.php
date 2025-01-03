<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\pdp_SANPHAM; 
use App\Models\pdp_KHACHHANG; 
use App\Models\pdp_TINTUC; 
class PDP_DANHSACHQUANTRIController extends Controller
{
    //
        // Danh mục
        public function danhmuc()
        {
            // Truy vấn số lượng sản phẩm
            $productCount = pdp_SAN_PHAM::count();
        
            // Truy vấn số lượng người dùng
            $userCount = pdp_KHACHHANG::count();
            $ttCount = pdp_TINTUC::count();

        
            // Trả về view và truyền cả productCount và userCount
            return view('pdpAdmins.pdpdanhsachquantri.pdpdanhmuc', compact('productCount', 'userCount','ttCount'));
        }

        public function nguoidung()
        {
            $pdpnguoidung = pdp_KHACHHANG::all();
        
            // Chuyển đổi pdpNgayDangKy thành đối tượng Carbon thủ công
            foreach ($pdpnguoidung as $user) {
                // Chuyển đổi ngày tháng thành đối tượng Carbon nếu chưa phải là Carbon
                $user->pdpNgayDangKy = Carbon::parse($user->pdpNgayDangKy);
            }
        
            return view('pdpAdmins.pdpdanhsachquantri.pdpdanhmuc.pdpnguoidung', ['pdpnguoidung' => $pdpnguoidung]);
        }
        

        public function tintuc()
        {
            // Retrieve all news articles from the database (assuming you have a model named pdp_TIN_TUC)
            $pdptintucs = pdp_TINTUC::all();  // Fetching all articles
        
            // Loop through articles and add the full URL to the image
            foreach ($pdptintucs as $article) {
                // Assuming pdpHinhAnh stores the image name, we'll prepend the 'public/storage' path
                $article->image_url = asset('storage/' . $article->pdpHinhAnh);
            }
        
            // Return the view and pass the articles to it
            return view('pdpAdmins.pdpdanhsachquantri.pdpdanhmuc.pdptintuc', [
                'pdptintucs' => $pdptintucs, // Passing the news articles to the view
            ]);
        }
        
    

    // Hiển thị danh sách sản phẩm
    public function sanpham()
    {
        $pdpsanphams = pdp_SANPHAM::all(); // Lấy tất cả sản phẩm
        return view('pdpAdmins.pdpdanhsachquantri.pdpdanhmuc.pdpsanpham', ['pdpsanphams' => $pdpsanphams]);
    }

    // Hiển thị mô tả chi tiết sản phẩm
    public function mota($id)
    {
        // Lấy sản phẩm theo id
        $product = pdp_SANPHAM::find($id);
        
        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            return redirect()->route('pdpAdmins.pdpdanhsachquantri.danhmuc.sanpham')
                             ->with('error', 'Sản phẩm không tồn tại.');
        }

        // Trả về view với thông tin sản phẩm
        return view('pdpAdmins.pdpdanhsachquantri.pdpdanhmuc.pdpmota', ['product' => $product]);
    }
}

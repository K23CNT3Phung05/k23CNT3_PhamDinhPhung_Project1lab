<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDP_SANPHAM; 
use App\Models\PDP_LOAISANPHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
use Illuminate\Support\Facades\Storage;  // Use this for file handling
class PDP_SANPHAMController extends Controller
{


    
    // In your controller
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = PDP_SANPHAM::where('pdpTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = PDP_SANPHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('pdpuser.search', compact('products', 'search'));
    }

    public function search1(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = PDP_SANPHAM::where('pdpTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = PDP_SANPHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('pdpuser.search1', compact('products', 'search'));
    }


    // search sap pham admin
    public function searchAdmins(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = PDP_SANPHAM::where('pdpTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = PDP_SANPHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('pdpAdmins.pdpsanpham.pdp-search', compact('products', 'search'));
    }

     //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function pdpList()
{


    // Apply pagination and filter by pdpTrangThai
    $pdpsanphams = PDP_SANPHAM::where('pdpTrangThai', 0); 
                   // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
     $pdpsanphams = PDP_SANPHAM::paginate(5);    
    
    // Pass the paginated products to the view
    return view('pdpAdmins.pdpsanpham.pdp-list', ['pdpsanphams' => $pdpsanphams]);
}

    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function pdpDetail($id)
    {
        // Tìm sản phẩm theo ID
        $pdpsanpham = PDP_SANPHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('pdpAdmins.pdpsanpham.pdp-detail', ['pdpsanpham' => $pdpsanpham]);
    }

      //create  -----------------------------------------------------------------------------------------------------------------------------------------
      public function pdpCreate()
      {
            // đọc dữ liệu từ PDP_LOAISANPHAM
            $pdploaisanpham = PDP_LOAISANPHAM::all();
          return view('pdpAdmins.pdpsanpham.pdp-create',['pdploaisanpham'=>$pdploaisanpham]);
      }
     

     // Controller
public function pdpCreateSubmit(Request $request)
{

    // Validate input
    $validatedData = $request->validate([
        'pdpMaSanPham' => 'required|unique:PDP_SANPHAM,pdpMaSanPham',
        'pdpTenSanPham' => 'required|string|max:255',
        'pdpHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'pdpSoLuong' => 'required|numeric|min:1',
        'pdpDonGia' => 'required|numeric',
        'pdpMaLoai' => 'required|exists:PDP_LOAISANPHAM,id',
        'pdpTrangThai' => 'required|in:0,1',
    ]);

    // Khởi tạo đối tượng PDP_SANPHAM và lưu thông tin vào cơ sở dữ liệu
    $pdpsanpham = new PDP_SANPHAM;
    $pdpsanpham->pdpMaSanPham = $request->pdpMaSanPham;
    $pdpsanpham->pdpTenSanPham = $request->pdpTenSanPham;

    // Kiểm tra nếu có tệp hình ảnh
    if ($request->hasFile('pdpHinhAnh')) {
        // Lấy tệp hình ảnh
        $file = $request->file('pdpHinhAnh');

        // Kiểm tra nếu tệp hợp lệ
        if ($file->isValid()) {
            // Tạo tên tệp dựa trên mã sản phẩm
            $fileName = $request->pdpMaSanPham . '.' . $file->extension();

            // Lưu tệp vào thư mục public/img/san_pham
            $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

            // Lưu đường dẫn vào cơ sở dữ liệu
            $pdpsanpham->pdpHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $pdpsanpham->pdpSoLuong = $request->pdpSoLuong;
    $pdpsanpham->pdpDonGia = $request->pdpDonGia;
    $pdpsanpham->pdpMaLoai = $request->pdpMaLoai;
    $pdpsanpham->pdpTrangThai = $request->pdpTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $pdpsanpham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('pdpadims.pdpsanpham');
}

//delete    -----------------------------------------------------------------------------------------------------------------------------------------

public function pdpdelete($id)
{
    PDP_SANPHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}

// edit -----------------------------------------------------------------------------------------------------------------------------------------
public function pdpEdit($id)
    {
       // Tìm sản phẩm theo ID
    $pdpsanpham = VTD_SAN_PHAM::findOrFail($id);

    // Lấy tất cả các loại sản phẩm từ bảng PDP_LOAISANPHAM
    $pdploaisanpham = Vtd_LOAI_SAN_PHAM::all();

    // Trả về view với dữ liệu sản phẩm và loại sản phẩm
    return view('pdpAdmins.pdpsanpham.pdp-edit', [
        'pdpsanpham' => $pdpsanpham,
        'pdploaisanpham' => $pdploaisanpham
    ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm


    public function pdpEditSubmit(Request $request, $id)
{
    // Validate dữ liệu
    $request->validate([
        'pdpMaSanPham' => 'required|max:20',
        'pdpTenSanPham' => 'required|max:255',
        'pdpHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'pdpSoLuong' => 'required|integer',
        'pdpDonGia' => 'required|numeric',
        'pdpMaLoai' => 'required|max:10',
        'pdpTrangThai' => 'required|in:0,1',
    ]);

    // Tìm sản phẩm cần chỉnh sửa
    $pdpsanpham = VTD_SAN_PHAM::findOrFail($id);

    // Cập nhật thông tin sản phẩm
    $pdpsanpham->pdpMaSanPham = $request->pdpMaSanPham;
    $pdpsanpham->pdpTenSanPham = $request->pdpTenSanPham;
    $pdpsanpham->pdpSoLuong = $request->pdpSoLuong;
    $pdpsanpham->pdpDonGia = $request->pdpDonGia;
    $pdpsanpham->pdpMaLoai = $request->pdpMaLoai;
    $pdpsanpham->pdpTrangThai = $request->pdpTrangThai;

    // Kiểm tra nếu có hình ảnh mới
    if ($request->hasFile('pdpHinhAnh')) {
        // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
        if ($pdpsanpham->pdpHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $pdpsanpham->pdpHinhAnh)) {
            // Xóa file cũ nếu tồn tại
            Storage::disk('public')->delete('img/san_pham/' . $pdpsanpham->pdpHinhAnh);
        }
        // Lưu hình ảnh mới
        $imagePath = $request->file('pdpHinhAnh')->store('img/san_pham', 'public');
        $pdpsanpham->pdpHinhAnh = $imagePath;
    }

    // Lưu thông tin sản phẩm đã chỉnh sửa
    $pdpsanpham->save();

    // Redirect về trang danh sách sản phẩm
    return redirect()->route('pdpadims.pdpsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}

    

}

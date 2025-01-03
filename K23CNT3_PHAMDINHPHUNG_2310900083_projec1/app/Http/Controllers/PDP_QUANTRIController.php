<?php

namespace App\Http\Controllers;

use App\Models\PDP_QUANTRI; // Thêm dòng này để sử dụng Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Thêm dòng này để sử dụng session

class PDP_QUANTRIController extends Controller
{
    // GET login (authentication)
    public function pdpLogin()
    {
        return view('pdpAdmins.pdp-login');
    }

    // POST login (authentication)
    public function pdpLoginSubmit(Request $request)
    {
        // Validate tài khoản và mật khẩu
        $request->validate([
            'pdpTaiKhoan' => 'required|string',
            'pdpMatKhau' => 'required|string',
        ]);

        // Tìm người dùng trong bảng PDP_QUANTRI
        $user = PDP_QUANTRI::where('pdpTaiKhoan', $request->pdpTaiKhoan)->first();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->pdpMatKhau, $user->pdpMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUsingId($user->id);

            // Lưu tên tài khoản vào session
            Session::put('username', $user->pdpTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('/pdp-admins')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu sai
            return redirect()->back()->withErrors(['pdpMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    public function pdplist()
{
    $pdpquantris = PDP_QUANTRI::all(); // Lấy tất cả quản trị viên
    return view('pdpAdmins.pdpquantri.pdp-list', ['pdpquantris'=>$pdpquantris]);
}

public function pdpDetail($id)
    {
        $pdpquantri = PDP_QUANTRI::where('id', $id)->first();
        return view('pdpAdmins.pdpquantri.pdp-detail',['pdpquantri'=>$pdpquantri]);

    }

    //create
    // GET: Hiển thị form thêm mới quản trị viên
public function pdpCreate()
{
    return view('pdpAdmins.pdpquantri.pdp-create');
}

// POST: Xử lý form thêm mới quản trị viên
public function pdpCreateSubmit(Request $request)
{
    // Xác thực dữ liệu
    $request->validate([
        'pdpTaiKhoan' => 'required|string|unique:PDP_QUANTRI,pdpTaiKhoan',
        'pdpMatKhau' => 'required|string|min:6',
        'pdpTrangThai' => 'required|in:0,1', 
    ]);

    // Tạo bản ghi mới trong cơ sở dữ liệu
    $pdpquantri = new PDP_QUANTRI();
    $pdpquantri->pdpTaiKhoan = $request->pdpTaiKhoan;
    $pdpquantri->pdpMatKhau = Hash::make($request->pdpMatKhau); // Mã hóa mật khẩu
    $pdpquantri->pdpTrangThai = $request->pdpTrangThai;
    $pdpquantri->save();

    // Chuyển hướng về trang danh sách với thông báo thành công
    return redirect()->route('pdpadmins.pdpquantri')->with('success', 'Thêm quản trị viên thành công');
}

// edit
// GET: Hiển thị form chỉnh sửa quản trị viên
public function pdpEdit($id)
{
    $pdpquantri = PDP_QUANTRI::find($id); // Lấy thông tin quản trị viên cần chỉnh sửa
    if (!$pdpquantri) {
        return redirect()->route('pdpadmins.pdpquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    return view('pdpAdmins.pdpquantri.pdp-edit', ['pdpquantri'=>$pdpquantri]);
}

// POST: Xử lý form chỉnh sửa quản trị viên
public function pdpEditSubmit(Request $request, $id)
{
    // Xác thực dữ liệu
    $request->validate([
        'pdpTaiKhoan' => 'required|string|unique:PDP_QUANTRI,pdpTaiKhoan,' . $id,
        'pdpMatKhau' => 'nullable|string|min:6', // Cho phép mật khẩu trống
        'pdpTrangThai' => 'required|in:0,1',
    ]);

    // Lấy quản trị viên cần sửa
    $pdpquantri = PDP_QUANTRI::find($id);
    if (!$pdpquantri) {
        return redirect()->route('pdpadmins.pdpquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }

    // Cập nhật thông tin
    $pdpquantri->pdpTaiKhoan = $request->pdpTaiKhoan;
    if ($request->pdpMatKhau) {
        $pdpquantri->pdpMatKhau = Hash::make($request->pdpMatKhau); // Cập nhật mật khẩu nếu có
    }
    $pdpquantri->pdpTrangThai = $request->pdpTrangThai;
    $pdpquantri->save();

    return redirect()->route('pdpadmins.pdpquantri')->with('success', 'Cập nhật quản trị viên thành công');
}

// delete
public function pdpDelete($id)
{
    $pdpquantri = PDP_QUANTRI::find($id); // Tìm quản trị viên cần xóa
    if (!$pdpquantri) {
        return redirect()->route('pdpadmins.pdpquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    $pdpquantri->delete(); // Xóa bản ghi

    return redirect()->route('pdpadmins.pdpquantri')->with('success', 'Xóa quản trị viên thành công');
}



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDP_KHACHHANG;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PDP_SIGNUPController extends Controller
{
    // Show the form to create a new customer
    public function pdpsignup()
    {
        return view('pdpuser.signup');
    }

    // Handle the form submission and store customer data
    public function pdpsignupSubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'pdpHoTenKhachHang' => 'required|string|max:255',
            'pdpEmail' => 'required|email|unique:pdp_khach_hang,pdpEmail',
            'pdpMatKhau' => 'required|min:6',
            'pdpDienThoai' => 'required|numeric|unique:pdp_khach_hang,pdpDienThoai',
            'pdpDiaChi' => 'required|string|max:255',
        ]);

        // Generate a new customer ID (pdpMaKhachHang)
        $lastCustomer = pdp_KHACH_HANG::latest('pdpMaKhachHang')->first(); // Get the latest customer to determine the next ID
    
        // If no customers exist, start with KH001
        if ($lastCustomer) {
            $newCustomerID = 'KH' . str_pad((substr($lastCustomer->pdpMaKhachHang, 2) + 1), 3, '0', STR_PAD_LEFT);  // e.g., KH001, KH002, etc.
        } else {
            $newCustomerID = 'KH001'; // First customer will be KH001
        }
    
        // Create a new customer record
        $pdpkhachhang = new PDP_KHACHHANG;
        $pdpkhachhang->pdpMaKhachHang = $newCustomerID; // Automatically generated ID
        $pdpkhachhang->pdpHoTenKhachHang = $request->pdpHoTenKhachHang;
        $pdpkhachhang->pdpEmail = $request->pdpEmail;
        $pdpkhachhang->pdpMatKhau = $request->pdpMatKhau; // Encrypt the password
        $pdpkhachhang->pdpDienThoai = $request->pdpDienThoai;
        $pdpkhachhang->pdpDiaChi = $request->pdpDiaChi;
        $pdpkhachhang->pdpNgayDangKy = now(); // Set the current timestamp for registration date
        $pdpkhachhang->pdpTrangThai = 0; // Set the default value for pdpTrangThai to 0 (inactive or unverified)
    
        // Save the new customer data
        try {
            $pdpkhachhang->save();
            // Redirect to login page on success with a success message
            return redirect()->route('pdpuser.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
        } catch (\Exception $e) {
            // In case of error, return to the previous page with an error message
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}

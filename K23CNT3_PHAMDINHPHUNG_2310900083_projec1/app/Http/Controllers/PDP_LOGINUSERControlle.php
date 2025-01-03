<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDP_KHACHHANG;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class pdp_LOGIN_USERController extends Controller
{
    // Show login form
    public function pdpLogin()
    {
        return view('pdpuser.login');
    }

    // Handle login form submission
    public function pdpLoginSubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'pdpEmail' => 'required|email',
            'pdpMatKhau' => 'required|string',
        ]);
        
        // Find the user by email
        $user = pdp_KHACH_HANG::where('pdpEmail', $request->pdpEmail)->first();
        
        // Check if the user exists and the password matches
        if ($user && Hash::check($request->pdpMatKhau, $user->pdpMatKhau)) {
            // Log the user in
            Auth::login($user);
    
            // Store the user's name in the session
            Session::put('username1', $user->pdpHoTenKhachHang);
            
            // Redirect to homepage or dashboard after successful login
            return redirect()->route('pdpuser.home1')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Return error if the credentials are invalid
            return redirect()->back()->withErrors(['pdpEmail' => 'Email hoặc Mật khẩu không đúng']);
        }
    }
    
    

}

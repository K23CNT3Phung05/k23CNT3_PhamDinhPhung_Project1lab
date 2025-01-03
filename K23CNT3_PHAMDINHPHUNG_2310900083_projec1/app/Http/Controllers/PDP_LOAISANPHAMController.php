<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDP_LOAISANPHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
class PDP_LOAISANPHAMController extends Controller
{
    //admin CRUD
    // list
    public function pdpList()
    {
        $pdploaisanphams = PDP_LOAISANPHAM::all();
        return view('pdpAdmins.pdploaisanpham.pdp-list',['pdploaisanphams'=>$pdploaisanphams]);
    }

    //create
    public function pdpCreate()
    {
        return view('pdpAdmins.pdploaisanpham.pdp-create');
    }

    public function pdpCreateSunmit(Request $request)
    {
        $validatedData = $request->validate([
            'pdpMaLoai' => 'required|unique:PDP_LOAISANPHAM,pdpMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'pdpTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'pdpTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);
        //ghi dữ liệu xuống db
        $pdploaisanpham = new PDP_LOAISANPHAM;
        $pdploaisanpham->pdpMaLoai = $request->pdpMaLoai;
        $pdploaisanpham->pdpTenLoai = $request->pdpTenLoai;
        $pdploaisanpham->pdpTrangThai = $request->pdpTrangThai;

        $pdploaisanpham->save();
       return redirect()->route('pdpadmins.pdploaisanpham');
    }

    public function pdpEdit($id)
    {
        // Retrieve the product by the primary key (id)
        $pdploaisanpham = PDP_LOAISANPHAM::find($id);
    
        // If the product does not exist, redirect with an error message
        if (!$pdploaisanpham) {
            return redirect()->route('pdpadmins.pdploaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Pass the product data to the edit view
        return view('pdpAdmins.pdploaisanpham.pdp-edit', ['pdploaisanpham' => $pdploaisanpham]);
    }
    
    public function pdpEditSubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'pdpMaLoai' => 'required|string|max:255|unique:PDP_LOAISANPHAM,pdpMaLoai,' . $request->id,  // Bỏ qua pdpMaLoai của bản ghi hiện tại
            'pdpTenLoai' => 'required|string|max:255',   
            'pdpTrangThai' => 'required|in:0,1',  // Validation for pdpTrangThai (0 or 1)
        ]);
    
        // Find the product by id
        $pdploaisanpham = PDP_LOAISANPHAM::find($request->id);
    
        // Check if the product exists
        if (!$pdploaisanpham) {
            return redirect()->route('pdpadmins.pdploaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Update the product with validated data
        $pdploaisanpham->pdpMaLoai = $request->pdpMaLoai;
        $pdploaisanpham->pdpTenLoai = $request->pdpTenLoai;
        $pdploaisanpham->pdpTrangThai = $request->pdpTrangThai;
    
        // Save the updated product
        $pdploaisanpham->save();
    
        // Redirect back to the list page with a success message
        return redirect()->route('pdpadmins.pdploaisanpham')->with('success', 'Cập nhật loại sản phẩm thành công.');
    }
    
    

    public function pdpGetDetail($id)
    {
        $pdploaisanpham = PDP_LOAISANPHAM::where('id', $id)->first();
        return view('pdpAdmins.pdploaisanpham.pdp-detail',['pdploaisanpham'=>$pdploaisanpham]);

    }

    public function pdpDelete($id)
    {
        PDP_LOAISANPHAM::where('id',$id)->delete();
    return back()->with('loaisanpham_deleted','Đã xóa Loại Sản Phẩm thành công!');
    }

}

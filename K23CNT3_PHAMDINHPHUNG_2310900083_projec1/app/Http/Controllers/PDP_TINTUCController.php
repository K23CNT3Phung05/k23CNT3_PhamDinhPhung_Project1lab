<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDP_TINTUC;  // Assuming you have the model for TIN_TUC
use Illuminate\Support\Facades\Storage;

class PDP_TINTUCController extends Controller
{
    // List all news ----------------------------------------------------------------------
 // List all news with pagination
public function pdpList()
{
    $pdptinTucs = PDP_TINTUC::all();
        
    // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
    $pdptinTucs = PDP_TINTUC::paginate(10);
    
    
    // Return the view with the paginated data
    return view('pdpAdmins.pdptintuc.pdp-list', ['pdptinTucs' => $pdptinTucs]);
}

    

    // Show the detail of a specific news item -------------------------------------------
    public function pdpDetail($id)
    {
        $pdptinTuc = PDP_TINTUC::findOrFail($id);
        return view('pdpAdmins.pdptintuc.pdp-detail', ['pdptinTuc' => $pdptinTuc]);
    }

    // Show the create form for a new news item ----------------------------------------
    public function pdpCreate()
    {
        return view('pdpAdmins.pdptintuc.pdp-create');
    }

    // Handle the form submission for creating a new news item ---------------------------
    public function pdpCreateSubmit(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'pdpMaTT' => 'required|unique:pdp_TinTuc,pdpMaTT',
            'pdpTieuDe' => 'required|string|max:255',
            'pdpMoTa' => 'required|string',
            'pdpNoiDung' => 'required|string',
            'pdpNgayDangTin' => 'required|date',
            'pdpNgayCapNhap' => 'required|date',
            'pdpHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Optional image
            'pdpTrangThai' => 'required|in:0,1',  // 0 - inactive, 1 - active
        ]);

        // Create the new news item
        $pdptinTuc = new PDP_TINTUC();
        $pdptinTuc->pdpMaTT = $request->pdpMaTT;
        $pdptinTuc->pdpTieuDe = $request->pdpTieuDe;
        $pdptinTuc->pdpMoTa = $request->pdpMoTa;
        $pdptinTuc->pdpNoiDung = $request->pdpNoiDung;
        $pdptinTuc->pdpNgayDangTin = $request->pdpNgayDangTin;
        $pdptinTuc->pdpNgayCapNhap = $request->pdpNgayCapNhap;

        // Check if there's an image and save it
        if ($request->hasFile('pdpHinhAnh')) {
            $imagePath = $request->file('pdpHinhAnh')->store('public/img/tin_tuc');
            $pdptinTuc->pdpHinhAnh = 'img/tin_tuc/' . basename($imagePath);
        }

        $pdptinTuc->pdpTrangThai = $request->pdpTrangThai;
        $pdptinTuc->save();

        return redirect()->route('pdpadmins.pdptintuc')->with('success', 'Tin tức đã được tạo thành công.');
    }

    // Delete a news item ----------------------------------------------------------------
    public function pdpDelete($id)
    {
        $pdptinTuc = PDP_TINTUC::findOrFail($id);
        $pdptinTuc->delete();

        return back()->with('success', 'Tin tức đã được xóa thành công.');
    }

    // Show the edit form for a specific news item --------------------------------------
    public function pdpEdit($id)
    {
        $pdptinTuc = PDP_TINTUC::findOrFail($id);
        return view('pdpAdmins.pdptintuc.pdp-edit', ['pdptinTuc' => $pdptinTuc]);
    }

    // Handle the form submission for updating an existing news item ---------------------
    public function pdpEditSubmit(Request $request, $id)
{
    $validated = $request->validate([
        'pdpTieuDe' => 'required|string|max:255',
        'pdpMoTa' => 'required|string|max:500',
        'pdpNoiDung' => 'required|string',
        'pdpHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'pdpNgayDangTin' => 'required|date',
        'pdpNgayCapNhap' => 'nullable|date',
        'pdpTrangThai' => 'required|in:0,1',
    ]);

    // Retrieve the news article to update
    $pdptinTuc = PDP_TINTUC::findOrFail($id);

    // Handle image upload
    if ($request->hasFile('pdpHinhAnh')) {
        // Delete old image if exists
        if ($pdptinTuc->pdpHinhAnh) {
            Storage::delete('public/' . $pdptinTuc->pdpHinhAnh);
        }

        $imagePath = $request->file('pdpHinhAnh')->store('pdptinTuc', 'public');
        $pdptinTuc->pdpHinhAnh = $imagePath;
    }

    // Update the news article
    $pdptinTuc->pdpTieuDe = $request->pdpTieuDe;
    $pdptinTuc->pdpMoTa = $request->pdpMoTa;
    $pdptinTuc->pdpNoiDung = $request->pdpNoiDung;
    $pdptinTuc->pdpNgayDangTin = $request->pdpNgayDangTin;
    $pdptinTuc->pdpNgayCapNhap = $request->pdpNgayCapNhap ?? now();
    $pdptinTuc->pdpTrangThai = $request->pdpTrangThai;
    $pdptinTuc->save();

    return redirect()->route('pdpadmins.pdptintuc')->with('success', 'Tin tức đã được cập nhật!');
}

}

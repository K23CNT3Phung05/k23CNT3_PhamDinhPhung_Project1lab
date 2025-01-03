<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PDP_SANPHAM extends Model
{
    // Explicitly define the correct table name if it's not the default plural form
    protected $table = 'PDP_SANPHAM'; // Set the correct table name

    protected $fillable = [
        'pdpMaSanPham', 'pdpTenSanPham', 'pdpHinhAnh', 'pdpSoLuong', 'pdpDonGia', 'pdpMaLoai'
    ];
}

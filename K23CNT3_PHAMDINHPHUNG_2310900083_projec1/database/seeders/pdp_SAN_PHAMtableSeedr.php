<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pdp_SAN_PHAMtableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('pdp_SAN_PHAM')->insert([
            [
                'pdpMaSanPham' => "VP001",
                'pdpTenSanPham' => "máy",
                'pdpHinhAnh' =>"imges/san-pham/VP001.jpg",
                'pdpSoLuong' =>200,
                'pdpDonGia' =>30000,
                
               ' pdpMaLoai' =>2,
            
                'pdpTrangthai' => 0,
        
            ],
            [
                'pdpMaSanPham' => "VP002",
                'pdpTenSanPham' => "máy2",
                'pdpHinhAnh' =>"imges/san-pham/VP002.jpg",
                'pdpSoLuong' =>400,
                'pdpDonGia' =>80000,
                
               ' pdpMaLoai' =>1,
            
                'pdpTrangthai' => 0,
        
            ],
            [
                'pdpMaSanPham' => "VP003",
                'pdpTenSanPham' => "máy3",
                'pdpHinhAnh' =>"imges/san-pham/VP003.jpg",
                'pdpSoLuong' =>100,
                'pdpDonGia' =>70000,
                
               ' pdpMaLoai' =>1,
            
                'pdpTrangthai' => 0,
        
            ],
            [
                'pdpMaSanPham' => "VP004",
                'pdpTenSanPham' => "máy4",
                'pdpHinhAnh' =>"imges/san-pham/VP004.jpg",
                'pdpSoLuong' =>500,
                'pdpDonGia' =>90000,
                
               ' pdpMaLoai' =>3,
            
                'pdpTrangthai' => 0,
        
            ],
            [
                'pdpMaSanPham' => "VP005",
                'pdpTenSanPham' => "máy5",
                'pdpHinhAnh' =>"imges/san-pham/VP005.jpg",
                'pdpSoLuong' =>110,
                'pdpDonGia' =>40000,
                
               ' pdpMaLoai' =>5,
            
                'pdpTrangthai' => 0,
        
            ],
        ]);
    }
}

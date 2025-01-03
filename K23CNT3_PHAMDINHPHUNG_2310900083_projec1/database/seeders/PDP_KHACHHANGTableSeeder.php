<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this line
use Illuminate\Support\Facades\Hash;


class PDP_KHACHHANGTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //
         DB::table('PDP_KHACHHANG')->insert([
            'pdpMaKhachHang'=>'KH001',
             'pdpHoTenKhachHang'=>'Phan Quang TÌÌnh',
            'pdpEmail'=>'ptinh@gmail.com',
            'pdpMatKhau'=>Hash::make('123456a@'), // Mã hóa mật khẩu
            'pdpDienThoai'=>'012550036',
            'pdpDiaChi'=>'Yên Bái-Yên Bình',
            'pdpNgayDangKy'=>'2024/12/12',
            'pdpTrangThai'=>0,
        ]);

        DB::table('PDP_KHACHHANG')->insert([
            'pdpMaKhachHang'=>'KH002',
            'pdpHoTenKhachHang'=>'Phạm Đình Phùng',
            'pdpEmail'=>'phamdinhphung7979@gmail.com',
            'pdpMatKhau'=>Hash::make('1234567@'), // Mã hóa mật khẩu
            'pdpDienThoai'=>'012588868',
            'pdpDiaChi'=>'Phú Thọ',
            'pdpNgayDangKy'=>'2024/12/20',
            'pdpTrangThai'=>0,
        ]);

        DB::table('PDP_KHACHHANG')->insert([
            'pdpMaKhachHang'=>'KH003',
            'pdpHoTenKhachHang'=>'Trần Tuấn Hùng',
            'pdpEmail'=>'hungtran@gmail.com',
            'pdpMatKhau'=>Hash::make('12345678@'), // Mã hóa mật khẩu
            'pdpDienThoai'=>'0382550508',
            'pdpDiaChi'=>'Phú Thọ',
            'pdpNgayDangKy'=>'2024/12/17',
            'pdpTrangThai'=>2,
        ]);

        DB::table('PDP_KHACHHANG')->insert([
            'pdpMaKhachHang'=>'KH004',
            'pdpHoTenKhachHang'=>'Phạm Tùng Quang',
            'pdpEmail'=>'quanpham@gmail.com',
            'pdpMatKhau'=>Hash::make('quanpham98'), // Mã hóa mật khẩu
            'pdpDienThoai'=>'094357152',
            'pdpDiaChi'=>'Hà Nội',
            'pdpNgayDangKy'=>'2024/12/03',
            'pdpTrangThai'=>0,
        ]);
    }
}

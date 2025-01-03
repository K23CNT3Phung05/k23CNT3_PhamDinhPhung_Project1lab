<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class PDP_HOADONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          //
          DB::table('PDP_HOADON')->insert([
            'pdpMaHoaDon'=>'HD001',
            'pdpMaKhachHang'=>1,
            'pdpNgayHoaDon'=>'2024/12/12',
            'pdpNgayNhan'=>'2024/12/12',
            'pdpHoTenKhachHang'=>'Phạm Đình Phùng',
            'pdpEmail'=>'phamdinhphung7979@gmail.com',
            'pdpDienThoai'=>'0373866467',
            'pdpDiaChi'=>'Diễn Châu-Nghệ An',
            'pdpTongGiaTri'=>'790000',
            'pdpTrangThai'=>2,
        ]);

        DB::table('PDP_HOADON')->insert([
            'pdpMaHoaDon'=>'HD002',
            'pdpMaKhachHang'=>2,
            'pdpNgayHoaDon'=>'2024/12/20',
            'pdpNgayNhan'=>'2024/12/21',
            'pdpHoTenKhachHang'=>'Trần Tuấn Hùng',
            'pdpEmail'=>'hungtran@gmail.com',
            'pdpDienThoai'=>'012588868',
            'pdpDiaChi'=>'Phú Thọ',
            'pdpTongGiaTri'=>'125000',
            'pdpTrangThai'=>0,
        ]);

        DB::table('PDP_HOADON')->insert([
            'pdpMaHoaDon'=>'HD003',
            'pdpMaKhachHang'=>3,
            'pdpNgayHoaDon'=>'2024/12/17',
            'pdpNgayNhan'=>'2024/12/17',
            'pdpHoTenKhachHang'=>'Phan Quang TÌÌnh',
            'pdpEmail'=>'ptinh@gmail.com',
            'pdpDienThoai'=>'0382550508',
            'pdpDiaChi'=>'Phú Thọ',
            'pdpTongGiaTri'=>'999000',
            'pdpTrangThai'=>1,
        ]);

        DB::table('PDP_HOADON')->insert([
            'pdpMaHoaDon'=>'HD004',
            'pdpMaKhachHang'=>1,
            'pdpNgayHoaDon'=>'2024/12/12',
            'pdpNgayNhan'=>'2024/12/12',
            'pdpHoTenKhachHang'=>'Nguyễn Văn Nam',
            'pdpEmail'=>'vannam7777@gmail.com',
            'pdpDienThoai'=>'012550036',
            'pdpDiaChi'=>'Yên Bái-Yên Bình',
            'pdpTongGiaTri'=>'660000',
            'pdpTrangThai'=>1,
        ]);

        DB::table('PDP_HOADON')->insert([
            'pdpMaHoaDon'=>'HD005',
            'pdpMaKhachHang'=>4,
            'pdpNgayHoaDon'=>'2024/12/03',
            'pdpNgayNhan'=>'2024/12/04',
            'pdpHoTenKhachHang'=>'Phạm Tùng Quang',
            'pdpEmail'=>'quangpham@gmail.com',
            'pdpDienThoai'=>'094357152',
            'pdpDiaChi'=>'Hà Nội',
            'pdpTongGiaTri'=>'777999',
            'pdpTrangThai'=>1,
        ]);
    }
}

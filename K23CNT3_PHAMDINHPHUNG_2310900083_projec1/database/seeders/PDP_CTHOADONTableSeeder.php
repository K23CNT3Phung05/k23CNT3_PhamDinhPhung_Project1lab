<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PDP_CTHOADONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('PDP_CTHOADON')->insert([
            'pdpHoaDonID'=>1,
            'pdpSanPhamID'=>1,
            'pdpSoLuongMua'=>12,
            'pdpDonGiaMua'=>699000,
            'pdpThanhTien'=>699000 * 12,
            'pdpTrangThai'=>0,
        ]);

        DB::table('PDP_CTHOADON')->insert([
            'pdpHoaDonID'=>2,
            'pdpSanPhamID'=>2,
            'pdpSoLuongMua'=>20,
            'pdpDonGiaMua'=>550000,
            'pdpThanhTien'=>550000 * 20,
            'pdpTrangThai'=>0,
        ]);

        DB::table('PDP_CTHOADON')->insert([
            'pdpHoaDonID'=>3,
            'pdpSanPhamID'=>5,
            'pdpSoLuongMua'=>5,
            'pdpDonGiaMua'=>590000,
            'pdpThanhTien'=>590000 *  5,
            'pdpTrangThai'=>0,
        ]);

        DB::table('PDP_CTHOADON')->insert([
            'pdpHoaDonID'=>4,
            'pdpSanPhamID'=>8,
            'pdpSoLuongMua'=>3,
            'pdpDonGiaMua'=>199000,
            'pdpThanhTien'=>199000 * 3,
            'pdpTrangThai'=>0,
        ]);
    }
}

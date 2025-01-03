<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Hash;

class PDP_LOAISANPHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           //
           DB::table('PDP_LOAISANPHAM')->insert([
            'pdpMaLoai'=>'IP',
            'pdpTenLoai'=>'IPHONE',
            'pdpTrangThai'=>0
        ]);
        DB::table('PDP_LOAISANPHAM')->insert([
            'pdpMaLoai'=>'SS',
            'pdpTenLoai'=>'SAMSUNG',
            'pdpTrangThai'=>0
        ]);
        DB::table('PDP_LOAISANPHAM')->insert([
            'pdpMaLoai'=>'HW',
            'pdpTenLoai'=>'HUAWAI',
            'pdpTrangThai'=>0
        ]);
        
    }
}

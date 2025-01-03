<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PDP_QUANTRITableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Mã hóa mật khẩu bằng Hash::make()
          $pdpMatKhau = Hash::make('07092005Pp@'); // Mã hóa mật khẩu

          DB::table('PDP_QUANTRI')->insert([
              'pdpTaiKhoan' => 'phamdinhphung79@gmail.com',
              'pdpMatKhau' => $pdpMatKhau,
              'pdpTrangThai' => 0
          ]);
  
          DB::table('PDP_QUANTRI')->insert([
              'pdpTaiKhoan' => '0373866467',
              'pdpMatKhau' => $pdpMatKhau,
              'pdpTrangThai' => 0
          ]);
    }
}

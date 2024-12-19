<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class php_QUAN_TRItableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        DB::table('Pdp_quan_tri')->insert([
            [
                'pdptaikhoan' => "phamdinhphung79@gmail.com",
                'pdpMatkhau' => $pdpMatkhau,
                'pdpTrangthai' => 0,
            ],
            [
                'pdptaikhoan' => "0373866467",
                'pdpMatkhau' => $pdpMatkhau,
                'pdpTrangthai' => 0,
            ],
        ]);
    }
}

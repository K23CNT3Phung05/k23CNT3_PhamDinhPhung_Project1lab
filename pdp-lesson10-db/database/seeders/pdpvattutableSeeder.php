<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pdpvattutableDessder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phpvattu')->insert([
            'pdpMaVTu'=>'DD01',
            'pdpTenVTu'=>'Đầu DVD Hitachi 1 cửa',
            'pdpDvTinh'=>'Bộ',
            'pdpPhanTram'=>40,
        ]);
    
    
        DB::table('phpvattu')->insert([
            'pdpMaVTu'=>'DD02',
            'pdpTenVTu'=>'Đầu DVD Hitachi 2 cửa',
            'pdpDvTinh'=>'Bộ',
            'pdpPhanTram'=>60,
        ]);
    }
}


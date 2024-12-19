<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pdp_LOAI_SAN_PHAMtableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pdp_LOAI_SAN_PHAM')->insert([
            [
                'pdpMaloaiMaloai' => "l001",
                'pdp Tenloai' => "Cây cảnh 1 ",
                'pdpTrangthai' => 0,
            ],
            [
                'pdpMaloaiMaloai' => "l002",
                'pdp Tenloai' => "Cây cảnh 3 ",
                'pdpTrangthai' => 0,
            ],
            [
                'pdpMaloaiMaloai' => "l003",
                'pdp Tenloai' => "Cây cảnh 3",
                'pdpTrangthai' => 0,
            ],
            [
                'pdpMaloaiMaloai' => "l004",
                'pdp Tenloai' => "Cây cảnh 4 ",
                'pdpTrangthai' => 0,
            ],
        ]);
    }
}

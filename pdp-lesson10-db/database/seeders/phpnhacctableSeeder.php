<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class phpnhacctableDessder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $faker = Faker::create();
        foreach(range(1,100) as $index){
            DB::table('phpnhacc')->insert([
                'phpMaNCC'=>$faker->uuid(),
                // 'MaNCC'=>$faker->word(15),
                'phpTenNCC'=>$faker->sentence(5),
                'phpDiachi'=>$faker->address(),
                'phpDienthoai'=>$faker->phoneNumber(10),
                'phpemail'=>$faker->email(),
                'phpstatus'=>$faker->boolean()
            ]);

        }
    }
    
}

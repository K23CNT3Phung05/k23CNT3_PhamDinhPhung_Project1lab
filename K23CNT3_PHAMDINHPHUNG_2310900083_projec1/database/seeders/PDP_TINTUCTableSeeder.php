<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PDP_TINTUCTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 10 rows of fake data into the 'pdp_TIN_TUC' table
        for ($i = 0; $i < 10; $i++) {
            DB::table('PDP_TINTUC')->insert([
                'pdpMaTT' => $faker->unique()->word, // Unique identifier for the news article
                'pdpTieuDe' => $faker->sentence, // Title of the news article
                'pdpMoTa' => $faker->text(200), // Description (shorter text)
                'pdpNoiDung' => $faker->paragraph(5), // Content (longer text)
                'pdpNgayDangTin' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'pdpNgayCapNhap' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'pdpHinhAnh' => $faker->imageUrl(), // Random image URL
                'pdpTrangThai' => $faker->numberBetween(0, 1), // Status (0 or 1, assuming binary status)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


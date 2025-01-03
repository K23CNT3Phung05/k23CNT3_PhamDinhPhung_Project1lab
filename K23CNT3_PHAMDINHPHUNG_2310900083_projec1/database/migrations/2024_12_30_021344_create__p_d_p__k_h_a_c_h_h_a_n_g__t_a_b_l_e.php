
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('PDP_KHACHHANG', function (Blueprint $table) {
            $table->id();
            $table->string('pdpMaKhachHang',255)->unique();
            $table->string('pdpHoTenKhachHang',255);
            $table->string('pdpEmail',255);
            $table->string('pdpMatKhau',255);
            $table->string('pdpDienThoai',255);
            $table->string('pdpDiaChi',255);
            $table->date('pdpNgayDangKy');
            $table->tinyInteger('pdpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdp_KHACHHANG');
    }
};


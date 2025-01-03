
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
        Schema::create('PDP_HOADON', function (Blueprint $table) {
            $table->id();
            $table->string('pdpMaHoaDon',255)->unique();
            $table->bigInteger('pdpMaKhachHang')->references('id')->on('pdp_KHACHHANG');
            $table->date('pdpNgayHoaDon');
            $table->date('pdpNgayNhan');
            $table->string('pdpHoTenKhachHang',255);
            $table->string('pdpEmail',255);
            $table->string('pdpDienThoai',255);
            $table->string('pdpDiaChi',255);
            $table->float('pdpTongGiaTri');
            $table->tinyInteger('pdpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdp_HOADON');
    }
};

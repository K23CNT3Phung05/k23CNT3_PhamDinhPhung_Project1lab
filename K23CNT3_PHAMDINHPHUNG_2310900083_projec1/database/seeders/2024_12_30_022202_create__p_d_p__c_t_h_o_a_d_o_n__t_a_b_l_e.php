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
        Schema::create('pdp_CTHOADON', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pdpHoaDonID')->references('id')->on('pdp_HOADON');
            $table->bigInteger('pdpSanPhamID')->references('id')->on('pdp_SANPHAM');
            $table->integer('pdpSoLuongMua');
            $table->float('pdpDonGiaMua');
            $table->double('pdpThanhTien');
            $table->tinyInteger('pdpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdp_CTHOADON');
    }
};

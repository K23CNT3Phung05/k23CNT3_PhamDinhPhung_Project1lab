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
        Schema::create('pdp_SAN_PHAM', function (Blueprint $table) {
            $table->id();
        
            $table->string('pdpMaSanPham',255)->unique();
            $table->string('pdpTenSanPham',255);
            $table->string('pdpHinhAnh',255);
            $table->integer('pdpSoLuong',);
            $table->float('pdpDonGia');
            $table->bigintegre('pdpMaLoai')->references('id')->on('pdp_LOAI-SAN_PHAM');
            $table->bigintegre('PDPTrangthai');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdp_SAN_PHAM');
    }
};

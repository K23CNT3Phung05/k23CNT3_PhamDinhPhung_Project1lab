
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
        Schema::create('PDP_SANPHAM', function (Blueprint $table) {
            $table->id();
        
            $table->string('pdpMaSanPham',255)->unique();
            $table->string('pdpTenSanPham',255);
            $table->string('pdpHinhAnh',255);
            $table->integer('pdpSoLuong',);
            $table->float('pdpDonGia');
            $table->bigInteger('pdpMaLoai')->references('id')->on('PDP_LOAISANPHAM');
            $table->bigInteger('pdpTrangthai');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PDP_SANPHAM');
    }
};


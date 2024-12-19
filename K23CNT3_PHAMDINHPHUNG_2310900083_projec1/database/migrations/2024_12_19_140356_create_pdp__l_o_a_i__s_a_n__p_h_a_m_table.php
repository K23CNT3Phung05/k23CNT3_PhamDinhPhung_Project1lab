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
        Schema::create('pdp_LOAI_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string ('pdpMaloai')->unique();
            $table->string('pdpTenloai',255);
            $table->tinyInteger('pdpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdp_LOAI_SAN_PHAM');
    }
};

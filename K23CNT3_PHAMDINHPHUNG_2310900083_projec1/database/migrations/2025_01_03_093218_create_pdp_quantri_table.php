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
        Schema::create('PDP_QUANTRI', function (Blueprint $table) {
            $table->id();
            $table->string('pdpTaiKhoan',255)->unique();
            $table->string('pdpMatKhau',255);
            $table->tinyInteger('pdpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PDP_QUANTRI');
    }
};

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
        Schema::create('pdpnhacc', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->string('pdpMaNCC')->primary();
            $table->string('pdpTenNCC');
            $table->string('pdpDiachi');
            $table->string('pdpDienthoai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdpnhacc');
    }
};

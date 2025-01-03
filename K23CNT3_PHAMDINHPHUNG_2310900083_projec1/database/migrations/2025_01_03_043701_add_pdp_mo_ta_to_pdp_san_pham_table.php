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
        Schema::table('PDP_SANPHAM', function (Blueprint $table) {
            $table->text('pdpMoTa')->nullable()->after('pdpMaLoai');
        });
    }
    
    public function down()
    {
        Schema::table('PDP_SANPHAM', function (Blueprint $table) {
            $table->dropColumn('pdpMoTa');
        });
    }
};

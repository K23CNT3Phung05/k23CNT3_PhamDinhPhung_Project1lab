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
        Schema::create('pdpvattu', function (Blueprint $table) {
            //$table->id();
         $table->string('pdpMaVTu')->primary();
        $table->string('pdpTenVTu')->unique();
        $table->string('pdpDvTinh');
        $table->float('pdpPhanTram');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdpvattu');
    }
};

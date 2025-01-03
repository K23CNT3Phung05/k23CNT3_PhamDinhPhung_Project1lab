
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
        Schema::create('PDP_LOAISANPHAM', function (Blueprint $table) {
            $table->id();
            $table->string('pdpMaLoai',255)->unique();
            $table->string('pdpTenLoai',255);
            $table->tinyInteger('pdpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PDP_LOAISANPHAM');
    }
};

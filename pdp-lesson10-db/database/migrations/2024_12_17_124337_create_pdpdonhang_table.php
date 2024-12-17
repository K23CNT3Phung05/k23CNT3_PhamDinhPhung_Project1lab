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
        Schema::create('pdpdonhang', function (Blueprint $table) {
             //$table->id();
            //$table->timestamps();
            $table->string('pdpSoDH')->primary();
            $table->date('pdpNgayDH');
            $table->string('pdpMaNCC');
            $table->foreign('pdpMaNCC')->references('pdpMaNCC')->on('pdpnhacc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdpdonhang');
    }
};

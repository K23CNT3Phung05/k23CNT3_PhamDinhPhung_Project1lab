
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
        Schema::create('PDP_TINTUC', function (Blueprint $table) {
            $table->id();
            $table->string('pdpMaTT')->unique(); // Assuming 'pdpMaTT' is unique, add unique constraint if needed
            $table->string('pdpTieuDe');
            $table->text('pdpMoTa'); // 'text' type is better for longer descriptions
            $table->longText('pdpNoiDung'); // 'longText' for potentially larger content
            $table->dateTime('pdpNgayDangTin'); // Store as datetime
            $table->dateTime('pdpNgayCapNhap'); // Store as datetime
            $table->string('pdpHinhAnh');
            $table->tinyInteger('pdpTrangThai'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdp_TINTUC');
    }
};

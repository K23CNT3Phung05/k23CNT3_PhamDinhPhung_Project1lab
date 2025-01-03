<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('PDP_KHACHHANG', function (Blueprint $table) {
        $table->timestamp('pdpLastLogin')->nullable(); // Thêm cột pdpLastLogin để lưu thời gian đăng nhập gần nhất
    });
}

public function down()
{
    Schema::table('PDP_KHACHHANG', function (Blueprint $table) {
        $table->dropColumn('pdpLastLogin'); // Xóa cột pdpLastLogin nếu cần
    });
}

};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('don_hang', function (Blueprint $table) {
            $table->timestamp('thoi_diem_giao_hang')->nullable();  // Thêm trường thoi_diem_giao_hang
        });
    }
    
    public function down()
    {
        Schema::table('don_hang', function (Blueprint $table) {
            $table->dropColumn('thoi_diem_giao_hang');
        });
    }
};

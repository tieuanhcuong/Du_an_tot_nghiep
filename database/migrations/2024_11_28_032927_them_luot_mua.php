<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('san_pham', function (Blueprint $table) {
            $table->integer('luot_mua')->default(0); // Thêm cột luot_mua với giá trị mặc định là 0
        });
    }

    public function down()
    {
        Schema::table('san_pham', function (Blueprint $table) {
            $table->dropColumn('luot_mua');
        });
    }
};

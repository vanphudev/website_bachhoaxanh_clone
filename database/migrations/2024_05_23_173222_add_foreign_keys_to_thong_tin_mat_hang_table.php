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
        Schema::table('thong_tin_mat_hang', function (Blueprint $table) {
            $table->foreign(['MAMH'], 'FK_CHI_TIET_MAT_HANG_MATHANG')->references(['MAMH'])->on('mat_hang')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('thong_tin_mat_hang', function (Blueprint $table) {
            $table->dropForeign('FK_CHI_TIET_MAT_HANG_MATHANG');
        });
    }
};

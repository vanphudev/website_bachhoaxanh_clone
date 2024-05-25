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
        Schema::table('chi_tiet_phan_loai', function (Blueprint $table) {
            $table->foreign(['MAMH'], 'FK_CHI_TIET_PHAN_LOAI_MATHANG')->references(['MAMH'])->on('mat_hang')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['MA_PL'], 'FK_CHI_TIET_PHAN_LOAI_PHAN_LOAI')->references(['MA_PL'])->on('phan_loai')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chi_tiet_phan_loai', function (Blueprint $table) {
            $table->dropForeign('FK_CHI_TIET_PHAN_LOAI_MATHANG');
            $table->dropForeign('FK_CHI_TIET_PHAN_LOAI_PHAN_LOAI');
        });
    }
};

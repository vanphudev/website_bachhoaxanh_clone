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
        Schema::table('mat_hang', function (Blueprint $table) {
            $table->foreign(['MALOAI'], 'FK_MATHANG_LOAI_MATHANG')->references(['MALOAI'])->on('loai_mathang')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['MA_TH'], 'FK_MATHANG_THUONGHIEU')->references(['MA_TH'])->on('thuong_hieu')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mat_hang', function (Blueprint $table) {
            $table->dropForeign('FK_MATHANG_LOAI_MATHANG');
            $table->dropForeign('FK_MATHANG_THUONGHIEU');
        });
    }
};

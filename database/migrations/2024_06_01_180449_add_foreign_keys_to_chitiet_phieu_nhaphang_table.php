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
        Schema::table('chitiet_phieu_nhaphang', function (Blueprint $table) {
            $table->foreign(['MAMH'], 'FK_CHITIETPHIEUNHAPHANG_MATHANG')->references(['MAMH'])->on('mat_hang')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['ID_PHIEUNHAP'], 'FK_CHITIETPHIEUNHAPHANG_PHIEUNHAPHANG')->references(['ID_PHIEUNHAP'])->on('phieu_nhaphang')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chitiet_phieu_nhaphang', function (Blueprint $table) {
            $table->dropForeign('FK_CHITIETPHIEUNHAPHANG_MATHANG');
            $table->dropForeign('FK_CHITIETPHIEUNHAPHANG_PHIEUNHAPHANG');
        });
    }
};

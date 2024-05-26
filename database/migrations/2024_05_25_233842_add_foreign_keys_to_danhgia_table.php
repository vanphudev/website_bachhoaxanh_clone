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
        Schema::table('danhgia', function (Blueprint $table) {
            $table->foreign(['MAKH'], 'FK_DANHGIA_KHACHHANG')->references(['MAKH'])->on('khachhang')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['MAMH'], 'FK_DANHGIA_MATHANG')->references(['MAMH'])->on('mat_hang')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('danhgia', function (Blueprint $table) {
            $table->dropForeign('FK_DANHGIA_KHACHHANG');
            $table->dropForeign('FK_DANHGIA_MATHANG');
        });
    }
};

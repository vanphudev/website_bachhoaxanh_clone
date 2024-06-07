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
        Schema::table('don_hang', function (Blueprint $table) {
            $table->foreign(['MAKH'], 'FK_DONHANG_KHACHHANG')->references(['MAKH'])->on('khachhang')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['MA_NV'], 'FK_DONHANG_NHANVIEN')->references(['MANV'])->on('nhanvien')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('don_hang', function (Blueprint $table) {
            $table->dropForeign('FK_DONHANG_KHACHHANG');
            $table->dropForeign('FK_DONHANG_NHANVIEN');
        });
    }
};

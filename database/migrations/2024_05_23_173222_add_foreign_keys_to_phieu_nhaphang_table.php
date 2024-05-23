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
        Schema::table('phieu_nhaphang', function (Blueprint $table) {
            $table->foreign(['MANCC'], 'FK_PHIEUNHAPHANG_NCC')->references(['MANCC'])->on('ncc')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['MANV'], 'FK_PHIEUNHAPHANG_NHANVIEN')->references(['MANV'])->on('nhanvien')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phieu_nhaphang', function (Blueprint $table) {
            $table->dropForeign('FK_PHIEUNHAPHANG_NCC');
            $table->dropForeign('FK_PHIEUNHAPHANG_NHANVIEN');
        });
    }
};

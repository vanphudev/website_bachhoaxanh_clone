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
        Schema::table('baiviet_tag', function (Blueprint $table) {
            $table->foreign(['ID_BAIVIET'], 'FK_BAIVIETTAG_BAIVIETSANPHAM')->references(['ID_BAIVIET'])->on('baiviet_sanpham')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('baiviet_tag', function (Blueprint $table) {
            $table->dropForeign('FK_BAIVIETTAG_BAIVIETSANPHAM');
        });
    }
};

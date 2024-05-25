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
            $table->foreign(['ID_BANK'], 'FK_DONHANG_HINHTHUCTHANHTOAN')->references(['ID_BANK'])->on('hinhthuc_thanhtoan')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['MAKH'], 'FK_DONHANG_KHACHHANG')->references(['MAKH'])->on('khachhang')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('don_hang', function (Blueprint $table) {
            $table->dropForeign('FK_DONHANG_HINHTHUCTHANHTOAN');
            $table->dropForeign('FK_DONHANG_KHACHHANG');
        });
    }
};

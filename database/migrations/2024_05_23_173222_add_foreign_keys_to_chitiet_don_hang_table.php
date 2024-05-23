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
        Schema::table('chitiet_don_hang', function (Blueprint $table) {
            $table->foreign(['ID_DONHANG'], 'FK_CHITIETIDDONHANG_DONHANG')->references(['ID_DONHANG'])->on('don_hang')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['MAMH'], 'FK_CHITIETIDDONHANG_MATHANG')->references(['MAMH'])->on('mat_hang')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chitiet_don_hang', function (Blueprint $table) {
            $table->dropForeign('FK_CHITIETIDDONHANG_DONHANG');
            $table->dropForeign('FK_CHITIETIDDONHANG_MATHANG');
        });
    }
};

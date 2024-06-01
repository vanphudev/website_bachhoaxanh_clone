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
        Schema::table('detail_cards', function (Blueprint $table) {
            $table->foreign(['ID_CARD'], 'FK_DETAILCARDS_CARDS')->references(['ID_CARD'])->on('cards')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['MAMH'], 'FK_DETAILCARDS_MATHANG')->references(['MAMH'])->on('mat_hang')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_cards', function (Blueprint $table) {
            $table->dropForeign('FK_DETAILCARDS_CARDS');
            $table->dropForeign('FK_DETAILCARDS_MATHANG');
        });
    }
};

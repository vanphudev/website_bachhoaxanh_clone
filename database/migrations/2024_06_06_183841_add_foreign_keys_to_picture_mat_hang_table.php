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
        Schema::table('picture_mat_hang', function (Blueprint $table) {
            $table->foreign(['MAMH'], 'FK_PICTUREMATHANG_MATHANG')->references(['MAMH'])->on('mat_hang')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('picture_mat_hang', function (Blueprint $table) {
            $table->dropForeign('FK_PICTUREMATHANG_MATHANG');
        });
    }
};

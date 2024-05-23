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
        Schema::table('loai_mathang', function (Blueprint $table) {
            $table->foreign(['MANHOM_LOAI'], 'FK_LOAIMATHANG_NHOMLOAIMATHANG')->references(['MANHOM_LOAI'])->on('nhom_loai_mathang')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loai_mathang', function (Blueprint $table) {
            $table->dropForeign('FK_LOAIMATHANG_NHOMLOAIMATHANG');
        });
    }
};

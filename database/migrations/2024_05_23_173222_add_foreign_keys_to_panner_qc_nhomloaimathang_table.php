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
        Schema::table('panner_qc_nhomloaimathang', function (Blueprint $table) {
            $table->foreign(['MANHOM_LOAI'], 'FK_PANNERQCNHOMLOAIMATHANG_NHOMLOAIMATHANG')->references(['MANHOM_LOAI'])->on('nhom_loai_mathang')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('panner_qc_nhomloaimathang', function (Blueprint $table) {
            $table->dropForeign('FK_PANNERQCNHOMLOAIMATHANG_NHOMLOAIMATHANG');
        });
    }
};

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
        Schema::create('panner_qc_nhomloaimathang', function (Blueprint $table) {
            $table->string('MA_PN_QC', 30)->primary();
            $table->text('PICTURE')->nullable();
            $table->string('MANHOM_LOAI', 30)->nullable()->index('fk_pannerqcnhomloaimathang_nhomloaimathang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panner_qc_nhomloaimathang');
    }
};

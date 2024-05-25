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
        Schema::create('loai_mathang', function (Blueprint $table) {
            $table->string('MALOAI', 30)->primary();
            $table->string('TENLOAI', 200)->nullable();
            $table->string('MANHOM_LOAI', 30)->nullable()->index('fk_loaimathang_nhomloaimathang');
            $table->boolean('TOP_MUASAM')->nullable();
            $table->text('PICTURE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loai_mathang');
    }
};

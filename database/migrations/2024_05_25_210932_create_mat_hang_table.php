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
        Schema::create('mat_hang', function (Blueprint $table) {
            $table->string('MAMH', 30)->primary();
            $table->string('TENMH', 200)->nullable();
            $table->string('DONVITINH', 100)->nullable();
            $table->string('MALOAI', 30)->nullable()->index('fk_mathang_loai_mathang');
            $table->text('MO_TA')->nullable();
            $table->decimal('GIA_BAN', 18)->nullable();
            $table->text('PICTURE')->nullable();
            $table->tinyInteger('TINHTRANG')->nullable();
            $table->boolean('KHOILUONG')->nullable();
            $table->integer('SOLUONG_TONKHO')->nullable();
            $table->decimal('SO_GAM', 18)->nullable();
            $table->string('MA_TH', 30)->nullable()->index('fk_mathang_thuonghieu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mat_hang');
    }
};

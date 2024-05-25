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
        Schema::create('nhom_sanpham', function (Blueprint $table) {
            $table->integer('MANHOM', true);
            $table->string('TEN_NHOM', 30)->nullable();
            $table->string('MAMH', 30)->nullable()->index('fk_nhomsanpham_mathang');
            $table->string('MO_TA', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhom_sanpham');
    }
};

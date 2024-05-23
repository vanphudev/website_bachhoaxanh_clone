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
        Schema::create('chi_tiet_phan_loai', function (Blueprint $table) {
            $table->string('MA_PL', 30);
            $table->string('MAMH', 30)->index('fk_chi_tiet_phan_loai_mathang');

            $table->primary(['MA_PL', 'MAMH']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phan_loai');
    }
};

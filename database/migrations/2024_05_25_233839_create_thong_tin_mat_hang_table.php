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
        Schema::create('thong_tin_mat_hang', function (Blueprint $table) {
            $table->integer('MA_ID_TTMH', true);
            $table->text('TEN_THONG_TIN')->nullable();
            $table->text('NOI_DUNG')->nullable();
            $table->string('MAMH', 30)->nullable()->index('fk_chi_tiet_mat_hang_mathang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_tin_mat_hang');
    }
};

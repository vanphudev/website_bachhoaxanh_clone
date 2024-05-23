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
            $table->string('MA_ID_TTMH', 30)->primary();
            $table->string('TEN_THONG_TIN', 100)->nullable();
            $table->string('NOI_DUNG', 100)->nullable();
            $table->string('MAMH', 30)->nullable()->unique('mamh');
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

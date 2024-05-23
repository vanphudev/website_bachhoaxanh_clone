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
        Schema::create('thuong_hieu', function (Blueprint $table) {
            $table->string('MA_TH', 30)->primary();
            $table->string('TEN_TH', 200)->nullable();
            $table->text('PICTURE')->nullable();
            $table->string('MO_TA', 500)->nullable();
            $table->string('MAMH', 30)->nullable()->index('fk_thuong_hieu_mathang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thuong_hieu');
    }
};

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
        Schema::create('baiviet_tag', function (Blueprint $table) {
            $table->string('ID_TAG', 30)->primary();
            $table->string('ID_BAIVIET', 30)->nullable()->index('fk_baiviettag_baivietsanpham');
            $table->string('TIEUDE', 100)->nullable();
            $table->text('NOIDUNG')->nullable();
            $table->text('PICTURE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baiviet_tag');
    }
};

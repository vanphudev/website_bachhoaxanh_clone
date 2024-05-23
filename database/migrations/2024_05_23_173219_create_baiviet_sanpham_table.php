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
        Schema::create('baiviet_sanpham', function (Blueprint $table) {
            $table->string('ID_BAIVIET', 30)->primary();
            $table->string('MAMH', 30)->unique('mamh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baiviet_sanpham');
    }
};

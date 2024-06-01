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
        Schema::create('ncc', function (Blueprint $table) {
            $table->string('MANCC', 30)->primary();
            $table->string('TENNCC', 200)->nullable();
            $table->string('THONGTIN_CHITIET', 200)->nullable();
            $table->string('PHONE', 15)->nullable();
            $table->string('EMAIL_NCC', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ncc');
    }
};

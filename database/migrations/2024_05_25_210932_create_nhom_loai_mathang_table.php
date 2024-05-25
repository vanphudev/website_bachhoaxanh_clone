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
        Schema::create('nhom_loai_mathang', function (Blueprint $table) {
            $table->string('MANHOM_LOAI', 30)->primary();
            $table->string('TENNHOM_LOAI', 200)->nullable();
            $table->text('PICTURE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhom_loai_mathang');
    }
};

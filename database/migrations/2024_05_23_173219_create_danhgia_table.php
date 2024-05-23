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
        Schema::create('danhgia', function (Blueprint $table) {
            $table->integer('MAKH');
            $table->string('MAMH', 30)->index('fk_danhgia_mathang');
            $table->integer('SO_SAO')->nullable();
            $table->string('NOIDUNG', 500)->nullable();

            $table->primary(['MAKH', 'MAMH']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgia');
    }
};

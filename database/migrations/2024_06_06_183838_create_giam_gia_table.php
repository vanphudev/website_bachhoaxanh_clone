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
        Schema::create('giam_gia', function (Blueprint $table) {
            $table->integer('ID_GG', true);
            $table->double('TILE_GIAM_GIA')->nullable();
            $table->dateTime('THOIDIEM')->nullable();
            $table->integer('LAN_GIAM_GIA')->nullable();
            $table->string('MAMH', 30)->nullable()->index('fk_giam_gia_mathang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giam_gia');
    }
};

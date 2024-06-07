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
        Schema::create('detail_cards', function (Blueprint $table) {
            $table->integer('ID_CARD');
            $table->integer('SOLUONG')->nullable();
            $table->string('MAMH', 30)->index('fk_detailcards_mathang');

            $table->primary(['ID_CARD', 'MAMH']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_cards');
    }
};

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
        Schema::create('picture_mat_hang', function (Blueprint $table) {
            $table->integer('ID_PICTURE', true);
            $table->text('PICTURE')->nullable();
            $table->string('MAMH', 30)->nullable()->index('fk_picturemathang_mathang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('picture_mat_hang');
    }
};

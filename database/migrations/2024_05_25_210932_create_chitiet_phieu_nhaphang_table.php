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
        Schema::create('chitiet_phieu_nhaphang', function (Blueprint $table) {
            $table->string('ID_PHIEUNHAP', 30);
            $table->string('MAMH', 30)->index('fk_chitietphieunhaphang_mathang');
            $table->integer('SOLUONG')->nullable();
            $table->decimal('GIA_NHAP', 18)->nullable();

            $table->primary(['ID_PHIEUNHAP', 'MAMH']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitiet_phieu_nhaphang');
    }
};

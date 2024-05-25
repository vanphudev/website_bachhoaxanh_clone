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
        Schema::create('phieu_nhaphang', function (Blueprint $table) {
            $table->string('ID_PHIEUNHAP', 30)->primary();
            $table->integer('TONG_SOLUONG_MH')->nullable();
            $table->date('NGAYLAP_PHIEUNHAP')->nullable();
            $table->decimal('TONGTIEN', 18)->nullable();
            $table->string('MANV', 30)->nullable()->index('fk_phieunhaphang_nhanvien');
            $table->string('MANCC', 30)->index('fk_phieunhaphang_ncc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_nhaphang');
    }
};

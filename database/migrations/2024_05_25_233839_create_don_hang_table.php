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
        Schema::create('don_hang', function (Blueprint $table) {
            $table->string('ID_DONHANG', 30)->primary();
            $table->decimal('TONGTIEN_DH', 18)->nullable();
            $table->integer('TONGSL_SANPHAM')->nullable();
            $table->decimal('TONGTIEN_KHUYENMAI', 18)->nullable();
            $table->decimal('VAT', 18)->nullable();
            $table->dateTime('NGAYLAP_DH')->nullable();
            $table->integer('MAKH')->nullable()->index('fk_donhang_khachhang');
            $table->string('ID_BANK', 30)->nullable()->index('fk_donhang_hinhthucthanhtoan');
            $table->string('TINHTRANG_NHANHANG', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang');
    }
};

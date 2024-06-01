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
        Schema::create('chitiet_don_hang', function (Blueprint $table) {
            $table->string('ID_DONHANG', 30);
            $table->string('MAMH', 30)->index('fk_chitietiddonhang_mathang');
            $table->integer('SOLUONG')->nullable();
            $table->decimal('THANH_TIEN', 18)->nullable();
            $table->decimal('THANH_TIEN_KHUYENMAI', 18)->nullable();

            $table->primary(['ID_DONHANG', 'MAMH']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitiet_don_hang');
    }
};

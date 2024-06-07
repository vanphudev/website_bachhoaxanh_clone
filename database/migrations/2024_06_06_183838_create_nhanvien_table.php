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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->string('MANV', 30)->primary();
            $table->string('TENNV', 50)->nullable();
            $table->date('NGAYSINH')->nullable();
            $table->string('GIOITINH', 4)->nullable();
            $table->string('ACCOUNT', 100)->nullable();
            $table->string('PASSWORD_USER')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhanvien');
    }
};

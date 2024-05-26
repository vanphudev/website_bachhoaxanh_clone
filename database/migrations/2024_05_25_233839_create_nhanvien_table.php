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
            $table->string('TRINHDOHOCVAN', 15)->nullable();
            $table->string('CHUCVU', 30)->nullable();
            $table->string('CCCD', 15)->nullable();
            $table->date('NGAYVAOLAM')->nullable();
            $table->text('PICTURE')->nullable();
            $table->decimal('HESOLUONG', 10)->nullable();
            $table->string('PHONE', 15)->nullable();
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

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
        Schema::create('khachhang', function (Blueprint $table) {
            $table->integer('MAKH', true);
            $table->string('TENKH', 100)->nullable();
            $table->date('NGAYSINH')->nullable();
            $table->string('GIOITINH', 4)->nullable();
            $table->string('DIA_CHI', 200)->nullable();
            $table->string('EMAIL', 100)->nullable()->unique('email');
            $table->boolean('VERIFIEDEMAIL')->nullable();
            $table->string('PHONE', 15)->nullable();
            $table->string('ACCOUNT', 100)->nullable();
            $table->string('PASSWORD_USER')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khachhang');
    }
};

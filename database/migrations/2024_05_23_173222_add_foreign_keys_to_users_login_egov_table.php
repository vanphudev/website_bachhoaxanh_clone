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
        Schema::table('users_login_egov', function (Blueprint $table) {
            $table->foreign(['MANV'], 'FK_USERSLOGIN_NHANVIEN')->references(['MANV'])->on('nhanvien')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_login_egov', function (Blueprint $table) {
            $table->dropForeign('FK_USERSLOGIN_NHANVIEN');
        });
    }
};

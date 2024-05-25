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
        Schema::create('users_login_kh', function (Blueprint $table) {
            $table->integer('ID', true);
            $table->integer('MAKH')->unique('makh');
            $table->text('KEYBYTES')->nullable();
            $table->string('PASSWORD_USER')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_login_kh');
    }
};

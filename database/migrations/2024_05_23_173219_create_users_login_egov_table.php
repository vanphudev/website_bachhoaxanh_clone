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
        Schema::create('users_login_egov', function (Blueprint $table) {
            $table->integer('ID', true);
            $table->string('MANV', 30)->unique('manv');
            $table->text('KEYBYTES')->nullable();
            $table->string('PASSWORD');
            $table->string('ROLE', 80)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_login_egov');
    }
};

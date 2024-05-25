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
        Schema::create('hinhthuc_thanhtoan', function (Blueprint $table) {
            $table->string('ID_BANK', 30)->primary();
            $table->string('TEN_HINHTHUC_TT', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hinhthuc_thanhtoan');
    }
};

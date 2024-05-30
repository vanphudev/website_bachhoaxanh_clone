<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mat_hang', function (Blueprint $table) {
            $table->fullText(['TENMH', 'DONVITINH', 'MO_TA']);
        });
    }

    public function down()
    {
        Schema::table('mat_hang', function (Blueprint $table) {
            $table->dropFullText(['TENMH', 'DONVITINH', 'MO_TA']);
        });
    }
};

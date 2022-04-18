<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_schedules', function (Blueprint $table) {
            $table->id();
            $table->date('day')->comment('日付');
            $table->string('venue')->comment('会場');
            $table->time('start')->comment('開始時間');
            $table->time('end')->comment('終了時間');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practice_schedules');
    }
};

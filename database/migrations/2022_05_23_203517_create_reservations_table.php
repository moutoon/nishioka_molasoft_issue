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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            // スタジオ・バンドid・日付・開始時間・終了時間
            $table->string('studio')->comment('スタジオ');
            $table->foreignId('band_id')->comment('バンドID');
            $table->date('date')->comment('日付');
            $table->time('start_time')->comment('開始時間');
            $table->time('end_time')->comment('終了時間');
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
        Schema::dropIfExists('reservations');
    }
};

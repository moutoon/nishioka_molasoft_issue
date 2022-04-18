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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('チーム名');
            $table->text('explain')->comment('チームの簡単な説明');
            $table->string('genre')->comment('チームの大まかな分類');
            $table->integer('fee')->comment('参加料金');
            $table->integer('rank')->comment('チームのランク情報')->default(1);
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
        Schema::dropIfExists('teams');
    }
};

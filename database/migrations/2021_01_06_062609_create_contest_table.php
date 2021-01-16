<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest', function (Blueprint $table) {
            $table->increments('id');
            $table->string("Contest_code");
            $table->string('Contest_name');
            $table->integer('num');
            $table->string('status');
            $table->dateTIme('star')->default('');
            $table->dateTIme('end')->default('');
            $table->string('contest_time')->default('');
            $table->string('allocation');
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
        Schema::dropIfExists('contest');
    }
}

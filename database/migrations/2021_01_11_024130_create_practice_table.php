<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice', function (Blueprint $table) {
            $table->integer('user');
            $table->string('name')->default("");
            $table->integer('rank');
            $table->string('A')->nullable()->default(null);
            $table->string('B')->nullable()->default(null);
            $table->integer('A_point')->default("");
            $table->integer('B_point')->default("");
            $table->string('time')->default('');
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
        Schema::dropIfExists('practice');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpc001Taable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spc001', function (Blueprint $table) {
            $table->integer('user')->default("");
            $table->string('name')->default("");
            $table->integer('rank')->default("");
            $table->string('time')->nullable()->default(null);
            $table->string('A')->nullable()->default(null);
            $table->string('B')->nullable()->default(null);
            $table->string('C')->nullable()->default(null);
            $table->string('D')->nullable()->default(null);
            $table->string('E')->nullable()->default(null);
            $table->integer('A_point')->default("");
            $table->integer('B_point')->default("");
            $table->integer('C_point')->default("");
            $table->integer('D_point')->default("");
            $table->integer('E_point')->default("");
            $table->integer('points')->default("");
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
        Schema::dropIfExists('spc001');
    }
}

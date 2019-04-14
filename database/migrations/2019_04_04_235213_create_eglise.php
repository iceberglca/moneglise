<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEglise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eglises', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->string('sigle');
            $table->string('libelle');
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
        Schema::table('eglises', function (Blueprint $table) {
            //
            $table->removeColumn('sigle');
            $table->removeColumn('libelle');
        });
    }
}

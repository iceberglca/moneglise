<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFidel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fideles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenoms');
            $table->string('photo');
            $table->string('datenais');
            $table->string('lieunaiss');
            $table->string('email');
            $table->string('contact')->nullable();
            $table->string('contact2')->nullable();
            $table->string('sitmatrimonial')->nullable();
            $table->string('profession');
            $table->string('nationalite');
            $table->string('id_eglise');

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
        Schema::dropIfExists('fideles');
    }
}

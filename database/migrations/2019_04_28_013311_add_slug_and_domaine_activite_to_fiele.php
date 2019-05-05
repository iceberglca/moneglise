<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugAndDomaineActiviteToFiele extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fideles', function (Blueprint $table) {
            //
            $table->string('slug');
            $table->integer('domaine')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fideles', function (Blueprint $table) {
            //
            $table->removeColumn('slug');
            $table->removeColumn('domaine');
        });
    }
}

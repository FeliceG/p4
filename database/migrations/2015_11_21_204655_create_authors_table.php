<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('authors', function(Blueprint $table)  {
    	$table->increments('id');
    	$table->timestamps();
    	$table->string('first_name');
    	$table->string('last_name');
    	$table->string('organization');
    	$table->string('email');
    	$table->string('type');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    	Schema::drop('authors');
    }
}

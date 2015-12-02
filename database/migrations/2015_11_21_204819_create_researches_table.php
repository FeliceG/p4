<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	Schema::create('researches', function(Blueprint $table) {
	$table->increments('id');
	$table->timestamps();
	$table->string('type');
	$table->string('title');
	$table->text('background');
	$table->text('design');
	$table->text('findings');
	$table->text('discussion');
	$table->text('impact');
	$table->text('abstract');
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
	Schema::drop('researches');
    }
}

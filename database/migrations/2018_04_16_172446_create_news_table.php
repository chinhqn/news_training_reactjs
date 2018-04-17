<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateNewsTable.
 */
class CreateNewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('preview_text');
			$table->text('detail_text');
			
            $table->timestamps();
		});
		Schema::table('news', function (Blueprint $table) {
			$table->integer('id_cat')->unsigned();
			$table->integer('id_user')->unsigned();
			$table->foreign('id_cat')->references('id')->on('cats')->onDelete('cascade');
			
			$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news');
	}
}

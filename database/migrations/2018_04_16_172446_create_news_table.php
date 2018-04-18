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

			$table->string('image');
			$table->integer('id_cat')->unsigned();
            $table->foreign('id_cat')->references('id')->on('cats')->onDelete('cascade');

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
		Schema::drop('news');
	}
}

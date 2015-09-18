<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->mediumText('summary')->nullable();
			$table->integer('minutes_read')->nullable();
			$table->longText('content');
			$table->string('slug')->unique();
			$table->string('header_background');
			$table->timestamps();

			$table->integer('author_id')->unsigned()->index();
			$table->foreign('author_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}
}

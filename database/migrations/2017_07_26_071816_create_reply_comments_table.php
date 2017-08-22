<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reply_comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("reply_name");
			$table->string("reply_content");
			$table->integer("comment_id")->unsigned();
            $table->foreign('comment_id')->references("id")->on("comments")->onDelete('cascade');
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
		Schema::drop('reply_comments');
	}

}

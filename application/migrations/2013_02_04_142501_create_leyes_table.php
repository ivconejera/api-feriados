<?php

class Create_Leyes_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leyes', function($table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('url');
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leyes');
	}

}
<?php

class Create_Feriado_Ley_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('feriado_ley', function($table) {
            $table->increments('id');
            $table->integer('ley_id')->unsigned();
            $table->integer('feriado_id')->unsigned();
            $table->foreign('ley_id')->references('id')->on('leyes')->on_update('cascade')->on_delete('cascade');
            $table->foreign('feriado_id')->references('id')->on('feriados')->on_update('cascade')->on_delete('cascade');
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('feriado_ley');
	}

}
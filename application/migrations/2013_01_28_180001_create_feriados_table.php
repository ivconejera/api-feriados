<?php

class Create_Feriados_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feriados', function($table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('comentarios')->nullable();
            $table->date('fecha');
            $table->integer('tipo_id')->unsigned();
            $table->boolean('irrenunciable')->default(0);
            $table->timestamps();
            $table->foreign('tipo_id')->references('id')->on('tipos')->on_update('cascade');
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('feriados');
	}

}
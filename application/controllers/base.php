<?php

class Base_Controller extends Controller {

	public $options = array(
			'limit' => 1000, // Se deja un limite máximo para no saturar la api
			'offset' => 0,
            'orderBy' => 'fecha',
            'orderDir' => 'ASC'
		);

	public function __construct(){

		//Inicializa la opciones para la paginación y ordenamiento
        $this->options = array_merge($this->options, Input::get());

		//Añade los filtros para la respuesta
		$this->filter('before', 'cachedResponse');
		$this->filter('after', array('cacheResponse', 'prepareResponse'));
	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}
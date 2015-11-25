<?php
	/**
	* Api Helper
	*/
	class Apihelper{
		/**
		* Añade la funcion de callback a los datos obtenidos, necesario para usar JSONP
		*/
		static function wrapCallback($response = ''){
			$callback = Input::get('callback');

			if($callback){
				$response = $callback.'('.$response.');';
			}

			return $response;
		}
	}
?>
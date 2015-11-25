<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::controller('home');

// Feriados
Route::any('feriados', array('as' => 'feriados', 'uses' => 'api.feriados@feriados'));
Route::any('feriados/(:num)', array('as' => 'feriados_ano', 'uses' => 'api.feriados@feriados'));
Route::any('feriados/(:num)/(:num)', array('as' => 'feriados_ano_mes', 'uses' => 'api.feriados@feriados'));
Route::any('feriados/(:num)/(:num)/(:num)', array('as' => 'feriados_ano_mes_dia', 'uses' => 'api.feriados@feriados'));

// Backend
Route::filter('pattern: backend*', 'auth');

Route::get('backend', function(){
    return Redirect::to('backend/feriados', 301);
});
Route::controller('backend.feriados');
Route::controller('backend.leyes');

// Authentication
Route::get('login', function() {
    return View::make('auth/login');
});
Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('login');
});

Route::post('login', function() {
    // get POST data
    $credentials['username'] = Input::get('username');
    $credentials['password'] = Input::get('password');
    $credentials['remember'] = Input::get('remember');
    if ( Auth::attempt($credentials) ){
        return Redirect::to('backend');
    }else{
        return Redirect::to('login')
            ->with('login_errors', true);
    }
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

// Revisa si ya existe una versión en cache de la url solicitada
Route::filter('cachedResponse', function(){
	$cachedResponse = Cache::get(md5(URI::full()));
	if($cachedResponse && Config::get('cache.timeout')){
		return $cachedResponse;
	}
});

// Prepara la respuesta antes de ser enviada
Route::filter('prepareResponse', function($response){
	$cache_timeout = Config::get('cache.timeout');

	if($cache_timeout)
		$response->header('cache-control', 'max-age='.($cache_timeout*60).', public');
	else
		$response->header('cache-control', 'public');

	if(gettype($response->content) != 'array'){

		// TODO: Implementar distintas formas de retornar la data
		$response->header('Content-Type', 'application/json');
		$response->content = Apihelper::wrapCallback(json_encode(array('error' => true, 'message' => $response->content )));

	}else{

		$response->header('Content-Type', 'application/json');
		$response->content = Apihelper::wrapCallback(json_encode($response->content));

	}

});

// Agrega la respuesta al cache
Route::filter('cacheResponse', function($response){

	$cache_timeout = Config::get('cache.timeout');

	if($cache_timeout)
		if(!Cache::get(md5(URI::full())))
			Cache::put(md5(URI::full()), $response, $cache_timeout);

});
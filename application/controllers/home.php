<?php

class Home_Controller extends Controller {

	public function action_index()
	{
		return View::make('home.index');
	}

}
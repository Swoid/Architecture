<?php


namespace Core;


class Dispatcher 
{

	public function __construct()
	{
		$this->Request = new Request();

		Router::parse($this->Request);

		$route = $this->Request->controller . '/' . $this->Request->action;

		if (in_array($route, include(ROUTES))) {
			die("yes");
		} else {
			die("no");
		}

	}

} 
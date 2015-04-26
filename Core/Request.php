<?php


namespace Core;


class Request 
{
	public $url = null;
    public $isPost = false;

	public function __construct()
	{
		if (isset($_SERVER['PATH_INFO'])) {
			$this->url = $_SERVER['PATH_INFO'];
		} else {
            $routes = include(ROUTES);
			$this->url = $routes[0];
		}

        if (!empty($_POST)) {
            $this->isPost = true;
            $this->data = new \stdClass();
            foreach ($_POST as $k => $v) {
                $this->data->$k = $v;
            }
            unset($_POST);
        }
	}

} 
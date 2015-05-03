<?php


namespace Core;


class Request 
{
	public $url = null;
    public $isPost = false;
    public $referer = null;

	public function __construct()
	{
		if (isset($_SERVER['PATH_INFO'])) {
			$this->url = $_SERVER['PATH_INFO'];
		} else {
            $routes = include(ROUTES);
			$this->url = $routes[0];
		}

        $this->isPost = $_SERVER['REQUEST_METHOD'] == "POST" ? true : false;

        if (!empty($_POST)) {
            $this->data = new \stdClass();
            foreach ($_POST as $k => $v) {
                $this->data->$k = $v;
            }
            unset($_POST);
        }

        if(isset($_SERVER['HTTP_REFERER'])) {
            $root = addcslashes(ROOT,'/');
            $parts = preg_split('/'.$root.'/',$_SERVER['HTTP_REFERER']);
            $this->referer = isset($parts[1]) ? $parts[1] : $parts[0];
        }

	}

} 
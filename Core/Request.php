<?php


namespace Core;


class Request 
{
	public $url = null;

	public function __construct()
	{
		if (isset($_SERVER['PATH_INFO'])) {
			$this->url = $_SERVER['PATH_INFO'];
		} else {
			$this->url = "d_controller/d_action";
		}
	}

} 
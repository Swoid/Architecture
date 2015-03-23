<?php 

namespace Core;

class Router
{
	public static function parse(Request $request)
	{
		$url =  explode('/', trim($request->url,'/'));
		$request->controller = $url[0];
		$request->action = $url[1];
	}
}
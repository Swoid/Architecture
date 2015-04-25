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
            $controllerName = 'App\\Controllers\\' . ucfirst($this->Request->controller) . 'Controller';
            $controller = new $controllerName;

            $data = call_user_func([$controller,$this->Request->action]);
            if(!empty($data)) {
                extract($data);
            }

            ob_start();
            require('./App/Views/' . ucfirst($this->Request->controller) . '/' . $controller->view . '.php');
            $layout_content = ob_get_clean();
            require('./App/Views/Layouts/' . $controller->layout . '.php');
        } else {
            die("Page introuvable");
        }

	}

} 
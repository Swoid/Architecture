<?php


namespace Core;


class Dispatcher
{
    public $Request = null;

	public function __construct()
	{
        // On initialise l'objet Request
		$this->Request = new Request();

        // On parse la requete (on trouve le controller, l'action...)
		Router::parse($this->Request);

        // On défini la route actuelle
		$route = $this->Request->controller . '/' . $this->Request->action;

        // On regarde si elle est disponnible
        if (in_array($route, include(ROUTES))) {
            $controllerName = 'App\\Controllers\\' . ucfirst($this->Request->controller) . 'Controller';
            $controller = new $controllerName($this->Request, $this->Request->controller);

            if(method_exists($controller,'beforeFilter')) {
                $controller->beforeFilter();
            }

            $data = call_user_func_array([$controller,$this->Request->action],$this->Request->params);

            if(!empty($data)) {
                extract($data);
            }

            $controller->render();
        } else {
            die("Page introuvable");
        }

	}

} 
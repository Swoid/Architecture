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
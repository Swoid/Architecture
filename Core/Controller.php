<?php


namespace Core;

class Controller
{
    public $view = null,
           $layout = 'default',
           $Session = false,
           $rendered = false,
           $name = null,
           $Request = null;

    function __construct(Request $request, $name)
    {
        $this->Request = $request;
        $this->name = $name;
        $this->view = $request->action;
        if (!$this->Session) {
            $this->Session = new Session();
        }
        $this->loadModel();
    }


    public function loadModel($name = null)
    {
        if(is_null($name)){
            $name = ucfirst(substr($this->name, 0, -1));
        }

        $className = 'App\\Models\\' . $name;

        $this->$name = new $className();
    }

    public function render()
    {
        if(!$this->rendered) {
            ob_start();
            require('./App/Views/' . ucfirst($this->name) . '/' . $this->view . '.php');
            $layout_content = ob_get_clean();
            require('./App/Views/Layouts/' . $this->layout . '.php');
            $this->rendered = true;
        }
    }
}


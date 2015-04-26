<?php


namespace Core;

class Controller
{
    public $view = null,
           $layout = 'default',
           $Session = false,
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
}


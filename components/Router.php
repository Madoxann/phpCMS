<?php
    class Router{
        private $routes;
        public function __construct(){
            require_once('config/routes.php');
            $this->routes = $routes;
        }
        public function run(){
            $requestedUri = $_SERVER['REQUEST_URI'];
            foreach ($this->routes as $controller => $controllerRoutes){
                foreach ($controllerRoutes as $uri => $actionWithParameters){
                    if (preg_match("~$uri~",$requestedUri)){
                        $selectedActionWithParameters = preg_replace("~$uri~",$actionWithParameters,$requestedUri);
                        //deleted replaceCount - on my opinion it makes no sense (mb will prove useful in /../.. situations)
                        $selectedActionWithParameters = str_replace(SITE_ROOT,'',$selectedActionWithParameters);
                        $selectedActionWithParametersArray = explode('/',$selectedActionWithParameters);
                        $action = array_shift($selectedActionWithParametersArray);
                        $requestedController = new $controller();
                        $requestedAction = 'action'.ucfirst($action);
                        //$requestedController->$requestedAction();
                        call_user_func_array(array($requestedController,$requestedAction),$selectedActionWithParametersArray);
                        break 2;
                    }
                }
            }
        }
}
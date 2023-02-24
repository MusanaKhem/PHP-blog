<?php

class Rooter{

    private $ctrl;
    private $view;

    public function rooterReq(){

        try{

            // Automatic classes' load of models file
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });

            // Create a variable $url
            $url = '';

            // Determined controller  based on variable
            if(isset($_GET['url'])) {

                // Decompose url and apply a filter
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                // Create a variable - decomposed url is like a table
                    // Recover first table index then totally selected it then rewritten in lowercase 'strtolower()'
                    // Then, recover index's first letter '[0]' and rewritten in capitals 'ucfirst()'
                $controller = ucfirst(strtolower($url[0]));

                // Create a variable 1

                $controllerClass = "Controller".$controller;
                
                // Create variable 2
                // Refind controller desk way
                $controllerFile = "controllers/".$controllerClass.".php";

                // Verify if controller file exists (if way exist and file is find)
                if(file_exists($controllerFile)){
                    
                    // Then class is launched with all url's parameters
                    // Allows to respect the encapsulation
                    require_once($controllerFile);

                    // 
                    $this->ctrl = new $controllerClass($url);


                }else{
                    throw new \Exception("No page found", 1);
                }
            }

            else {
                require_once('controllers/homeController.php');
                $this->ctrl = new homeController($url);
            }

        }catch(\Exception $e){
            $errorMsg = $e->getMessage();
            require_once('views/viewError.php');
        }
    }
}
?>
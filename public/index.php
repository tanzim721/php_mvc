<?php 

use App\Controllers\ProfileController;

    require_once __DIR__ . '/../vendor/autoload.php';

    $routes = require_once __DIR__ . '/../routes/web.php';

    // print_r($routes); 
    
    $request = $_SERVER['REQUEST_URI'];
    // print_r($request);
    
    $request = explode("?", $request)[0];

    if (isset($routes[$request])) {
        // print_r($routes[$request]);
        $controller = $routes[$request][0] ?? null;
        $action = $routes[$request][1] ?? null;

        // echo $controller;
        // echo $action;
        
        if ($controller && $action) {
            $newController = new $controller();
            $newController->$action();
        }
    }  
    else {
        throw new Exception("404 Not Found");
    }   


    echo ProfileController::class;

?>
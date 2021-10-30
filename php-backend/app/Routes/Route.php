<?php

namespace App\Routes;

use App\Response\Response;

class Route {
  public static function handleRouteMethods($routes){
    $method = $_SERVER['REQUEST_METHOD'];

    $controller = null;

    if(isset($routes[$method])){
      $controller = $routes[$method]['controller'];
    }

    if(!isset($controller)){
      Response::sendMethodNotAllowedResponse();
    }

    $controller->execute();
  }
}
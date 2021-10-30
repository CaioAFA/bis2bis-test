<?php

namespace App\Routes;

use App\Response\Response;
use App\Session\Session;

class Route {
  public static function handleRouteMethods($routes){
    $method = $_SERVER['REQUEST_METHOD'];

    $controller = null;

    $r = $routes[$method];
    if(isset($r)){
      $controller = $r['controller'];
    }

    if(!isset($controller)){
      Response::sendMethodNotAllowedResponse();
    }

    if($r['requireAuth'] && Session::getAdminSession()){
      Response::sendUnhauthorizedResponse();
    }

    $controller->execute();
  }
}
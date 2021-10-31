<?php

namespace App\Routes;

use App\Response\Response;
use App\Session\Session;

class Route {
  public static function handleRouteMethods($routes){
    Session::initSession();

    $method = $_SERVER['REQUEST_METHOD'];

    $controller = null;

    if($method == 'OPTIONS'){
      Response::sendOkResponse();
    }

    $r = $routes[$method];
    if(isset($r)){
      $controller = $r['controller'];
    }

    if(!isset($controller)){
      Response::sendMethodNotAllowedResponse();
    }

    $adminSession = Session::getAdminSession();
    if($r['requireAuth'] && !$adminSession){
      Response::sendUnhauthorizedResponse();
    }

    $controller->execute();
  }
}
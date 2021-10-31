<?php

namespace App\Controllers\Authorization;

use App\Response\Response;
use App\Session\Session;

class AuthorizationGet {
  public function execute(){    
    $sessionData = Session::getAdminSession();

    if(!$sessionData) Response::sendUnhauthorizedResponse();

    Response::sendJsonResponse($sessionData);
  }
}
<?php

namespace App\Controllers\Authorization;

use App\Response\Response;
use App\Session\Session;

class AuthorizationGet {
  /**
   * Controller main function
   */
  public function execute(){    
    $sessionData = Session::getAdminSession();

    if(!$sessionData) Response::sendUnauthorizedResponse();

    Response::sendJsonResponse($sessionData);
  }
}
<?php

namespace App\Controllers\Authorization;

use App\Request\Request;
use App\Repository\AdminRepository;
use App\Response\Response;
use App\Session\Session;

class AuthorizationPost {
  /**
   * Controller main function
   */
  public function execute(){
    $data = Request::getPayload();
    $admin = AdminRepository::getAdminByEmail($data['email']);

    if(!$admin) Response::sendUnauthorizedResponse();

    if(!password_verify($data['password'], $admin->getPassword())) Response::sendUnauthorizedResponse();

    Session::createAdminSession($admin);

    $sessionData = Session::getAdminSession();

    Response::sendJsonResponse(
      [
        'sessionId' => session_id(),
        'sessionData' => $sessionData
      ]
    );
  }
}
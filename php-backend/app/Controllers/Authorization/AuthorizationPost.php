<?php

namespace App\Controllers\Authorization;

use App\Request\Request;
use App\Repository\AdminRepository;
use App\Response\Response;
use App\Session\Session;

class AuthorizationPost {
  public function execute(){
    $data = Request::getPayload();
    $admin = AdminRepository::getAdminByEmail($data['email']);

    if(!$admin) Response::sendUnhauthorizedResponse();

    if(!password_verify($data['password'], $admin->getPassword())) Response::sendUnhauthorizedResponse();

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
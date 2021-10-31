<?php

namespace App\Controllers\Authorization;

use App\Request\Request;
use App\Repository\AdminRepository;
use App\Response\Response;
use App\Session\Session;

class AuthorizationPost {
  public function execute(){
    $data = Request::getPayload();
    $admin = AdminRepository::getAdminByEmailAndPassword($data['email'], $data['password']);
    
    if(!$admin) Response::sendUnhauthorizedResponse();

    Session::createAdminSession($admin);

    Response::sendJsonResponse(session_id());
  }
}
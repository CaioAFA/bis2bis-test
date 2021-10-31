<?php

namespace App\Controllers\Admin;

use App\Repository\AdminRepository;
use App\Response\Response;
use App\Session\Session;

class AdminGet {
  public function execute(){
    if(!Session::canManageUsers()){
      Response::sendUnhauthorizedResponse();
    }

    $admins = AdminRepository::getAdmins();

    $result = [];
    foreach($admins as $a){
      $result[] = $a->toArray();
    }

    Response::sendJsonResponse($result);
  }
}
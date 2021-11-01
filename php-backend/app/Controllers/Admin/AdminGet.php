<?php

namespace App\Controllers\Admin;

use App\Repository\AdminRepository;
use App\Response\Response;
use App\Session\Session;

class AdminGet {
  /**
   * Controller main function
   */
  public function execute(){
    if(!Session::canManageUsers()){
      Response::sendUnauthorizedResponse();
    }

    $admins = AdminRepository::getAdmins();

    $result = [];
    foreach($admins as $a){
      $result[] = $a->toArray();
    }

    Response::sendJsonResponse($result);
  }
}
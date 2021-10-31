<?php

namespace App\Controllers\Admin;

use App\Repository\AdminRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class AdminDelete {
  public function execute(){
    if(!Session::canManageUsers()){
      Response::sendUnhauthorizedResponse();
    }

    $data = Request::getPayload();
    $adminToDelete = $data['id'];
    AdminRepository::deleteAdmin($adminToDelete);
    Response::sendJsonResponse();
  }
}
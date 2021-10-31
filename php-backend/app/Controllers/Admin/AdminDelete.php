<?php

namespace App\Controllers\Admin;

use App\Repository\AdminRepository;
use App\Request\Request;
use App\Response\Response;

class AdminDelete {
  public function execute(){
    $data = Request::getPayload();
    $adminToDelete = $data['id'];
    AdminRepository::deleteAdmin($adminToDelete);
    Response::sendJsonResponse();
  }
}
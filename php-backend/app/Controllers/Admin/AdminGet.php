<?php

namespace App\Controllers\Admin;

use App\Repository\AdminRepository;
use App\Response\Response;

class AdminGet {
  public function execute(){
    $admins = AdminRepository::getAdmins();

    $result = [];
    foreach($admins as $a){
      $result[] = $a->toArray();
    }

    Response::sendJsonResponse($result);
  }
}
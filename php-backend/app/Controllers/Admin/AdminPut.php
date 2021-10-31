<?php

namespace App\Controllers\Admin;

use App\Repository\AdminRepository;
use App\Request\Request;
use App\Response\Response;

class AdminPut {
  public function execute(){
    $data = Request::getPayload();

    $admin = AdminRepository::getAdmin($data['id']);

    if(!$admin){
      Response::sendNotFoundResponse();
    }

    $admin->setName($data['name']);
    $admin->setEmail($data['email']);
    $admin->setPassword($data['password']);
    $admin->setCanManagePosts($data['canManagePosts']);
    $admin->setCanManageUsers($data['canManageUsers']);
    $admin->setCanManageDumps($data['canManageDumps']);

    AdminRepository::updateAdmin($admin);
    
    Response::sendJsonResponse();
  }
}
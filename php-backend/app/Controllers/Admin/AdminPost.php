<?php

namespace App\Controllers\Admin;

use App\Models\AdminModel;
use App\Repository\AdminRepository;
use App\Request\Request;
use App\Response\Response;

class AdminPost {
  public function execute(){
    $data = Request::getPayload();

    $newAdmin = new AdminModel();

    $newAdmin->setName($data['name']);
    $newAdmin->setEmail($data['email']);
    $newAdmin->setPassword($data['password']);
    $newAdmin->setCanManagePosts($data['canManagePosts']);
    $newAdmin->setCanManageUsers($data['canManageUsers']);
    $newAdmin->setCanManageDumps($data['canManageDumps']);
    
    AdminRepository::insertAdmin($newAdmin);

    Response::sendJsonResponse();
  }
}
<?php

namespace App\Controllers\Admin;

use App\Models\AdminModel;
use App\Repository\AdminRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class AdminPost {
  public function execute(){
    if(!Session::canManageUsers()){
      Response::sendUnhauthorizedResponse();
    }

    $data = Request::getPayload();

    $newAdmin = new AdminModel();

    $newAdmin->setName($data['name']);
    $newAdmin->setEmail($data['email']);
    $newAdmin->setPassword($data['password']);
    $newAdmin->setCanManagePosts($data['canManagePosts']);
    $newAdmin->setCanManageUsers($data['canManageUsers']);
    $newAdmin->setCanManageDumps($data['canManageDumps']);
    
    $error = $newAdmin->validate(false);
    if($error){
      Response::sendErrorResponse($error);
    }

    AdminRepository::insertAdmin($newAdmin);

    Response::sendJsonResponse();
  }
}
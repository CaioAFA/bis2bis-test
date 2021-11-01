<?php

namespace App\Controllers\Admin;

use App\Repository\AdminRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class AdminPut {
  /**
   * Controller main function
   */
  public function execute(){
    if(!Session::canManageUsers()){
      Response::sendUnauthorizedResponse();
    }

    $data = Request::getPayload();

    if(!isset($data['id'])){
      Response::sendErrorResponse("Informe um ID");
    }

    $admin = AdminRepository::getAdmin($data['id']);

    if(!$admin){
      Response::sendNotFoundResponse();
    }

    $admin->setName($data['name']);
    $admin->setEmail($data['email']);

    if($data['password']){
      $admin->setPassword($data['password']);
    }

    $admin->setCanManagePosts($data['canManagePosts']);
    $admin->setCanManageUsers($data['canManageUsers']);
    $admin->setCanManageDumps($data['canManageDumps']);

    $error = $admin->validate(true);
    if($error){
      Response::sendErrorResponse($error);
    }

    AdminRepository::updateAdmin($admin);
    
    Response::sendJsonResponse();
  }
}
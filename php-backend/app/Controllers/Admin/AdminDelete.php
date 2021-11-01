<?php

namespace App\Controllers\Admin;

use App\Repository\AdminRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class AdminDelete {
  /**
   * Controller main function
   */
  public function execute(){
    if(!Session::canManageUsers()){
      Response::sendUnauthorizedResponse();
    }

    $data = Request::getPayload();

    if(!$data['id']){
      Response::sendErrorResponse("Envie o ID de algum administrador");
    }

    $adminToDelete = $data['id'];

    $sessionData = Session::getAdminSession();
    $loggedAdminId = $sessionData["id"];
    if($data['id'] == $loggedAdminId){
      Response::sendErrorResponse("Você não pode deletar a si mesmo");
    }

    AdminRepository::deleteAdmin($adminToDelete);
    Response::sendJsonResponse();
  }
}
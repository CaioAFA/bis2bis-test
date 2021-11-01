<?php

namespace App\Controllers\Dumps;

use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class DumpsDelete {
  /**
   * Controller main function
   */
  public function execute(){
    if(!Session::canManageDumps()){
      Response::sendUnauthorizedResponse();
    }
    
    $dumpsDir = __DIR__ . '/../../../dumps';

    $payload = Request::getPayload();
    $fileToDelete = $payload['name'];

    unlink("$dumpsDir/$fileToDelete");

    Response::sendOkResponse();
  }
}
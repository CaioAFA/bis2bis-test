<?php

namespace App\Controllers\Dumps;

use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class DumpsDelete {
  public function execute(){
    if(!Session::canManageDumps()){
      Response::sendUnhauthorizedResponse();
    }
    
    $dumpsDir = __DIR__ . '/../../../dumps';

    $payload = Request::getPayload();
    $fileToDelete = $payload['name'];

    unlink("$dumpsDir/$fileToDelete");

    Response::sendOkResponse();
  }
}
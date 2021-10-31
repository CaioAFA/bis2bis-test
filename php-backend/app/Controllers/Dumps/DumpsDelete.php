<?php

namespace App\Controllers\Dumps;

use App\Request\Request;
use App\Response\Response;

class DumpsDelete {
  public function execute(){
    $dumpsDir = __DIR__ . '/../../../dumps';

    $payload = Request::getPayload();
    $fileToDelete = $payload['name'];

    unlink("$dumpsDir/$fileToDelete");

    Response::sendOkResponse();
  }
}
<?php

namespace App\Controllers\Dumps;

use App\Response\Response;

class DumpsGet {
  public function execute(){
    $dumpsDir = __DIR__ . '/../../../dumps';
    $dumpFiles = glob($dumpsDir . "/*.sql");

    $dumps = [];

    foreach($dumpFiles as $d){
      $dumps[] = $this->getDumpNameFromFilePath($d);
    }

    Response::sendJsonResponse($dumps);
  }

  private function getDumpNameFromFilePath($filePath){
    $filePathSplitted = explode('/', $filePath);
    return end($filePathSplitted);
  }
}
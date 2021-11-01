<?php

namespace App\Controllers\Dumps;

use App\Response\Response;
use App\Session\Session;

class DumpsGet {
  /**
   * Controller main function
   */
  public function execute(){
    if(!Session::canManageDumps()){
      Response::sendUnauthorizedResponse();
    }
    
    $dumpsDir = __DIR__ . '/../../../dumps';
    $dumpFiles = glob($dumpsDir . "/*.sql");

    $dumps = [];

    foreach($dumpFiles as $d){
      $dumps[] = $this->getDumpNameFromFilePath($d);
    }

    Response::sendJsonResponse($dumps);
  }

  /**
   * Extract only the dump name from file path
   * 
   * @param String $filePath
   * 
   * @return String
   */
  private function getDumpNameFromFilePath($filePath){
    $filePathSplitted = explode('/', $filePath);
    return end($filePathSplitted);
  }
}
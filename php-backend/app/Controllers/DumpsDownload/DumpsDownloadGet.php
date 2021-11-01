<?php

namespace App\Controllers\DumpsDownload;

use App\Response\Response;
use App\Session\Session;

class DumpsDownloadGet {
  /**
   * Controller main function
   */
  public function execute(){
    if(!Session::canManageDumps()){
      Response::sendUnauthorizedResponse();
    }
    
    $dumpsDir = __DIR__ . '/../../../dumps';

    $filename = $_REQUEST["filename"];
    $filePath = "$dumpsDir/$filename";
    $fileSize = filesize($filePath);

    if(!file_exists($filePath)){
      Response::sendNotFoundResponse();
    }

    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.$fileSize);
    header('Content-Disposition: filename='.$filename);
    readfile($filePath);

    Response::sendOkResponse();
  }
}
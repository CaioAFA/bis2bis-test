<?php

namespace App\Controllers\DumpsDownload;

use App\Response\Response;

class DumpsDownloadGet {
  public function execute(){
    $dumpsDir = __DIR__ . '/../../../dumps';

    $filename = $_REQUEST["filename"];
    $filePath = "$dumpsDir/$filename";
    $fileSize = filesize($filePath);

    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.$fileSize);
    header('Content-Disposition: filename='.$filename);
    readfile($filePath);

    Response::sendOkResponse();
  }
}
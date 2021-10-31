<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\DumpsDownload\DumpsDownloadGet;
use App\Routes\Route;

Route::handleRouteMethods(
  [
    'GET' =>  [
      'controller' => new DumpsDownloadGet(),
      'requireAuth' => true
    ],
  ]
);
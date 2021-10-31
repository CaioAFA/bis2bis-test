<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\Dumps\DumpsDelete;
use App\Controllers\Dumps\DumpsGet;
use App\Controllers\Dumps\DumpsPost;
use App\Routes\Route;

Route::handleRouteMethods(
  [
    'GET' =>  [
      'controller' => new DumpsGet(),
      'requireAuth' => true
    ],
    'POST' =>  [
      'controller' => new DumpsPost(),
      'requireAuth' => true
    ],
    'DELETE' => [
      'controller' => new DumpsDelete(),
      'requireAuth' => true
    ]
  ]
);
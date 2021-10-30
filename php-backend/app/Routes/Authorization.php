<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Routes\Route;
use App\Controllers\Authorization\AuthorizationPost;
use App\Controllers\Authorization\AuthorizationGet;

Route::handleRouteMethods(
  [
    'GET' => [
      'controller' => new AuthorizationGet(),
      'requireAuth' => false
    ],
    'POST' => [
      'controller' => new AuthorizationPost(),
      'requireAuth' => false
    ]
  ]
);
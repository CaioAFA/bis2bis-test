<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\Admin\AdminDelete;
use App\Controllers\Admin\AdminGet;
use App\Controllers\Admin\AdminPost;
use App\Controllers\Admin\AdminPut;
use App\Routes\Route;

Route::handleRouteMethods(
  [
    'GET' =>  [
      'controller' => new AdminGet(),
      'requireAuth' => true
    ],
    'POST' =>  [
      'controller' => new AdminPost(),
      'requireAuth' => true
    ],
    'PUT' =>  [
      'controller' => new AdminPut(),
      'requireAuth' => true
    ],
    'DELETE' =>  [
      'controller' => new AdminDelete(),
      'requireAuth' => true
    ]
  ]
);
<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Routes\Route;
use App\Controllers\Login\LoginPost as LoginPost;

Route::handleRouteMethods(
  [
    'POST' => [
      'controller' => new LoginPost(),
      'requireAuth' => false
    ]
  ]
);
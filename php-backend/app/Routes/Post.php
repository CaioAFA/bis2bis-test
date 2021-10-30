<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\Posts\PostsGet;
use App\Routes\Route;

Route::handleRouteMethods(
  [
    'GET' => [
      'controller' => new PostsGet(),
      'requireAuth' => false
    ],
  ]
);
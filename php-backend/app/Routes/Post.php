<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\Posts\PostsDelete;
use App\Controllers\Posts\PostsGet;
use App\Controllers\Posts\PostsPost;
use App\Controllers\Posts\PostsPut;
use App\Routes\Route;

Route::handleRouteMethods(
  [
    'GET' => [
      'controller' => new PostsGet(),
      'requireAuth' => false
    ],
    'POST' => [
      'controller' => new PostsPost(),
      'requireAuth' => true
    ],
    'PUT' =>  [
      'controller' => new PostsPut(),
      'requireAuth' => true
    ],
    'DELETE' =>  [
      'controller' => new PostsDelete(),
      'requireAuth' => true
    ]
  ]
);
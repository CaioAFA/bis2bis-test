<?php

namespace App\Controllers\Posts;

use App\Repository\PostRepository;
use App\Response\Response;

class PostsGet {
  public function execute(){    
    $posts = PostRepository::getPosts();

    $result = [];
    foreach($posts as $p){
      $result[] = $p->toArray();
    }

    Response::sendJsonResponse($result);
  }
}
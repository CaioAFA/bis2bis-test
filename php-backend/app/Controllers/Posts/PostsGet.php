<?php

namespace App\Controllers\Posts;

use App\Repository\PostRepository;
use App\Response\Response;
use App\Session\Session;

class PostsGet {
  public function execute(){
    if(!Session::canManagePosts()){
      Response::sendUnhauthorizedResponse();
    }
    
    $posts = PostRepository::getPosts();

    $result = [];
    foreach($posts as $p){
      $result[] = $p->toArray();
    }

    Response::sendJsonResponse($result);
  }
}
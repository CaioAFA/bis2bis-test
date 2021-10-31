<?php

namespace App\Controllers\Posts;

use App\Repository\PostRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class PostsDelete {
  public function execute(){
    if(!Session::canManagePosts()){
      Response::sendUnhauthorizedResponse();
    }
    
    $data = Request::getPayload();
    $postToDelete = $data['id'];
    PostRepository::deletePost($postToDelete);
    Response::sendJsonResponse();
  }
}
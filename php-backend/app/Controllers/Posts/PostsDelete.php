<?php

namespace App\Controllers\Posts;

use App\Repository\PostRepository;
use App\Request\Request;
use App\Response\Response;

class PostsDelete {
  public function execute(){
    $data = Request::getPayload();
    $postToDelete = $data['id'];
    PostRepository::deletePost($postToDelete);
    Response::sendJsonResponse();
  }
}
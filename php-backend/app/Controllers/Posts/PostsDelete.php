<?php

namespace App\Controllers\Posts;

use App\Repository\PostRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class PostsDelete {
  /**
   * Controller main function
   */
  public function execute(){
    if(!Session::canManagePosts()){
      Response::sendUnauthorizedResponse();
    }
    
    $data = Request::getPayload();

    if(!$data['id']){
      Response::sendErrorResponse("Envie o ID de algum post");
    }

    $postToDelete = $data['id'];
    PostRepository::deletePost($postToDelete);
    Response::sendJsonResponse();
  }
}
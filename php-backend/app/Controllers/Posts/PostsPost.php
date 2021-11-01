<?php

namespace App\Controllers\Posts;

use App\Models\PostModel;
use App\Repository\PostRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class PostsPost {
  /**
   * Controller main function
   */
  public function execute(){
    if(!Session::canManagePosts()){
      Response::sendUnauthorizedResponse();
    }

    $data = Request::getPayload();

    $session = Session::getAdminSession();

    $newPost = new PostModel();
    $newPost->setTitle($data['title']);
    $newPost->setContent($data['content']);
    $newPost->setImage($data['image']);
    $newPost->setAdminId($session['id']);

    $error = $newPost->validate(false);
    if($error){
      Response::sendErrorResponse($error);
    }

    PostRepository::insertPost($newPost);

    Response::sendJsonResponse();
  }
}
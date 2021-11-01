<?php

namespace App\Controllers\Posts;

use App\Repository\PostRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class PostsPut {
  /**
   * Controller main function
   */
  public function execute(){
    if(!Session::canManagePosts()){
      Response::sendUnauthorizedResponse();
    }

    $data = Request::getPayload();

    if(!isset($data['id'])){
      Response::sendErrorResponse("Informe um ID");
    }
    
    $post = PostRepository::getPost($data['id']);

    if(!$post){
      Response::sendNotFoundResponse();
    }

    $session = Session::getAdminSession();

    $post->setTitle($data['title']);
    $post->setContent($data['content']);
    $post->setImage($data['image']);
    $post->setAdminId($session['id']);

    $error = $post->validate(true);
    if($error){
      Response::sendErrorResponse($error);
    }


    PostRepository::updatePost($post);

    Response::sendJsonResponse();
  }
}
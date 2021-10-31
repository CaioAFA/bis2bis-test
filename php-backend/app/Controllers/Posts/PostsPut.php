<?php

namespace App\Controllers\Posts;

use App\Repository\PostRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class PostsPut {
  public function execute(){
    if(!Session::canManagePosts()){
      Response::sendUnhauthorizedResponse();
    }

    $data = Request::getPayload();

    $post = PostRepository::getPost($data['id']);

    if(!$post){
      Response::sendNotFoundResponse();
    }

    $session = Session::getAdminSession();

    $post->setTitle($data['title']);
    $post->setContent($data['content']);
    $post->setImage($data['image']);
    $post->setAdminId($session['id']);

    PostRepository::updatePost($post);

    Response::sendJsonResponse();
  }
}
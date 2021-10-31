<?php

namespace App\Controllers\Posts;

use App\Models\PostModel;
use App\Repository\PostRepository;
use App\Request\Request;
use App\Response\Response;
use App\Session\Session;

class PostsPost {
  public function execute(){
    $data = Request::getPayload();

    $session = Session::getAdminSession();

    $newPost = new PostModel();
    $newPost->setTitle($data['title']);
    $newPost->setContent($data['content']);
    $newPost->setImage($data['image']);
    $newPost->setAdminId($session['id']);

    PostRepository::insertPost($newPost);

    Response::sendJsonResponse();
  }
}
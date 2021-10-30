<?php

require __DIR__ . '/vendor/autoload.php';

use App\Models\PostModel;
use App\Repository\PostRepository;

$obPost = new PostModel;
$postRep = new PostRepository;

// Cadastro
// $obPost->title    = 'Algum Titulo';
// $obPost->admin_id = '1';
// $obPost->content = 'Algum conteúdo';
// $obPost->image = 'alguma-imagem';
// $postRep->insertPost($obPost);

// Get All
// $posts = $postRep->getPosts();
// echo print_r($posts, true);

// Get One
// $post = $postRep->getPost(1);
// echo print_r($post, true);

// Delete One
// $postRep->deletePost(2);

// Update
$obPost->id = 1;
$obPost->admin_id = '1';
$obPost->title    = 'Algum Titulo3';
$obPost->content = 'Algum conteúd3';
$obPost->image = 'alguma-image3';
$postRep->updatePost($obPost);
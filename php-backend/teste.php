<?php

require __DIR__ . '/vendor/autoload.php';

use App\Models\AdminModel;
use App\Models\PostModel;
use App\Repository\AdminRepository;
use App\Repository\PostRepository;

$obPost = new PostModel;
$postRep = new PostRepository;

$obAdmin = new AdminModel;
$adminRep = new AdminRepository;

// ------------------ POST ADMIN
// Cadastro
// $obAdmin->setName('Admin Criado');
// $obAdmin->setEmail('caio.a.1998@gmail.com');
// $obAdmin->setPassword('12345');
// $obAdmin->setCanManagePosts(false);
// $obAdmin->setCanManageUsers(false);
// $obAdmin->setCanManageDumps(false);
// $adminRep->insertAdmin($obAdmin);

// Get All
// $admins = $adminRep->getAdmins();
// echo print_r($admins, true);

// Get One
// $admin = $adminRep->getAdmin(5);
// echo print_r($admin, true);

// Delete one
// $adminRep->deleteAdmin(3);

// Update
// $obAdmin->setId(4);
// $obAdmin->setName('Admin Atualizado');
// $obAdmin->setEmail('admin.att@gmail.com');
// $obAdmin->setPassword('112312312');
// $obAdmin->setCanManagePosts(false);
// $obAdmin->setCanManageUsers(true);
// $obAdmin->setCanManageDumps(false);
// $adminRep->updateAdmin($obAdmin);

// ------------------ POST CRUD
// Cadastro
// $obPost->setTitle('Algum Titulo');
// $obPost->setAdminId('1');
// $obPost->setContent('Algum conteúdo');
// $obPost->setImage('alguma-imagem');
// $postRep->insertPost($obPost);

// Get All
// $posts = $postRep->getPosts();
// echo print_r($posts, true);

// Get One
// $post = $postRep->getPost(1);
// echo print_r($post, true);

// Delete One
// $postRep->deletePost(4);

// Update
// $obPost->setId(7);
// $obPost->setAdminId('1');
// $obPost->setTitle('Algum Titulo5');
// $obPost->setContent('Algum conteúd5');
// $obPost->setImage('alguma-image5');
// $postRep->updatePost($obPost);
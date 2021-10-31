<?php

namespace App\Session;

class Session {
  public static function createAdminSession(\App\Models\AdminModel $admin){
    $_SESSION['admin']['isLoggedIn'] = true;

    $_SESSION['admin']['id'] = $admin->getId();

    $_SESSION['admin']['permissions'] = [
      'canManageUsers' => $admin->getCanManageUsers(),
      'canManagePosts' => $admin->getCanManagePosts(),
      'canManageDumps' => $admin->getCanManageDumps(),
    ];
  }

  public static function getAdminSession(){
    if(isset($_SESSION['admin'])){
      return $_SESSION['admin'];
    }

    return false;
  }

  public static function initSession(){
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    session_set_cookie_params(
      0,
      '/',
      '.teste-bis2bis.com.br',
      false,
      false
    );
    session_start();
  }
}
// echo print_r($_SESSION, true);

// if(isset($_SESSION["newsession"])){
//   $_SESSION["newsession"] = $_SESSION["newsession"] . 'def';
// }
// else{
//   $_SESSION["newsession"] = 'abc ';
// }

// echo $_SESSION["newsession"];
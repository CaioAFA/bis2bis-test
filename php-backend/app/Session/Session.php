<?php

namespace App\Session;

class Session {
  /**
   * Create session to logged admin
   * @param \App\Models\AdminModel $admin
   */
  public static function createAdminSession(\App\Models\AdminModel $admin){
    $_SESSION['admin']['isLoggedIn'] = true;

    $_SESSION['admin']['id'] = $admin->getId();

    $_SESSION['admin']['permissions'] = [
      'canManageUsers' => $admin->getCanManageUsers() ? true : false,
      'canManagePosts' => $admin->getCanManagePosts() ? true : false,
      'canManageDumps' => $admin->getCanManageDumps() ? true : false,
    ];
  }

  /**
   * Retrieve session data from logged admin
   * 
   * @return mixed
   */
  public static function getAdminSession(){
    if(isset($_SESSION['admin'])){
      return $_SESSION['admin'];
    }

    return false;
  }

  /**
   * Configure the admin session
   */
  public static function initSession(){
    // Required methods to login
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');

    session_set_cookie_params(
      0,
      '/',
      '.localhost',
      false,
      false
    );

    session_start();
  }

  /**
   * Does logged admin can manage posts?
   * 
   * @return boolean
   */
  public static function canManagePosts(){
    return $_SESSION['admin']['permissions']['canManagePosts'];
  }

  /**
   * Does logged admin can manage users?
   * 
   * @return boolean
   */
  public static function canManageUsers(){
    return $_SESSION['admin']['permissions']['canManageUsers'];
  }

  /**
   * Does logged admin can manage dumps?
   * 
   * @return boolean
   */
  public static function canManageDumps(){
    return $_SESSION['admin']['permissions']['canManageDumps'];
  }
}

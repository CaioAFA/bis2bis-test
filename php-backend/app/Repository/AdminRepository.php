<?php

namespace App\Repository;

use \App\Db\Database;
use \PDO;

class AdminRepository {

  public function insertAdmin(\App\Models\AdminModel $admin){
    $adminDatabase = new Database('admin');
    
    $admin->setId(
      $adminDatabase->insert([
        'name' => $admin->getName(),
        'email' => $admin->getEmail(),
        'password' => $admin->getPassword(),
        'can_manage_posts' => $admin->getCanManagePosts() ? 1 : 0,
        'can_manage_users' => $admin->getCanManageUsers() ? 1 : 0,
        'can_manage_dumps' => $admin->getCanManageDumps() ? 1 : 0,
      ])
    );

    return true;
  }

  public static function getAdmins($where = null, $order = null, $limit = null){
    return (new Database('admin'))->select($where, $order, $limit)
                                  ->fetchAll(PDO::FETCH_CLASS,\App\Models\AdminModel::class);
  }

  public static function getAdmin($id){
    return (new Database('admin'))->select('id = ' . $id)
                                  ->fetchObject(\App\Models\AdminModel::class);
  }

  public function deleteAdmin($id){
    return (new Database('admin'))->delete('id = ' . $id);
  }

  public function updateAdmin(\App\Models\AdminModel $admin){
    return (new Database('admin'))->update('id = ' . $admin->getId(), [
      'name' => $admin->getName(),
      'email' => $admin->getEmail(),
      'password' => $admin->getPassword(),
      'can_manage_posts' => $admin->getCanManagePosts() ? 1 : 0,
      'can_manage_users' => $admin->getCanManageUsers() ? 1 : 0,
      'can_manage_dumps' => $admin->getCanManageDumps() ? 1 : 0,
    ]);
  }

}
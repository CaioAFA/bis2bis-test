<?php

namespace App\Repository;

use \App\Db\Database;
use \PDO;

class AdminRepository {
	/**
	 * Insert admin to database
	 * @param \App\Models\AdminModel $admin
	 */
  public static function insertAdmin(\App\Models\AdminModel $admin){
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
  }

	/**
	 * Get all admins from database
	 * @param string $where
	 * @param string $order
	 * @param string $limit
   * 
   * @return array \App\Models\AdminModel
	 */
  public static function getAdmins($where = null, $order = null, $limit = null){
    return (new Database('admin'))->select($where, $order, $limit)
                                  ->fetchAll(PDO::FETCH_CLASS,\App\Models\AdminModel::class);
  }

	/**
	 * Get one admins from database by id
	 * @param int $id
   * 
   * @return \App\Models\AdminModel
	 */
  public static function getAdmin($id){
    return (new Database('admin'))->select('id = ' . $id)
                                  ->fetchObject(\App\Models\AdminModel::class);
  }

	/**
	 * Delete one admins from database by id
	 * @param int $id
   * 
   * @return boolean
	 */
  public static function deleteAdmin($id){
    return (new Database('admin'))->delete('id = ' . $id);
  }

	/**
	 * Update one admin from database
	 * @param \App\Models\AdminModel $admin
   * 
   * @return boolean
	 */
  public static function updateAdmin(\App\Models\AdminModel $admin){
    return (new Database('admin'))->update('id = ' . $admin->getId(), [
      'name' => $admin->getName(),
      'email' => $admin->getEmail(),
      'password' => $admin->getPassword(),
      'can_manage_posts' => $admin->getCanManagePosts() ? 1 : 0,
      'can_manage_users' => $admin->getCanManageUsers() ? 1 : 0,
      'can_manage_dumps' => $admin->getCanManageDumps() ? 1 : 0,
    ]);
  }

	/**
	 * Get one admin by email
	 * @param string $email
   * 
   * @return boolean
	 */
  public static function getAdminByEmail($email){
    $where = "email = '$email'";
    return (new Database('admin'))->select($where)
                                    ->fetchObject(\App\Models\AdminModel::class);
  }
}
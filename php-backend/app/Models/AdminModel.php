<?php

namespace App\Models;

class AdminModel {

  private $id;
  private $name;
  private $email;
  private $password;
  private $can_manage_posts;
  private $can_manage_users;
  private $can_manage_dumps;

  public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getCanManagePosts(){
		return $this->can_manage_posts;
	}

	public function setCanManagePosts($can_manage_posts){
		$this->can_manage_posts = $can_manage_posts;
	}

	public function getCanManageUsers(){
		return $this->can_manage_users;
	}

	public function setCanManageUsers($can_manage_users){
		$this->can_manage_users = $can_manage_users;
	}

	public function getCanManageDumps(){
		return $this->can_manage_dumps;
	}

	public function setCanManageDumps($can_manage_dumps){
		$this->can_manage_dumps = $can_manage_dumps;
	}

	public function toArray(){
		return [
			'id' => $this->getId(),
			'name' => $this->getName(),
			'email' => $this->getEmail(),
			'password' => $this->getPassword(),
			'canManagePosts' => $this->getCanManagePosts(),
			'canManageUsers' => $this->getCanManageUsers(),
			'canManageDumps' => $this->getCanManageDumps()
		];
	}
}
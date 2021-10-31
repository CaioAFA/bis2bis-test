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
			'canManagePosts' => $this->getCanManagePosts() ? true : false,
			'canManageUsers' => $this->getCanManageUsers() ? true : false,
			'canManageDumps' => $this->getCanManageDumps() ? true : false
		];
	}

	public function validate($isEditing = false){
		if($isEditing && !$this->getId()){
			return "ID não pode ser vazio";
		}

		if(!strlen($this->getName())){
			return "Nome não pode ser vazio";
		}
		
		if(!strlen($this->getEmail())){
			return "E-mail não pode ser vazio";
		}

		if(!$isEditing && !strlen($this->getPassword())){
			return "Senha não pode ser vazia";
		}

		if(!$this->getCanManagePosts() && !$this->getCanManageUsers() && !$this->getCanManageDumps()){
			return "Administrador deve ter ao menos uma permissão";
		}

		return null;
	}
}
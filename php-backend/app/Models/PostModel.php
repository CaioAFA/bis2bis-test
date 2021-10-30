<?php

namespace App\Models;

class PostModel {

  /**
   * Identificador único da vaga
   * @var integer
   */
  private $id;
  private $admin_id;
  private $title;
  private $content;
  private $image;
  private $created_at;
  private $edited_at;

  public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getAdminId(){
		return $this->admin_id;
	}

	public function setAdminId($admin_id){
		$this->admin_id = $admin_id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getContent(){
		return $this->content;
	}

	public function setContent($content){
		$this->content = $content;
	}

	public function getImage(){
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
	}

	public function getCreatedAt(){
		return $this->created_at;
	}

	public function setCreatedAt($created_at){
		$this->created_at = $created_at;
	}

	public function getEditedAt(){
		return $this->edited_at;
	}

	public function setEditedAt($edited_at){
		$this->edited_at = $edited_at;
	}

	public function toArray(){
		return [
			'id' => $this->getId(),
			'adminId' => $this->getAdminId(),
			'title' => $this->getTitle(),
			'content' => $this->getContent(),
			'image' => $this->getImage(),
			'createdAt' => $this->getCreatedAt(),
			'editedAt' => $this->getEditedAt(),
		];
	}
}
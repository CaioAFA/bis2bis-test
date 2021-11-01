<?php

namespace App\Models;

class PostModel {

  /**
   * Post id
   * @var integer
   */
  private $id;

	/**
	 * Admin id (author)
	 * @var boolean
	 */
	private $admin_id;

	/**
	 * Post title
	 * @var string
	 */
	private $title;

	/**
	 * Post content
	 * @var string
	 */
	private $content;

	/**
	 * Post Image URL
	 * @var string
	 */
	private $image;

	/**
	 * Post created date
	 * @var string
	 */
	private $created_at;

	/**
	 * Post edited date
	 * @var string
	 */
	private $edited_at;

	/**
	 * Post author name
	 * @var string
	 */
	private $author_name;

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

	public function getAuthorName(){
		return $this->author_name;
	}

	public function setAuthorName($author_name){
		$this->author_name = $author_name;
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
			'authorName' => $this->getAuthorName()
		];
	}

	public function validate($isEditing = false){
		if($isEditing && !$this->getId()){
			return "ID não pode ser vazio";
		}

		if(!$this->getAdminId()){
			return "Admin Id não pode ser vazio";
		}
		
		if(!strlen($this->getTitle())){
			return "Título não pode ser vazio";
		}

		if(!strlen($this->getContent())){
			return "Conteúdo não pode ser vazio";
		}

		return null;
	}
}
<?php

namespace App\Repository;

use \App\Db\Database;
use \PDO;

class PostRepository {
  /**
   * Método responsável por cadastrar uma nova vaga no banco
   * @return boolean
   */
  public static function insertPost(\App\Models\PostModel $post){
    $post->setCreatedAt(date('Y-m-d H:i:s'));
    $post->setEditedAt(date('Y-m-d H:i:s'));

    $obDatabase = new Database('post');
    $post->setId(
      $obDatabase->insert([
        'admin_id' => $post->getAdminId(),
        'title' => $post->getTitle(),
        'content' => $post->getContent(),
        'image' => $post->getImage(),
        'created_at' => $post->getCreatedAt(),
        'edited_at' => $post->getEditedAt(),
      ])
    );

    return true;
  }

  /**
   * Método responsável por obter as vagas do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getPosts($where = null, $order = null, $limit = null){
    return (new Database('post'))->selectWithInnerJoin('admin', 'id', 'admin_id', $where, $order, $limit, 'first_table.*, second_table.name')
                                  ->fetchAll(PDO::FETCH_CLASS,\App\Models\PostModel::class);
  }

  public static function getPost($id){
    return (new Database('post'))->selectWithInnerJoin('admin', 'id', 'admin_id', 'first_table.id = ' . $id, null, null, 'first_table.*, second_table.name')
                                  ->fetchObject(\App\Models\PostModel::class);
  }

  /**
   * Método responsável por excluir a vaga do banco
   * @return boolean
   */
  public static function deletePost($postId){
    return (new Database('post'))->delete('id = ' . $postId);
  }

  /**
   * Método responsável por atualizar a vaga no banco
   * @return boolean
   */
  public static function updatePost(\App\Models\PostModel $post){
    $post->setEditedAt(date('Y-m-d H:i:s'));

    return (new Database('post'))->update('id = ' . $post->getId(), [
      'admin_id' => $post->getAdminId(),
      'title' => $post->getTitle(),
      'content' => $post->getContent(),
      'image' => $post->getImage(),
      'edited_at' => $post->getEditedAt(),
    ]);
  }

}
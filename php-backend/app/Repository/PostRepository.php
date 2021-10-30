<?php

namespace App\Repository;

use \App\Db\Database;
use \PDO;

class PostRepository {
  /**
   * Método responsável por cadastrar uma nova vaga no banco
   * @return boolean
   */
  public function insertPost(\App\Models\PostModel $post){
    $post->created_at = date('Y-m-d H:i:s');
    $post->edited_at = date('Y-m-d H:i:s');

    $obDatabase = new Database('post');
    $post->id = $obDatabase->insert([
      'admin_id' => $post->admin_id,
      'title' => $post->title,
      'content' => $post->content,
      'image' => $post->image,
      'created_at' => $post->created_at,
      'edited_at' => $post->edited_at,
    ]);

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
    // return (new Database('post'))->select($where,$order,$limit)
    //                               ->fetchAll(PDO::FETCH_CLASS,\App\Models\PostModel::class);

    return (new Database('post'))->selectWithInnerJoin('admin', 'id', 'admin_id', $where, $order, $limit, 'first_table.*, second_table.name')
                                  ->fetchAll(PDO::FETCH_CLASS,\App\Models\PostModel::class);
  }

  /**
   * Método responsável por buscar uma vaga com base em seu ID
   * @param  integer $id
   * @return Vaga
   */
  public static function getPost($id){
    return (new Database('post'))->selectWithInnerJoin('admin', 'id', 'admin_id', 'first_table.id = ' . $id, null, null, 'first_table.*, second_table.name')
                                  ->fetchObject(self::class);
  }

  /**
   * Método responsável por excluir a vaga do banco
   * @return boolean
   */
  public function deletePost($postId){
    return (new Database('post'))->delete('id = ' . $postId);
  }

  /**
   * Método responsável por atualizar a vaga no banco
   * @return boolean
   */
  public function updatePost(\App\Models\PostModel $post){
    $post->edited_at = date('Y-m-d H:i:s');

    return (new Database('post'))->update('id = ' . $post->id, [
      'admin_id' => $post->admin_id,
      'title' => $post->title,
      'content' => $post->content,
      'image' => $post->image,
      'edited_at' => $post->edited_at,
    ]);
  }

}
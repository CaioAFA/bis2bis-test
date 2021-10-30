<?php

namespace App\Models;

use \App\Db\Database;
use \PDO;

class PostModel {

  /**
   * Identificador único da vaga
   * @var integer
   */
  public $id;
  public $admin_id;
  public $title;
  public $content;
  public $image;
  public $created_at;
  public $edited_at;
}
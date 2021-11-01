<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

  /**
   * Database host
   * @var string
   */
  private $HOST = 'localhost';

  /**
   * Database name
   * @var string
   */
  private $NAME = 'cb_blog';

  /**
   * Database user
   * @var string
   */
  private $USER = 'admin';

  /**
   * Database user password
   * @var string
   */
  private $PASS = 'admin';

  /**
   * Database table name
   * @var string
   */
  private $table;

  /**
   * Database connection instane
   * @var PDO
   */
  private $connection;

  /**
   * Create the connection instance
   * @param string $table
   */
  public function __construct($table = null){
    $this->table = $table;
    $this->HOST = \App\Env\Env::$DB_HOST;
    $this->NAME = \App\Env\Env::$DB_NAME;
    $this->USER = \App\Env\Env::$DB_USER;
    $this->PASS = \App\Env\Env::$DB_PASS;
    $this->setConnection();
  }

  /**
   * Create a database connection
   */
  private function setConnection(){
    try{
      $this->connection = new PDO('mysql:host='.$this->HOST.';dbname='.$this->NAME,$this->USER,$this->PASS);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * Execute a query
   * @param  string $query
   * @param  array  $params
   * @return PDOStatement
   */
  public function execute($query,$params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * Insert data on database
   * @param  array $values [ field => value ]
   * @return integer Inserted Id
   */
  public function insert($values){
    // Query data
    $fields = array_keys($values);
    $binds  = array_pad([],count($fields),'?');

    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
    $this->execute($query,array_values($values));

    return $this->connection->lastInsertId();
  }

  /**
   * Execute a search query
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @param  string $fields
   * @return PDOStatement
   */
  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    // Prepare query
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    return $this->execute($query);
  }

  /**
   * Do a search query with inner join
   * @param  string $secondTable
   * @param  string $secondTableOnField
   * @param  string $firstTableOnField
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @param  string $fields
   * @return PDOStatement
   */
  public function selectWithInnerJoin($secondTable, $secondTableOnField, $firstTableOnField, $where = null, $order = null, $limit = null, $fields = '*'){
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    // Prepare query
    $query = 'SELECT ' . $fields .
             ' FROM ' . $this->table . ' first_table' . 
             ' LEFT JOIN ' . $secondTable . ' second_table' .
             '    ON first_table.' . $firstTableOnField . ' = second_table.' . $secondTableOnField .
             ' ' . $where.' '.$order.' '.$limit;

    return $this->execute($query);
  }

  /**
   * Execute database updates queries
   * @param  string $where
   * @param  array $values [ field => value ]
   * @return boolean
   */
  public function update($where,$values){
    // Query data
    $fields = array_keys($values);

    // Prepare query
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    $this->execute($query,array_values($values));

    return true;
  }

  /**
   * Execute delete queries
   * @param  string $where
   * @return boolean
   */
  public function delete($where){
    // Prepare query
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    $this->execute($query);

    return true;
  }

}

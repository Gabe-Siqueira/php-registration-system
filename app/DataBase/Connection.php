<?php

namespace App\DataBase;

use \PDO;
use \PDOException;

class Connection{

  /**
   * Database connection host
   * @var string
   */
  const HOST = 'localhost';

  /**
   * Name database
   * @var string
   */
  const NAME = 'php_registration_system';

  /**
   * User database
   * @var string
   */
  const USER = 'gabriel';

  /**
   * Password database
   * @var string
   */
  const PASS = 'Lemafehu1@#';

  /**
   * Table database
   * @var string
   */
  private $table;

  /**
   * Database connection instance
   * @var PDO
   */
  private $connection;

  /**
   * Define table and instance and connection
   * @param string $table
   */
  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  /**
   * Method responsible for creating a connection to the database
   */
  private function setConnection(){
    try{
      $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * Execute queries in the database
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
   * Insert database
   * @param  array $values [ field => value ]
   * @return integer ID insert
   */
  public function insert($values){
    // QUERY DATA
    $fields = array_keys($values);
    $binds  = array_pad([],count($fields),'?');

    // ASSEMBLE TO QUERY
    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

    // EXECUTE QUERY
    $this->execute($query,array_values($values));

    // RETURN ID INSERT
    return $this->connection->lastInsertId();
  }

  /**
   * Select database
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @param  string $fields
   * @return PDOStatement
   */
  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    // QUERY DATA
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    // ASSEMBLE TO QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    // EXECUTE QUERY
    return $this->execute($query);
  }

  /**
   * Update database
   * @param  string $where
   * @param  array $values [ field => value ]
   * @return boolean
   */
  public function update($where,$values){
    // QUERY DATA
    $fields = array_keys($values);

    // ASSEMBLE TO QUERY
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

    // EXECUTE QUERY
    $this->execute($query,array_values($values));

    // RETURN TRUE
    return true;
  }

  /**
   * Delete database
   * @param  string $where
   * @return boolean
   */
  public function delete($where){
    // ASSEMBLE TO QUERY
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    // EXECUTE QUERY
    $this->execute($query);

    // RETURN TRUE
    return true;
  }

}

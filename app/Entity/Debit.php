<?php

namespace App\Entity;

use \App\DataBase\Connection;
use \PDO;

class Debit{

  /**
   * Debit id
   * @var integer
   */
  public $id;

  /**
   * Id donor
   * @var string
   */
  public $id_donor;

  /**
   * Debit bank code
   * @var string
   */
  public $bank_code;

  /**
   * Debit bank name
   * @var string
   */
  public $bank_name;

  /**
   * Debit agency
   * @var string
   */
  public $agency;

  /**
   * Debit account
   * @var string
   */
  public $account;

  /**
   * Debit created date
   * @var string
   */
  public $created_date;

  // *METHODS*

  /**
   * Select
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function select($where = null, $order = null, $limit = null){
    return (new Connection('debit'))->select($where, $order, $limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Insert
   * @return boolean
   */
  public function insert(){
    // SET DATE
    $this->created_date = date('Y-m-d H:i:s');

    // INSERT DB
    $obDatabase = new Connection('debit');
    $this->id = $obDatabase->insert([
                                      'id_donor'                  => $this->id_donor,
                                      'bank_code'                 => $this->bank_code,
                                      'bank_name'                 => $this->bank_name,
                                      'agency'                    => $this->agency,
                                      'account'                   => $this->account,
                                      'created_date'              => $this->created_date
                                    ]);

    // RETURN
    return true;
  }

}
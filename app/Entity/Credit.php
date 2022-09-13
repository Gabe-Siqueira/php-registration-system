<?php

namespace App\Entity;

use \App\DataBase\Connection;
use \PDO;

class Credit{

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
   * Credit id_card_flag
   * @var string
   */
  public $id_card_flag;

  /**
   * Credit digits
   * @var string
   */
  public $digits;

  /**
   * Credit created date
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
    return (new Connection('credit'))->select($where, $order, $limit)
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
    $obDatabase = new Connection('credit');
    $this->id = $obDatabase->insert([
                                      'id_donor'                  => $this->id_donor,
                                      'id_card_flag'              => $this->id_card_flag,
                                      'digits'                    => $this->digits,
                                      'created_date'              => $this->created_date
                                    ]);

    // RETURN
    return true;
  }

   /**
   * List
   * @return array
   */
  public static function validCardDigits($sixDigits, $fourDigits){
    return (new Connection('credit'))->execute("SELECT * FROM credit WHERE digits LIKE '". $sixDigits ."%' AND digits LIKE '%". $fourDigits ."';")
                                              ->fetchAll(PDO::FETCH_CLASS,self::class);

  }

}
<?php

namespace App\Entity;

use \App\DataBase\Connection;
use \PDO;

class DonationInterval{

  /**
   * DonationInterval id
   * @var integer
   */
  public $id;

  /**
   * DonationInterval name
   * @var string
   */
  public $name;

  // *METHODS*

  /**
   * Select
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function select($where = null, $order = null, $limit = null){
    return (new Connection('donation_interval'))->select($where, $order, $limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

}
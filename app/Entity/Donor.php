<?php

namespace App\Entity;

use \App\DataBase\Connection;
use \PDO;

class Donor{

  /**
   * Donor id
   * @var integer
   */
  public $id;

  /**
   * Donor name
   * @var string
   */
  public $name;

  /**
   * Donor email
   * @var string
   */
  public $email;

  /**
   * Donor cpf
   * @var string
   */
  public $cpf;

  /**
   * Donor phone
   * @var string
   */
  public $phone;

  /**
   * Donor birth date
   * @var string
   */
  public $birth_date;

  /**
   * Id donation interval
   * @var integer
   */
  public $id_donation_interval;

  /**
   * Donation_amount
   * @var string
   */
  public $donation_amount;

  /**
   * Donor address
   * @var string
   */
  public $address;

  /**
   * Created data
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
    return (new Connection('donor'))->select($where, $order, $limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

   /**
   * List
   * @return array
   */
  public static function list(){
    return (new Connection('donor'))->execute("select 
                                                donor.id as id, 
                                                donor.name as name,
                                                donor.email as email, 
                                                donor.cpf as cpf, 
                                                donor.phone as phone, 
                                                donor.birth_date as birth_date, 
                                                donation_interval.name as donation_interval,
                                                donor.donation_amount as donation_amount,
                                                form_payment.name as form_payment,
                                                donor.address as address,
                                                donor.created_date as created_date 
                                              from 
                                                donor
                                              inner join donation_interval on donor.id_donation_interval = donation_interval.id
                                              inner join form_payment on donor.id_form_payment = form_payment.id;")
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
    $obDatabase = new Connection('donor');
    $this->id = $obDatabase->insert([
                                      'name'                    => $this->name,
                                      'email'                   => $this->email,
                                      'cpf'                     => $this->cpf,
                                      'phone'                   => $this->phone,
                                      'birth_date'              => $this->birth_date,
                                      'address'                 => $this->address,
                                      'id_donation_interval'    => $this->id_donation_interval,
                                      'donation_amount'         => $this->donation_amount,
                                      'id_form_payment'         => $this->id_form_payment,
                                      'created_date'            => $this->created_date
                                    ]);

    // RETURN
    return $this->id;
  }

}
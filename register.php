<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Doador');

use \App\Entity\Donor;
use \App\Entity\FormPayment;
use \App\Entity\DonationInterval;

$donor = new Donor;
$formPayment = new FormPayment;
$donationInterval = new DonationInterval;

$id_form_payment = $formPayment->select();
$id_donation_interval = $donationInterval->select();

//VALIDAÇÃO DO POST
if(isset($_POST['name'], $_POST['email'], $_POST['cpf'], $_POST['phone'], $_POST['birth_date'], $_POST['address'], $_POST['id_donation_interval'], $_POST['donation_amount'], $_POST['id_form_payment'])){

  $donor->name                      = $_POST['name'];
  $donor->email                     = $_POST['email'];
  $donor->cpf                       = $_POST['cpf'];
  $donor->phone                     = $_POST['phone'];
  $donor->birth_date                = $_POST['birth_date'];
  $donor->address                   = $_POST['address'];
  $donor->id_donation_interval      = $_POST['id_donation_interval'];
  $donor->donation_amount           = $_POST['donation_amount'];
  $donor->id_form_payment           = $_POST['id_form_payment'];
  $lastID = $donor->insert();

  if ($_POST['id_form_payment'] == "1") {
    header('location: debit.php?id='. $lastID .'');
  }else if($_POST['id_form_payment'] == "2"){
    header('location: credit.php?id='. $lastID .'');
  }

  // header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form.php';
include __DIR__.'/includes/footer.php';
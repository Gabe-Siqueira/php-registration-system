<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Pagamento - Débito');

use \App\Entity\Debit;

$debit = new Debit;

//VALIDAÇÃO DO POST
if(isset($_GET['id'], $_POST['bank_code'], $_POST['bank_name'], $_POST['agency'], $_POST['account'])){

    $debit->id_donor                        = $_GET['id'];
    $debit->bank_code                       = $_POST['bank_code'];
    $debit->bank_name                       = $_POST['bank_name'];
    $debit->agency                          = $_POST['agency'];
    $debit->account                         = $_POST['account'];
    $debit->insert();
  
    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formDebit.php';
include __DIR__.'/includes/footer.php';
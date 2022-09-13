<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Pagamento - Crédito');

use \App\Entity\Credit;
use \App\Entity\CardFlag;

$credit = new Credit;
$cardFlag = new CardFlag;

$flag = $cardFlag->select();

//VALIDAÇÃO DO POST
if(isset($_GET['id'], $_POST['id_card_flag'], $_POST['digits'])){

    $validCardDigits = $credit->validCardDigits(substr($_POST['digits'], 0, 6), substr($_POST['digits'], -1, 4));

    if (count($validCardDigits) > 0) {
        $message = '<div class="alert alert-danger">Não foi possível cadastrar esse número de cartão, entre em contato com o seu supervisor.</div>';
    }else{
        $credit->id_donor                       = $_GET['id'];
        $credit->id_card_flag                   = $_POST['id_card_flag'];
        $credit->digits                         = $_POST['digits'];
        $credit->insert();
    
        header('location: index.php?status=success');
        exit;
    }
    
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formCredit.php';
include __DIR__.'/includes/footer.php';
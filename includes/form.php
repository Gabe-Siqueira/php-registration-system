<?php

// INPUT SELECT DONATION INTERVAL
$resultDonationInterval = '';
foreach ($id_donation_interval as $value) {
    $resultDonationInterval .= '<option value="'.$value->id.'" > '.$value->name.'</option>';
}

if (!$resultDonationInterval) {
    $resultDonationInterval = '<option disabled="true" value="">Nenhum dado encontrado</option>';
}


// INPUT FORM PAYMENT
$resultFormPayment = '';
foreach ($id_form_payment as $value) {
    $resultFormPayment .= '<div class="form-check form-check-inline">
                                <label class="form-control">
                                    <input type="radio" id="id_form_payment" name="id_form_payment" value="'. $value->id .'" required > '. $value->name.'
                                </label>
                            </div>';
}

?>

<main>
    <div class="container">
        <a href="index.php">
            <button class="btn btn-secondary">Voltar</button>
        </a>
        <h2 class="mt-3"><?=TITLE?></h2>
        <form method="post">

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" class="form-control" name="name" maxlength="255" required >
            </div>

            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" class="form-control" name="email" maxlength="255" required >
            </div>

            <div class="form-group">
                <label>CPF:</label>
                <input type="number" class="form-control" id="cpf" name="cpf" max="99999999999" required >
            </div>

            <div class="form-group">
                <label>Telefone:</label>
                <input type="tel" class="form-control phone-ddd-mask" name="phone" max="99999999999" required >
            </div>

            <div class="form-group">
                <label>Data Nascimento:</label>
                <input type="date" class="form-control" name="birth_date" required >
            </div>

            <div class="form-group">
                <label>Endereço:</label>
                <input type="text" class="form-control" name="address" maxlength="255" required >
            </div>

            <div class="form-group">
                <label for="id_donation_interval">Intervalo Doação:</label>
                <select class="form-control" name="id_donation_interval" id="id_donation_interval" required>
                    <?=$resultDonationInterval?>
                </select>
            </div>

            <div class="form-group">
                <label>Valor:</label>
                <input type="number" step="0.01" id="donation_amount" name="donation_amount" class="form-control" min="0" required /> 
            </div>

            <div class="form-group">
                <label>Forma de Pagamento:</label>
                <div>
                    <?=$resultFormPayment?>
                </div>
            </div>            

            <section>
                <div class="row">                    
                    <div class="form-group ml-3">
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>                
                </div>
            </section>

        </form>
    </div>
</main>

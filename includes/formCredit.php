<?php

// INPUT SELECT CARD FLAG
$resultCardFlag = '';
foreach ($flag as $value) {
    $resultCardFlag .= '<option value="'.$value->id.'" > '.$value->name.'</option>';
}

if (!$resultCardFlag) {
    $resultCardFlag = '<option disabled="true" value="">Nenhum dado encontrado</option>';
}

?>

<main>
    <?=$message?>
    <div class="container">
        <h2 class="mt-3"><?=TITLE?></h2>
        <form method="post">

            <div class="form-group">
                <label for="id_card_flag">Bandeira Cartão:</label>
                <select class="form-control" name="id_card_flag" id="id_card_flag" required >
                    <?=$resultCardFlag?>
                </select>
            </div>

            <div class="form-group">
                <label>Digitos Cartão:</label>
                <input type="number" class="form-control" name="digits" min="0000000000000001" max="9999999999999999" required >
            </div>

            <section>
                <div class="row">                    
                    <div class="form-group ml-3">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>                
                </div>
            </section>

        </form>
    </div>
</main>


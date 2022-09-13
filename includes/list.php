<?php

$message = '';
if(isset($_GET['status'])){
    switch ($_GET['status']) {
        case 'success':
        $message = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

        case 'error':
        $message = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
}

$result = '';
foreach($list as $value){
$result .= '<tr>
                <td>'.$value->id.'</td>
                <td>'.$value->name.'</td>
                <td>'.$value->email.'</td>
                <td>'.$value->cpf.'</td>
                <td>'.$value->phone.'</td>
                <td>'.date('d/m/Y',strtotime($value->birth_date)).'</td>
                <td>'.$value->address.'</td>
                <td>'.$value->donation_interval.'</td>
                <td>R$ '.$value->donation_amount.'</td>
                <td>'.$value->form_payment.'</td>
                <td>'.date('d/m/Y à\s H:i:s',strtotime($value->created_date)).'</td>
            </tr>';
}

$result = strlen($result) ? $result : '<tr>
                                        <td colspan="12" class="text">
                                            Nenhum dado encontrado.
                                        </td>
                                    </tr>';

?>

<main>

    <?=$message?>

    <section>
        <a href="register.php">
            <button class="btn btn-success">Cadastrar</button>
        </a>
        <a href="logic.php">
            <button class="btn btn-primary">Lógica</button>
        </a>
    </section>

    <section>
        <div class="table-responsive">
            <table class="table bg-light mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Data Nascimento</th>
                    <th>Endereço</th>
                    <th>Intervalo Doação</th>
                    <th>Valor</th>
                    <th>Forma Pagamento</th>
                    <th>Data Cadastro</th>
                </tr>
                </thead>
                <tbody>
                    <?=$result?>
                </tbody>
            </table>
        </div>
    </section>

</main>
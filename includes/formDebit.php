<main>
    <div class="container">
        <h2 class="mt-3"><?=TITLE?></h2>
        <form method="post">

            <div class="form-group">
                <label>Código Banco:</label>
                <input type="number" class="form-control" name="bank_code" max="9999" required >
            </div>

            <div class="form-group">
                <label>Nome Banco:</label>
                <input type="text" class="form-control" name="bank_name" maxlength="255" required >
            </div>

            <div class="form-group">
                <label>Agência:</label>
                <input type="number" class="form-control" name="agency" max="9999" required >
            </div>

            <div class="form-group">
                <label>Conta:</label>
                <input type="number" class="form-control" name="account" max="99999999" required >
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


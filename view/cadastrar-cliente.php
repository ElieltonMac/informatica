<div class="box-cadastro-cliente">
    <div class="box-form-cliente">
        <form method="POST" class="form-cliente">
            <label for="nome-cliente">Nome</label><input class="data-cliente" id="nome-cliente" type="text" name="nome-cliente">
            <label for="cpf-cliente">Cpf/Cnpj</label><input class="data-cliente" id="cpf-cnpj" type="text" name="cpf-cliente">
            <!--<label for="whats-cliente">Whatsapp</label><input class="data-cliente" id="whats-cliente" type="text" name="whats-cliente">
            <label for="rua">Rua</label><input class="data-cliente" id="rua" type="text" name="rua">
            <label for="bairro">Bairro</label><input class="data-cliente" id="bairro" type="text" name="bairro">
            <label for="numero-casa">Número</label><input class="data-cliente" id="num-casa" type="text" name="numero-casa">-->
            <div class="resposta-servidor-cliente"><p><?= $msg ?></p></div>
            <div class="buttons">
                <div class="form-buttons">
                    <input class="btn-form-cliente" id="btn-salvar-cliente" type="submit" name="btn-salvar-cliente" value="Cadastrar">
                    <a href="?pagina=cadastrar-os"><input class="btn-form-cliente" type="button" name="voltar" value="Voltar"></a>
                </div>
            </div>
        </form>
    </div>
</div>
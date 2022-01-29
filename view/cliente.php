<?php
    $id = filter_input(INPUT_GET, "id");
    $cliente = $clienteDao->retornaCliente($id);
?>

<div class="default-flex container-cliente">
    <div class="default-flex box-cliente">
        <form class="default-flex form-altera-cliente" method="POST">
            <div class="default-flex form-altera-cliente-row">
                <label for="id-cliente">ID</label><input id="id-cliente" type="number" name="id-cliente" value="<?= $id ?>" readonly><br>
            </div>
            <div class="default-flex form-altera-cliente-row">
                <label for="nome-cliente">Nome</label><input id="nome-cliente" type="text" name="nome-cliente" value="<?= $cliente["nome_cliente"] ?>" >
            </div>
            <div class="default-flex form-altera-cliente-row">
                <label for="cpf_cnpj">CPF/CNPJ</label><input id="cpf-cnpj" type="text" name="cpf_cnpj" value="<?= $cliente["cpf_cnpj"] ?>">
            </div>
            <div class="default-flex form-buttons-altera-cliente">
                <input type="submit" id="btn-salvar-altera-cliente" class="btn-form-altera-cliente" name="btn-altera-cliente" value="Salvar">
                <a class="btn-form-altera-cliente" href="?pagina=lista-clientes"><input id="btn-voltar-cliente" type="button" value="Voltar"></a>
            </div>
        </form>
    </div>
</div>
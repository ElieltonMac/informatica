<?php
    $id = filter_input(INPUT_GET, "id");
    $usuario = $usuarioDao->retornaUsuarioSolo($id);
?>

<div class="default-flex container-usuario">
    <div class="default-flex box-usuario">
        <form class="default-flex form-altera-usuario" method="POST">
            <div class="default-flex form-altera-usuario-row">
                <label for="id-usuario">Usuário</label><input id="id-usuario" type="text" name="id-usuario" value="<?= $id ?>" readonly><br>
            </div>
            <div class="default-flex form-altera-usuario-row">
                <label for="nova-senha-usuario">Nova Senha</label><input id="nova-senha-usuario" type="text" name="nova-senha-usuario">
            </div>
            <div class="default-flex form-buttons-altera-usuario">
                <!--<input type="submit" id="btn-salvar-altera-usuario" class="btn-form-altera-usuario" name="btn-altera-cliente" value="Salvar">-->
                <a class="btn-form-altera-usuario" href="?pagina=lista-usuarios"><input id="btn-voltar-usuario" type="button" value="Voltar"></a>
                <input class="btn-form-altera-usuario" id="btn-excluir-usuario" type="button" name="btn-excluir-usuario" value="Excluir" onClick="excluirUsuario()">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="/informatica/js/ajax.js"></script>
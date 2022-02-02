<div class="default-flex container-cad-user">
    <div class="default-flex content-cad-user">
        <form class="default-flex form-cadastra-user" method="POST">
            <label for="usuario">Usuário</label><input id="nome-usuario" type="text" name="usuario"><br>
            <label for="senha">Senha</label><input id="senha-usuario" type="text" name="senha">
            <div class="default-flex resposta-servidor-cad-user"><p><?= $msg ?></p></div>
            <div class="default-flex btn-cad-user">
                <input class="btn-form-cadastra-user" type="submit" id="btn-cad-user" name="btn-cad-user" value="Cadastrar">
                <a href="?pagina=lista-usuarios" class="btn-form-cadastra-user"><input id="btn-voltar-cad-user" type="button" value="Voltar"></a>
            </div>
        </form>
    </div>
</div>
<?php
    $id = filter_input(INPUT_GET, "id");
    $os = $solicitacaoDao->retornaOrdemDesc($id);
    $cliente = $solicitacaoDao->retornaClienteOs($os["cliente"]);
?>
<div class="default-flex container-ordem">
    <div class="default-flex box-ordem-conteudo">
        <div class="default-flex foto-equipamento">
            <img src="/informatica/imagens/my-pc.jpeg">
        </diV>
        <form class="form-altera-os" method="POST">
            <div class="default-flex ordem-descricao">
                <div class="default-flex form-row">
                    <label for="id-os">OS</label><br><input id="id-os" type="number" name="id-exclui-os" value="<?= $os["id_solicitacao"] ?>" readonly>
                    <label for="cliente">Cliente</label><input class="cliente" type="text" name="cliente" value="<?= $cliente["nome_cliente"] ?>" readonly>
                </div>
                <div class="default-flex form-row">
                    <label for="telefone">Telefone</label><input class="contato" id="telefone-view" type="text" name="telefone" value="<?= $os["telefone"] ?>" readonly>
                    <label for="whatsapp">Whatsapp</label><input class="contato" id="whatsapp-view" type="text" name="whatsapp" value="<?= $os["whatsapp"] ?>" readonly>
                </div>
                <div class="default-flex form-row">
                    <label for="equipamento">Equipamento</label><input class="equipamento-desc" id="equipamento-view" type="text" name="equipamento" value="<?= $os["equipamento"] ?>" readonly>
                    <label for="marca">Marca</label><input class="equipamento-desc" type="text" id="marca-view" name="marca" value="<?= $os["marca"] ?>" readonly>
                </div>
                <div class="default-flex form-row">
                    <label for="modelo">Modelo</label><input class="equipamento-desc" type="text" id="modelo-view" name="modelo" value="<?= $os["modelo"] ?>" readonly>
                </div>
                <div class="default-flex box-descricoes-os">
                    <div class="box-textarea-informacoes-os">
                        <label for="problema_info">Problema Informado</label>
                        <textarea name="problema-informado" id="problema-informado-view" maxlenght="200" rows="6" cols="22" readonly><?= $os["problema_info"] ?></textarea>
                    </div>
                    <div class="box-textarea-informacoes-os">
                        <label for="problema_constatado">Problema Constatado</label>
                        <textarea name="problema-constatado" id="problema-constatado-view" maxlenght="200" rows="6" cols="22" readonly><?= $os["problema_const"] ?></textarea>
                    </div>
                    <div class="box-textarea-informacoes-os">
                        <label for="observacoes">Observacoes</label>
                        <textarea name="observacoes" id="observacoes-view" maxlenght="200" rows="6" cols="22" readonly><?= $os["observacao"] ?></textarea>
                    </div>
                    <div class="box-textarea-informacoes-os">
                        <input type="button" class="buttons-view-os" value="Alterar" onClick="liberaAlteracaoOs()">
                        <input type="submit" name="btn-altera-os" class="buttons-view-os" value="Salvar">
                        <input type="button" name="btn-exclui-os" class="buttons-view-os" value="Excluir" onClick="excluirOrdem()">
                        <a class="default-flex" href="?pagina=lista-ordens"><input type="button" class="buttons-view-os" id="btn-voltar-os" value="Voltar"></a>
                    </div>
                </div>
            </div>
            <div class="default-flex resposta-server-ordem"><p><?= $msg ?></div>
        </form>     
    </div>
</div>
<script type="text/javascript" src="/informatica/js/ajax.js"></script>
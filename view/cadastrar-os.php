<?php 
    global $retorno; 
    $retorno = $solicitacaoDao->nextOs();
    $atendentes = $solicitacaoDao->retornaAtendentes();
    $clientes = $solicitacaoDao->retornaClientes();
?>

<div class="box-cadastro-os">
    <div class="box-form-cadastro-os">
        <form method="POST" class="default-flex form-cadastro-os">
            <label for="id-os">OS</label><input class='style-data-os' id='num-os' type='number' name='id-os' value='<?= $retorno + 1 ?>' readonly>
            <label for="atendente">Atendente</label><select class="style-data-os" name="atendente">
                <option></option>
                <?php
                    foreach($atendentes as $item){
                        echo "<option value='{$item['id_atendente']}'>{$item['nome_atendente']}</option>";
                    }
                ?>
            </select>
            <label for="cliente">Cliente</label><select class="style-data-os" id="select-cliente" name="cliente">
                <option></option>
                <?php
                    foreach($clientes as $item){
                        echo "<option value='{$item["id_cliente"]}'>{$item['nome_cliente']}</option>";
                    }
                ?>
            </select>
            <div class="icon-add-cliente">
                <a href="?pagina=cadastrar-cliente"><img src="/informatica/imagens/adicionar.png"></a>
            </div><br>
            <hr>
            <label for="num-celular">Contato</label><input class="style-data-os" id="num-celular" type="text" name="num-celular">
            <label for="num-whatsapp">Whatsapp</label><input class="style-data-os" id="num-whatsapp" type="text" name="num-whatsapp">
            <hr>
            <label for="equipamento">Equipamento</label><input class="style-data-os" id="equipamento" type="text" name="equipamento">
            <label for="marca">Marca</label><input class="style-data-os" id="marca" name="marca" type="text">
            <label for="modelo">Modelo</label><input class="style-data-os" id="modelo" name="modelo" type="text">
            <hr>
            <div class="box-descricoes-cados">
                <div class="box-textarea-informacoes-cados">
                    <label for="problema-informado">Problema Informado</label><br>
                    <textarea class="style-data-os" name="problema-informado" maxlenght="200" rows="6" cols="22"></textarea>
                </div>
                <div class="box-textarea-informacoes-cados">
                    <label for="problema-constatado">Problema Constatado</label><br>
                    <textarea class="style-data-os" name="problema-constatado" maxlenght="200" rows="6" cols="22"></textarea>
                </div>
                <div class="box-textarea-informacoes-cados">
                    <label for="observacoes">Observações</label><br>
                    <textarea class="style-data-os" name="observacoes" maxlenght="200" rows="6" cols="22"></textarea>
                </div>
            </div>
            <div class="resposta-servidor-cados">
                <p><?= $msg ?></p>
            </div>
            <div class="buttons">
                <div class="form-buttons">
                    <input class="btn-form-os" id="btn-salvar-os" type="submit" name="btn-salvar-os" value="Salvar">
                    <a href="?pagina=lista-ordens"><input class="btn-form-os" type="button" name="btn-cancelar" value="Cancelar" onClick="view('atendimento')"></a>
                </div>
            </div>
        </form>
    </div>
</div>


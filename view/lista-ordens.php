<?php
    global $ordens;
    $cliente;
    $ordens = $solicitacaoDao->retornaOrdens();
?>
<div class="box-modeling-order">
    <div class="box-icons">
        <a href="?pagina=cadastrar-os"> <img class="icon-modeling-order" src="/informatica/imagens/adicionar.png" alt="adicionar.png" ></a>
    </div>
</div>
<div class="default-flex container-search-os">
        <div class="default-flex form-search-os" id="form-search-os">
            <input id="input-search-os" type="text" name="searchOs">
            <button id="btn-search-os" onClick="pesquisaOrdem()"><span class="search-os-icon"><img src="/informatica/imagens/lupa.png"></span></button>
        </div>
</div>
<div class="box-filtros">
    <div class="filtros">
        <label for="ordem">Ordenar por: </label>
        <select name="ordem">
            <option value="0" selected>Mais recente</option>
            <option value="1">Nº identificação</option>
            <option value="2">Nome</option>
            <option value="3">Mais antigos</option>
        </select>
        <p>Exibir somente: </p>
        <label for="desktop">Desktop</label>
        <input type="checkbox" name="desktop">
        <label for="notebook">Notebook</label>
        <input type="checkbox" name="notebook">
        <label for="impressora">Impressora</label>
        <input type="checkbox" name="impressora">
    </div>
</div>
<div class="list-orders" id="list-orders">
    <?php
            foreach($ordens as $item){
                $cliente = $solicitacaoDao->retornaClienteOs($item["cliente"]);
                echo '<a href="?pagina=ordem&id=' . $item["id_solicitacao"] . '"><div class="order">';
                    echo '<div class="box-foto-equipamento">';
                        echo '<img class="img-equip" src="/informatica/imagens/pc.jpg">';
                    echo '</div>';
                    echo '<div class="box-desc-os">';
                        echo '<p><b>OS: </b>' . $item["id_solicitacao"] . '</p>';
                        echo '<p><b>Nome: </b>' . $cliente["nome_cliente"] . '</p>';
                        echo '<p><b>Whatsapp: </b>' . $item["whatsapp"] . '</p>';
                    echo '</div>';
                echo '</div></a>';
            }
    ?>
</div>
<script type="text/javascript" src="/informatica/js/ajax.js"></script>
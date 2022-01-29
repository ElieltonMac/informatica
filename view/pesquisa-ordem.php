<?php
    require_once("../dao/SolicitacaoDao.php");
    $solicitacaoDao = new SolicitacaoDao();
    if($_POST["searchOs"]){
        $item = filter_input(INPUT_POST, "searchOs", FILTER_SANITIZE_STRING);
        $ordens = $solicitacaoDao->pesquisaOrdem($item); 
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
    }
?>
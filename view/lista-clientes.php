<?php
    $clientes = $clienteDao->todosClientes();
?>

<div class="default-flex container-lista-cliente">
    <div class="default-flex box-lista-cliente">
        <table class="cliente-table">
            <tr id="cabecalho">
                <th>ID</th>
                <th>CLIENTE</th>
                <th>CPF/CNPJ</th>
            </tr>
            <?php
                foreach($clientes as $item){
                        echo "<tr class='dados-cliente'>";
                            echo "<td>{$item["id_cliente"]}</td>";
                            echo "<td>{$item["nome_cliente"]}</td>";
                            echo "<td>{$item["cpf_cnpj"]}</td>";
                            echo "<td><a href='?pagina=cliente&id=" . $item["id_cliente"] . "'><img src='imagens/lapis.png'></a></td>";
                        echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
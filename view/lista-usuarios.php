<?php
    $usuarios = $usuarioDao->retornaUsuarios();
?>

<div class="default-flex container-lista-cliente">
    <div class="default-flex box-lista-cliente">
        <table class="cliente-table">
            <tr id="cabecalho">
                <th>USUARIO</th>
            </tr>
            <?php
                foreach($usuarios as $item){
                        echo "<tr class='dados-cliente'>";
                            echo "<td>{$item["nome_usuario"]}</td>";
                            echo "<td><a href='?pagina=cliente&id=" . $item["nome_usuario"] . "'><img src='imagens/lapis.png'></a></td>";
                        echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
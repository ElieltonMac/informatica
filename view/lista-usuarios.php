<?php
    $usuarios = $usuarioDao->retornaUsuarios();
?>

<div class="default-flex container-lista-usuario">
    <div class="default-flex box-lista-usuario">
        <table class="usuario-table">
            <tr id="cabecalho">
                <th>USUARIO</th>
            </tr>
            <?php
                foreach($usuarios as $item){
                        echo "<tr class='dados-usuario'>";
                            echo "<td>{$item["nome_usuario"]}</td>";
                            echo "<td><a href='?pagina=usuario&id=" . $item["nome_usuario"] . "'><img src='imagens/lapis.png'></a></td>";
                        echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
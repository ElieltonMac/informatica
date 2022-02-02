<?php
    $usuarios = $usuarioDao->retornaUsuarios();
?>

<div class="default-flex container-lista-usuario">
    <div class="default-flex box-lista-usuario">
        <div class="default-flex row-add-user">
            <div class="default-flex box-icon-add">
                <a href="?pagina=cadastrar-usuario"><img src="/informatica/imagens/adicionar.png"></a>
            </div>  
        </div>
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
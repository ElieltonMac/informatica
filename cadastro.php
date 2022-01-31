<?php
    require_once("Dao/UsuarioDao.php");
    require_once("Model/Usuario.php");
    require_once("Control/UsuarioControl.php");

    $userControl = new UsuarioControl();

    $msg = "";

    if(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING)){
        $user = new Usuario();

        $nome = strip_tags(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING));
        $email = strip_tags(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_STRING));
        $senha = strip_tags(filter_input(INPUT_POST, "txtPass", FILTER_SANITIZE_STRING));

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $msg = "Email inválido";
        }else{
            $user->setNome($nome);
            $user->setEmail($email);
            $user->setSenha($senha);

            $result = $userControl->validaCadastro($user);
            switch($result){
                case 1:
                    $msg = "Cadastrado com sucesso";
                break;
                case -1:
                    $msg = "Este usuário já existe";
                break;
                case -2:
                    $msg = "Erro ao cadastrar usuário";
                break;
                case -3:
                    $msg = "Dados inválidos";
                break;
            }
        }
        
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/cadastro.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header"></div>
        <!--<div class="side-bar" id="side-bar-1">
            <div class="icon-user-cad">
            </div>
            <div class="title-pag">
                <p>É ótimo ter você conosco!</p>
                <p>Faça seu cadastro aqui</p>
            </div>
            <div class="info-para-cadastro">
                <p>Por favor preencha todos os campos ao lado</p>

            </div>
        </div>-->
        <div class="side-bar" id="side-bar-2">
            <div class="icon-cad-user">
                <img class="img-cad-user-smartphone" src="Imagens/cad-user-smartphone.png" alt="Imagens/cad-user-smartphone.png">
            </div>
            <div class="icon-cad-user-desktop">
                <img class="img-cad-user-desktop" src="Imagens/cad-user.png" alt="Imagens/cad-user-smartphone.png">
            </div>
            <div class="presentation">
                <p>CADASTRE-SE</p>
            </div>
            <div class="formulario">
                <div class="input-data">
                    <form method="POST" onsubmit="validaCad(this); return false;">
                        <input class="user-data" type="text" name="txtNome" placeholder="Nome"><br>
                        <input class="user-data" type="text" name="txtEmail" placeholder="Email"><br>
                        <input class="user-data" type="password" name="txtPass" placeholder="Senha">
                </div>    
                <div class="resposta" id="resposta"><p><?=$msg?></p></div>          
                <div class="box-send">
                        <input class="btn-form" id="btn-send" type="submit" name="btn-send" value="ENTRAR"><br>
                        <input class="btn-form" id="btn-cancel" type="button" name="btn-cancel" value="CANCELAR" onClick="location.href='index.php'">
                    </form>
                </div>
        </div>

    </div>
    <?php
        echo "<script>document.getElementById('resposta').style.display = 'flex';</script>'";
    ?>
    <script type="text/javascript" src="Js/formulario.js"></script>
</body>
</html>
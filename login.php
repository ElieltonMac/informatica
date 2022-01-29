<?php
session_start();
    require_once("Dao/UsuarioDao.php");
    require_once("Model/Usuario.php");
    require_once("Control/UsuarioControl.php");
    $userControl = new UsuarioControl();
    $msg = "";

    if(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_STRING)){
        $usuario = new Usuario();

        $email = strip_tags(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_STRING));
        $senha = strip_tags(filter_input(INPUT_POST, "txtPass", FILTER_SANITIZE_STRING));
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $msg = "Email inválido";
        }else{
            $usuario->setEmail($email);
            $usuario->setSenha($senha);
            $result = $userControl->validaLogin($usuario);

            switch($result){
                case 1:
                    $_SESSION["email"] = $usuario->getEmail();

                    header("Location: painel.php");
                break;
                case -3:
                    $msg = "Dados Inválidos";
                break;
                case -4:
                    $msg = "Usuário ou senha incorretos";
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
    <link rel="stylesheet" href="Css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header">

        </div>
        <div class="side-bar" id="side-bar-1">
            <div class="user">
                <img class="img-user" src="Imagens/user.png" alt="user.png">
            </div>
            <div class="opcoes-user">
                <h2>Faça login para acessar o sistema</h2>
                <p><a href="cadastro.php">Primeiro acesso?</a></p>
            </div>
        </div>
        <div class="side-bar" id="side-bar-2">
            <div class="icon-user">
                <img class="img-user" src="Imagens/user-smartphone.png" alt="user-smartphone.png">
            </div>
            <div class="ident-func">
                <p class="title-login">LOGIN</p>
            </div>
            <div class="formulario">
                <div class="input-data">
                    <form method="POST">
                        <input class="user-data" type="text" name="txtEmail" placeholder="Usuario"><br>
                        <input class="user-data" type="password" name="txtPass" placeholder="Senha">
                </div>    
                <div class="resposta" id="resposta"><p><?=$msg?></p></div>          
                <div class="box-send">
                        <input class="btn-send" type="submit" name="btn-send" value="ENTRAR">
                    </form>
                </div>
                <div class="no-cadastro">
                    <p><a href="cadastro.php">Primeiro acesso?</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php
        echo "<script>document.getElementById('resposta').style.display = 'flex';</script>'";
    ?>
</body>
</html>
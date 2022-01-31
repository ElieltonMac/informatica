<?php
    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: index.php?msg=1");
    }

    require_once("dao/SolicitacaoDao.php");
    require_once("dao/ClienteDao.php");
    require_once("control/SolicitacaoControl.php");
    require_once("control/ClienteControl.php");
    require_once("model/Solicitacao.php");
    require_once("model/Cliente.php");
    $solicitacaoControl = new SolicitacaoControl();
    $clienteControl = new ClienteControl();
    $solicitacaoDao = new SolicitacaoDao(); 
    $clienteDao = new ClienteDao();

    $msg = "";

    if(filter_input(INPUT_POST, "btn-salvar-os", FILTER_SANITIZE_STRING)){
        $solicitacao = new Solicitacao();
        /*$id = strip_tags(filter_input(INPUT_POST, "id-os"));
        $cliente = strip_tags*/

        $solicitacao->setId(strip_tags($_POST["id-os"]));
        $solicitacao->setCliente(strip_tags($_POST["cliente"]));
        $solicitacao->setAtendente(strip_tags($_POST["atendente"]));
        $solicitacao->setTecnico();
        $solicitacao->setTelefone(strip_tags(filter_input(INPUT_POST, "num-celular", FILTER_SANITIZE_STRING)));
        $solicitacao->setWhatsapp(strip_tags(filter_input(INPUT_POST, "num-whatsapp", FILTER_SANITIZE_STRING)));
        $solicitacao->setEquipamento(strip_tags(filter_input(INPUT_POST, "equipamento", FILTER_SANITIZE_STRING)));
        $solicitacao->setMarca(strip_tags(filter_input(INPUT_POST, "marca", FILTER_SANITIZE_STRING)));
        $solicitacao->setModelo(strip_tags(filter_input(INPUT_POST, "modelo", FILTER_SANITIZE_STRING)));
        $solicitacao->setProblemaInfo(strip_tags(filter_input(INPUT_POST, "problema-informado", FILTER_SANITIZE_STRING)));
        $solicitacao->setProblemaConst(strip_tags(filter_input(INPUT_POST, "problema-constatado", FILTER_SANITIZE_STRING)));
        $solicitacao->setObservacoes(strip_tags(filter_input(INPUT_POST, "observacoes", FILTER_SANITIZE_STRING)));
        $solicitacao->setStatus(strip_tags("Entrada"));
        $solicitacao->setDataSolicitacao(date("Y-m-d"));

        $retorno = $solicitacaoControl->validaOs($solicitacao);

        switch($retorno){
            case 1:
                $msg = "Cadastrado com sucesso";
            break;
            case -1:
                $msg = "Erro ao cadastrar ordem";
            break;
            case -2:
                $msg = "Campos OS, Atendente e Cliente devem ser preenchidos";
            break;
        }
    }

    if(filter_input(INPUT_POST, "btn-salvar-cliente", FILTER_SANITIZE_STRING)){
        $cliente = new Cliente();

        $cliente->setNome(strip_tags(filter_input(INPUT_POST, "nome-cliente", FILTER_SANITIZE_STRING)));
        $cliente->setCpf(strip_tags(filter_input(INPUT_POST, "cpf-cliente", FILTER_SANITIZE_STRING)));


        $retorno = $clienteControl->validaCliente($cliente);
        //$retorno = $solicitacaoDao->cadastrarCliente($cliente);

        switch($retorno){
            case 1: 
                $msg = "Cadastrado com sucesso";
            break;
            case -1:
                $msg = "Erro ao cadastrar cliente";
            break;
            case -2:
                $msg = "Campo nome deve ser preenchido";
            break;
        }
    }

    if(filter_input(INPUT_POST, "btn-salvar-atendente", FILTER_SANITIZE_STRING)){
        $atendente = new Atendente();
        
        $atendente->setNome(filter_input(INPUT_POST, "nome-atendente", FILTER_SANITIZE_STRING));
        $atendente->setCpf(filter_input(INPUT_POST, "cpf-atendente", FILTER_SANITIZE_STRING));

        $retorno = $solicitacaoDao->cadastrarAtendente($atendente);

        switch($retorno){
            case 1:
                $msg = "Cadastrado com sucesso";
            break;
            case -1:
                $msg = "Erro ao cadastrar";
            break;
        }

    }

    if(filter_input(INPUT_POST, "btn-altera-os", FILTER_SANITIZE_STRING)){
        $solicitacao = new Solicitacao();
        $solicitacao->setId(strip_tags(filter_input(INPUT_POST, "id-exclui-os")));
        $solicitacao->setTelefone(strip_tags(filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING)));
        $solicitacao->setWhatsapp(strip_tags(filter_input(INPUT_POST, "whatsapp", FILTER_SANITIZE_STRING)));
        $solicitacao->setEquipamento(strip_tags(filter_input(INPUT_POST, "equipamento", FILTER_SANITIZE_STRING)));
        $solicitacao->setMarca(strip_tags(filter_input(INPUT_POST, "marca", FILTER_SANITIZE_STRING)));
        $solicitacao->setModelo(strip_tags(filter_input(INPUT_POST, "modelo", FILTER_SANITIZE_STRING)));
        $solicitacao->setProblemaInfo(strip_tags(filter_input(INPUT_POST, "problema-informado", FILTER_SANITIZE_STRING)));
        $solicitacao->setObservacoes(strip_tags(filter_input(INPUT_POST, "observacoes", FILTER_SANITIZE_STRING)));

        $retorno = $solicitacaoDao->alterarOrdem($solicitacao);

        switch($retorno){
            case 1:
                $msg = "Salvo com sucesso";
            break;
            case -1:
                $msg = "Erro ao salvar";
            break;
        }

    }

    if(filter_input(INPUT_POST, "ordem", FILTER_SANITIZE_STRING)){
        $ordem = new Solicitacao();

        $ordem->setId(strip_tags(filter_input(INPUT_POST, "ordem", FILTER_SANITIZE_STRING)));

        $retorno = $solicitacaoDao->excluiOrdem($ordem);
    }

    if(filter_input(INPUT_POST, "btn-altera-cliente", FILTER_SANITIZE_STRING)){
        $cliente = new Cliente();
        $cliente->setIdCliente(filter_input(INPUT_POST, "id-cliente"));
        $cliente->setNome(filter_input(INPUT_POST, "nome-cliente", FILTER_SANITIZE_STRING));
        $cliente->setCpf(filter_input(INPUT_POST, "cpf-cnpj", FILTER_SANITIZE_STRING));

        $retorno = $clienteDao->alteraCliente($cliente);
    }

    if(filter_input(INPUT_POST, "idcliente", FILTER_SANITIZE_STRING)){
        $cliente = new Cliente();
        $cliente->setIdCliente(strip_tags(filter_input(INPUT_POST, "idcliente", FILTER_SANITIZE_STRING)));

        $retorno = $clienteDao->excluiCliente($cliente);
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/painel.css">
    <link rel="stylesheet" href="css/view-ordens.css">
    <link rel="stylesheet" href="css/cadastrar-os.css">
    <link rel="stylesheet" href="css/cadastro-cliente.css">
    <link rel="stylesheet" href="css/ordem.css">
    <link rel="stylesheet" href="css/lista-clientes.css">
    <link rel="stylesheet" href="css/cliente.css">
    <script type="text/javascript" src="js/jquery-3.6.0.min"></script>
</head>
<body>
    <div class="container" class="default-flex">
        <header class="default-flex" id="nav-bar">
            <nav class="default-flex">
                <ul class="default-flex" id="list-links">
                    <li class="option-nav-bar"><a href="" >HOME</a></li>
                    <li class="option-nav-bar"><a href="?pagina=lista-ordens">ORDENS</a></li>
                    <li class="option-nav-bar"><a href="?pagina=lista-clientes">CLIENTES</a></li>
                    <li class="option-nav-bar"><a href="#">PERFIL</a></li>
                </ul>      
            </nav>
            <ul id="list-logout">
                    <a href="logout.php"><img src="imagens/logout.png" alt="logout.png"></a>
            </ul>   
        </header>
        <div class="content" id="content">
            <?php
                $pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_STRING);

                switch($pagina){
                    case "lista-ordens":
                        require_once("view/lista-ordens.php");
                    break;
                    case "cadastrar-os":
                        require_once("view/cadastrar-os.php");
                    break;
                    case "cadastrar-cliente":
                        require_once("view/cadastrar-cliente.php");
                    break; 
                    case "ordem":
                        require_once("view/ordem.php");
                    break;
                    case "lista-clientes":
                        require_once("view/lista-clientes.php");
                    break;
                    case "cliente":
                        require_once("view/cliente.php");
                    break;
                }       
            ?>  
        </div>
    </div>
    
    <script type="text/javascript" src="js/painel.js"></script>
</body>
</html>
<?php 
    require_once("dao/ClienteDao.php");

    class ClienteControl{
        private $clienteDao;

        public function __construct(){
            $this->clienteDao = new ClienteDao();
        }

        public function validaCliente(Cliente $cliente){
            if(strlen($cliente->getNome()) > 3){
                $retorno = $this->clienteDao->cadastrarCliente($cliente);
                return $retorno;
            }else{
                return -2;
            }
        }
    }

?>
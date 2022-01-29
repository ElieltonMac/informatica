<?php
    require_once("dao/SolicitacaoDao.php");

    class SolicitacaoControl{
        private $solicitacaoDao;

        public function __construct(){
            $this->solicitacaoDao = new SolicitacaoDao();
        }

        public function validaOs(Solicitacao $os){
            if(strlen($os->getId()) > 0 && strlen($os->getCliente()) > 0 && strlen($os->getAtendente()) > 0){
                $retorno = $this->solicitacaoDao->cadastrarOs($os);
                return $retorno;
            }else{
                return -2;
            }
        }

        public function validaAlteraOs(Solicitacao $os){
            if(strlen($os->getId()) > 0){
                $retorno = $this->solicitacaoDao->alterarOrdem($os);
                return $retorno;
            }
        }
    }
?>
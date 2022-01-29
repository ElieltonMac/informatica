<?php
    require_once("dao/AtendenteDao.php");

    class AtendenteControl{
        private $atendenteDao;

        public function __construct(){
            $this->atendenteDao = new AtendenteDao();
        }

        public function validaAtendente(Atendente $atendente){
            if(strlen($atendente->getNome()) > 3){
                $retorno = $this->atendenteDao->cadastrarAtendente($atendente);
                return $retorno;
            }else{
                return -1;
            }
        }
    }
?>
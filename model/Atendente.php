<?php
    require_once("Pessoa.php");
    
    class Atendente extends Pessoa{
        private $tipo = 2;

        public function getTipo(){
            return $this->tipo;
        }
    }
?>